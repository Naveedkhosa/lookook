<?php
include "../../config.php";
if (isset($_POST['event_adults']) && isset($_POST['service_id']) && isset($_POST['event_addon_bartender']) && isset($_POST['event_addon_cleaner']) && isset($_POST['event_workers'])) {
    $event_adults = $_POST['event_adults'];
    $event_addon_cleaner = $_POST['event_addon_cleaner'];
    $event_addon_bartender = $_POST['event_addon_bartender'];
    $event_workers = $_POST['event_workers'];
    $service_id = $_POST['service_id'];
    // coupon code 
    $coupon_code = $_POST['coupon_code'];

    $addon_sid1 = 3; // cleaner
    $addon_sid2 = 2; // bartender
    $all_charges = 0;
    $addon_all_charges = 0;
    $tax_amount = 0;
    // default values
    $result['tax_percentage'] = 18;
    $result['b_guest_charges'] = 0;
    $result['b_per_worker_charges'] = 0;
    $result['b_addon_cleaner_guest_charges'] = 0;
    $result['b_addon_bartender_guest_charges'] = 0;
    $result['b_addon_cleaner_per_worker_charges']  = 0;
    $result['b_addon_bartender_per_worker_charges'] = 0;

    $result['success'] = true;


    if ($event_adults > 0) {

        // booking guest charge
        $service_charge_sql = "SELECT (fees+occ_fee) as charge FROM `charges` WHERE service_id={$service_id} AND {$event_adults} between min_guest AND max_guest;";

        if ($service_charge_sql_result = mysqli_query($conn, $service_charge_sql)) {
            if (mysqli_num_rows($service_charge_sql_result) > 0) {
                $result['b_guest_charges'] = mysqli_fetch_assoc($service_charge_sql_result)['charge'];
                $all_charges += $result['b_guest_charges'];
            }
        }

        // add on services
        // cleaner
        if ($event_addon_cleaner > 0) {
            $addon_service_charge_sql2 = "SELECT (fees+occ_fee) as charge FROM `charges` WHERE service_id={$addon_sid1} AND {$event_adults} between min_guest AND max_guest;";

            if ($addon_service_charge_sql2_result = mysqli_query($conn, $addon_service_charge_sql2)) {
                if (mysqli_num_rows($addon_service_charge_sql2_result) > 0) {
                    $result['b_addon_cleaner_guest_charges'] = mysqli_fetch_assoc($addon_service_charge_sql2_result)['charge'];
                    $addon_all_charges += $result['b_addon_cleaner_guest_charges'];
                }
            }
        }

        // bartender
        if ($event_addon_bartender > 0) {
            $addon_service_charge_sql1 = "SELECT (fees+occ_fee) as charge FROM `charges` WHERE service_id={$addon_sid2} AND {$event_adults} between min_guest AND max_guest;";

            if ($addon_service_charge_sql1_result = mysqli_query($conn, $addon_service_charge_sql1)) {
                if (mysqli_num_rows($addon_service_charge_sql1_result) > 0) {
                    $result['b_addon_bartender_guest_charges'] = mysqli_fetch_assoc($addon_service_charge_sql1_result)['charge'];
                    $addon_all_charges += $result['b_addon_bartender_guest_charges'];
                }
            }
        }


        // addon per worker charge
        // bartender
        if ($event_addon_bartender > 0) {
            $per_worker_bartender_sql = "SELECT per_worker_fee FROM `services` WHERE services_id={$addon_sid2};";
            if ($per_worker_bartender_sql_result = mysqli_query($conn, $per_worker_bartender_sql)) {
                if (mysqli_num_rows($per_worker_bartender_sql_result) > 0) {
                    $result['b_addon_bartender_per_worker_charges'] = mysqli_fetch_assoc($per_worker_bartender_sql_result)['per_worker_fee'] * $event_addon_bartender;
                    $addon_all_charges += $result['b_addon_bartender_per_worker_charges'];
                }
            }
        }
        // cleaner
        if ($event_addon_cleaner > 0) {
            $per_worker_cleaner_sql = "SELECT per_worker_fee FROM `services` WHERE services_id={$addon_sid1};";
            if ($per_worker_cleaner_sql_result = mysqli_query($conn, $per_worker_cleaner_sql)) {
                if (mysqli_num_rows($per_worker_cleaner_sql_result) > 0) {
                    $result['b_addon_cleaner_per_worker_charges'] = mysqli_fetch_assoc($per_worker_cleaner_sql_result)['per_worker_fee'] * $event_addon_cleaner;
                    $addon_all_charges += $result['b_addon_cleaner_per_worker_charges'];
                }
            }
        }
    }




    // booking per worker charge
    if ($event_workers > 0) {
        $per_worker_sql = "SELECT per_worker_fee FROM `services` WHERE services_id={$service_id};";
        if ($per_worker_sql_result = mysqli_query($conn, $per_worker_sql)) {
            if (mysqli_num_rows($per_worker_sql_result) > 0) {
                $result['b_per_worker_charges'] = mysqli_fetch_assoc($per_worker_sql_result)['per_worker_fee'] * $event_workers;
                $all_charges += $result['b_per_worker_charges'];
            }
        }
    }

    $all_charges  += $addon_all_charges;
    $result['b_addon_all_charges'] = $addon_all_charges;

    // tax percentage
    $tax_sql = "SELECT tax_percentage FROM `tax` WHERE tax_id=1;";
    if ($tax_sql_result = mysqli_query($conn, $tax_sql)) {
        if (mysqli_num_rows($tax_sql_result) > 0) {
            $result['tax_percentage'] = mysqli_fetch_assoc($tax_sql_result)['tax_percentage'];

            $tax_amount = floor(($all_charges / 100) * $result['tax_percentage']);
        }
    }

    $all_charges += $tax_amount;
    //  coupon
    if ($coupon_code != null) {
        $coupon_sql = "SELECT * FROM `coupon_codes` WHERE `coupon_code` = '{$coupon_code}' AND valid_till >= CURRENT_DATE();";
        if ($coupon_sql_result = mysqli_query($conn, $coupon_sql)) {
            if (mysqli_num_rows($coupon_sql_result) == 1) {
                $coupon_sql_row = mysqli_fetch_assoc($coupon_sql_result);
                $result['coupon_discount_type'] = $coupon_sql_row['coupon_type'];
                $result['coupon_discount_value'] = $coupon_sql_row['coupon_discount'];
                $result['coupon_applied'] = true;
                $result['coupon_code'] = $coupon_sql_row['coupon_code'];

                if ($coupon_sql_row['coupon_type'] == "flat") {
                    $result['coupon_discount'] = $coupon_sql_row['coupon_discount'];
                    $all_charges= $all_charges- $coupon_sql_row['coupon_discount'];
                } else {
                    $result['coupon_discount'] = floor(($all_charges/ 100) * $coupon_sql_row['coupon_discount']);
                    $all_charges= $all_charges- $result['coupon_discount'];
                }
               

            } else {
                $result['coupon_applied'] = false;
                $result['coupan_msg'] = "Coupan has been expired or deleted.";
            }
        }
    }

    $result['b_gst_tax'] = $tax_amount;
    $result['total_charges'] = $all_charges;
    $result['adv_pay'] = floor(($result['total_charges'] / 100) * 40);
    $result['balance_pay'] = $result['total_charges'] - $result['adv_pay'];
    die(json_encode($result));
} else {
    $result['success'] = false;
    $result['msg'] = "Access denied";
    die(json_encode($result));
}
