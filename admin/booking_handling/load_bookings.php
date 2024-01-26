<?php
include "../../config.php";
$output = "";
if (isset($_POST['booking_type'])) {
    $booking_type = $_POST['booking_type'];
    $search_term = $_POST['search_item'];

    if ($booking_type == "all") {
        if ($search_term != "") {
            $query = "SELECT *,date_format(booking.last_updated,'%d %M %Y %h:%i:%s %p (%W)') as dt FROM `booking` INNER JOIN users ON booking.booking_user_id=users.user_id WHERE booking_id LIKE '%$search_term%' OR user_original_number LIKE '%$search_term%' OR booking_service_name LIKE '%$search_term%' ORDER BY primary_id DESC;";
        } else {
            $query = "SELECT *,date_format(booking.last_updated,'%d %M %Y %h:%i:%s %p (%W)') as dt FROM `booking` INNER JOIN users ON booking.booking_user_id=users.user_id ORDER BY primary_id DESC;";
        }

    } else {
        if ($search_term != "") {
            $query = "SELECT *,date_format(booking.last_updated,'%d %M %Y %h:%i:%s %p (%W)') as dt FROM `booking` INNER JOIN users ON booking.booking_user_id=users.user_id WHERE `booking_status`='{$booking_type}' AND (booking_id LIKE '%$search_term%' OR user_original_number LIKE '%$search_term%' OR booking_service_name LIKE '%$search_term%') ORDER BY primary_id DESC;";
        } else {
            $query = "SELECT *,date_format(booking.last_updated,'%d %M %Y %h:%i:%s %p (%W)') as dt FROM `booking` INNER JOIN users ON booking.booking_user_id=users.user_id WHERE `booking_status`='{$booking_type}' ORDER BY primary_id DESC;";
        }
    }

    if ($result = mysqli_query($conn, $query)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= '<div class="booking">
                <div class="booking-info">
                <div class="booking-title">
                    Booking ' . $row['booking_id'] . '
                </div>
                <div class="booking-subtitle">
                    User : ' . $row['user_original_number'] . '
                </div>
                <div class="booking-subtitle">
                  Service : ' . $row['booking_service_name'] . '
                </div>
                <div class="booking-subtitle">
                   Event Date : ' . $row['booking_for_date'] . '
                </div>
                <div class="booking-subtitle">
                  Time : ' . $row['booking_time'] . '
                </div>
                <div class="booking-subtitle">
                  Advance Payment : ' . $row['advance_payment'] . '
                </div>
                <div class="booking-subtitle">
                  Balance Payment : ' . ($row['total_payment'] - $row['advance_payment']) . '
                </div>
                <div class="booking-subtitle">
                  Total Payment : ' . $row['total_payment'] . '
                </div>
                <div class="booking-subtitle">
                  Location : ';

                if ($address = mysqli_query($conn, "SELECT * FROM `user_addresses` WHERE `address_id` = {$row['address_id']};")) {
                    if (mysqli_num_rows($address) > 0) {
                        $address_is = mysqli_fetch_assoc($address);
                        $output .= $address_is['house_flat_floor'] . " " . $address_is['street_area_sector'] . ", " . $address_is['city'] . " " . $address_is['state'] . ", " . $address_is['country'];
                    } else {
                        $output .= "Not found";
                    }
                } else {
                    $output .= "Not found";
                }
                $output .= '
                </div>
                <div class="booking-subtitle">
                    Status: <sapn class="current">' . $row['booking_status'] . '</sapn>
                </div>
                <br>
                <div class="booking_date_is">
                  <b>Last Updated : </b>' . $row['dt'] . '
                </div>
            </div>
            <div class="booking-action" style="display:flex;align-items:center;justify-content:space-between;">';

                if ($row['booking_status'] == "current" || $row['booking_status'] == "confirmed") {
                    $output .= '
                    <a href="../see-booking-detail?user='.$row['booking_user_id'].'&booking='.$row['booking_id'].'">View Detail</a>
                    <div class="_complete _complete_booking" data-bid="' . $row['primary_id'] . '">Complete</div>';
                } else if ($row['booking_status'] != "current" && $row['booking_status'] != "confirmed" && $row['booking_status'] != "cart" && $row['booking_status'] != "pending") {
                    $output .= '<div class="_cancel _delete_booking" data-bid="' . $row['primary_id'] . '">Delete</div>';
                }



                $output .= '
                </div>
            </div>';
            }
            echo $output;
        } else {
            echo "<p style='margin:20px 0px;width:100%;padding:10px 0px;background:#fff;color:red;font-size:16px;text-align:center;'>No booking was found...</p>";
        }
    } else {
        echo "<p style='margin:20px 0px;width:100%;padding:10px 0px;background:#fff;color:red;font-size:16px;text-align:center;'>Something went wrong</p>";
    }
}

?>