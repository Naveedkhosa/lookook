<?php
include "../../config.php";
$limit = 3;
$start = 0;
$result['success'] = false;
$result['msg'] = "Something went wrong";
if(isset($_POST['start'])){
    $start = $_POST['start'];
    $coupans_sql = "SELECT * FROM `coupon_codes` WHERE valid_till >= CURRENT_DATE() LIMIT $start,$limit;";
    if($start==0){
        $total_coupan = "SELECT * FROM `coupon_codes` WHERE valid_till >= CURRENT_DATE()";
        $total_coupan_result = mysqli_query($conn,$total_coupan);
        $result['total'] = mysqli_num_rows($total_coupan_result);
    }
   
    // $coupans_sql = "SELECT * FROM `coupon_codes` LIMIT $start,$limit;";
    if($coupans_sql_result = mysqli_query($conn,$coupans_sql)){
        if(mysqli_num_rows($coupans_sql_result) > 0){
            $result['start'] =(int)$start;
            $result['limit'] = $limit;
            $result['success'] = true;
            $result['coupans'] = mysqli_fetch_all($coupans_sql_result,true);
            $result['msg'] = "Loaded successfully";
        }else{
            if($start==0){
                $result['zero'] = true;
                $result['msg'] = "No coupan code was found."; 
            }else{
                $result['msg'] = "All loaded successfully.";
            }
        }
    }
}
    
die(json_encode($result));

