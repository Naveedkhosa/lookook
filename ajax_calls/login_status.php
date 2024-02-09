<?php
include "../config.php";
$result['logged_in'] = false;
if(isset($_SESSION['logged_user_id'])){
    $check_user_existence = "SELECT * FROM users WHERE user_id={$_SESSION['logged_user_id']};";
    if($result_sql = mysqli_query($conn,$check_user_existence)){
        if(mysqli_num_rows($result_sql) > 0){
            $result['logged_in'] = true;
        }

    }
}

die(json_encode($result));