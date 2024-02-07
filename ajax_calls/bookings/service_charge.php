<?php
include "../../config.php";
$response['success'] = false;
$response['charge'] = 0;
$response['msg'] = 'Something went wrong, Please try again later';
if (isset($_POST['guests']) && isset($_POST['service_id'])) {
    $guests = $_POST['guests'];
    if ($guests > 0) {
        $service_id = $_POST['service_id'];
        $sql = "SELECT (fees+occ_fee) as charge FROM `charges` WHERE service_id={$service_id} AND {$guests} between min_guest AND max_guest;";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $response['success'] = true;
                $response['charge'] = mysqli_fetch_assoc($result)['charge'];
                $response['msg']='Successfull';
            }
        }
    }
}

die(json_encode($response));
