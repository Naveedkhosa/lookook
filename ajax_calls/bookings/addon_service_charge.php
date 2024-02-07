<?php
include "../../config.php";
$response['success'] = false;
$response['charge'] = 0;
$response['msg'] = 'Something went wrong, Please try again later';
if (isset($_POST['guests']) && isset($_POST['service_id'])) {
    $guests = $_POST['guests'];
    $workers = $_POST['workers'];
    if ($guests > 0 && $workers > 0) {
        $service_id = $_POST['service_id'];
        $sql = "SELECT (fees+occ_fee) as charge FROM `charges` WHERE service_id={$service_id} AND {$guests} between min_guest AND max_guest;";
        $sql2 = "SELECT per_worker_fee FROM `services` WHERE services_id={$service_id};";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $response['success'] = true;
                $response['charge'] = mysqli_fetch_assoc($result)['charge'];
                if($result2 = mysqli_query($conn, $sql2)){
                    if (mysqli_num_rows($result2) > 0) {
                        $response['addon_per_worker_fee'] = mysqli_fetch_assoc($result2)['per_worker_fee']*$workers;
                    }
                }
                $response['msg']='Successfull';
            }
        }
    }else{
        $response['success'] = true;
        $response['charge'] = 0;
        $response['addon_per_worker_fee'] = 0;
        $response['msg']='Successfull';
    }
}

die(json_encode($response));

