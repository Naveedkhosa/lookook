<?php
include "../../config.php";
$response['success'] = false;
$response['tax'] = 0;
$response['total'] = 0;
$response['msg'] = 'Something went wrong, Please try again later';
if (isset($_POST['total_charge'])) {
    $total_charge = $_POST['total_charge'];
 
        
        $sql = "SELECT tax_percentage FROM `tax` WHERE tax_id=1;";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $response['success'] = true;
                $tax_percent = mysqli_fetch_assoc($result)['tax_percentage'];
                $tax = floor(($total_charge/100)*$tax_percent);
                $response['total_tax'] = $tax;
                $response['total_charge'] = $total_charge + $tax;
                $response['adv_pay'] = floor(($response['total_charge']/100)*40);
                $response['balance_pay'] = floor($response['total_charge']-$response['adv_pay']);
                $response['total_charge'] = $total_charge + $tax;
                $response['msg']='Successfull';
            }
        }
}

die(json_encode($response));
