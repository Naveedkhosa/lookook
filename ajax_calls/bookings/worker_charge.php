<?php
include "../../config.php";
$response['success'] = false;
$response['charge'] = 0;
$response['msg'] = 'Something went wrong, Please try again later';
if (isset($_POST['workers']) && isset($_POST['service_id'])) {
    $workers = $_POST['workers'];
    if ($workers > 0) {
        $service_id = $_POST['service_id'];
        $sql = "SELECT per_worker_fee FROM `services` WHERE services_id={$service_id};";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $response['success'] = true;
                $response['charge'] = mysqli_fetch_assoc($result)['per_worker_fee']*$workers;
                $response['msg']='Successfull';
            }
        }
    }
}

die(json_encode($response));
