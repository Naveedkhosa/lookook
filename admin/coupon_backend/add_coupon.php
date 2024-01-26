<?php 
include "../../config.php";
if(isset($_POST['coupon_code'])){

    $coupon_code = $_POST['coupon_code'];
    $coupon_discount = $_POST['coupon_discount'];
    $discount_upto = $_POST['discount_upto'];
    $exp_date = $_POST['exp_date'];
    $user_types = $_POST['user_types'];
    $reusable = $_POST['reusable'];
    $coupon_expiry = date("Y-m-d", strtotime($exp_date));

    $dup_coupon = "SELECT * FROM coupon_codes WHERE coupon_code = '{$coupon_code}' AND valid_till > CURRENT_DATE();";
    if($dup_result = mysqli_query($conn,$dup_coupon)){
      if(mysqli_num_rows($dup_result) > 0){
        echo "This coupon code already exist. Please try another one.";
      }else{
        $query = "INSERT INTO `coupon_codes`(`valid_till`, `coupon_code`, `coupon_discount`, `coupon_max_amount`, `coupon_repeat_times`, `coupon_users`) VALUES ('{$coupon_expiry}','{$coupon_code}',{$coupon_discount},{$discount_upto},{$reusable},'{$user_types}');";

        if(mysqli_query($conn,$query)){
            echo 1;
        }else{
            echo 0;
        }
      }
    }else{
        echo 0;
    }

   



}