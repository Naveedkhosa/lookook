<?php 
include "../../config.php";
if(isset($_POST['_user_delete_coupon_id'])){
$_user_delete_coupon_id = $_POST['_user_delete_coupon_id'];
$delete_coupon_query = "DELETE FROM `coupon_codes` WHERE `coupon_id`={$_user_delete_coupon_id};";
if(mysqli_query($conn,$delete_coupon_query)){
    echo 1;
}else{
    echo 0;
}

}