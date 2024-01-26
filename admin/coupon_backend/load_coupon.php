<?php 
include "../../config.php"; 

$count = 0;
$coupon_codes_query_result_row_output = "";
$coupon_codes_query = "SELECT *,DATE_FORMAT(valid_till,'%d-%M-%Y') as valid_till,IF(valid_till < CURRENT_DATE(),'Expired','Running') AS coupon_status FROM `coupon_codes`;";
if($coupon_codes_query_result = mysqli_query($conn,$coupon_codes_query)){
if(mysqli_num_rows($coupon_codes_query_result) > 0){
    $total_coupons = mysqli_num_rows($coupon_codes_query_result);
    
    while($coupon_codes_query_result_row = mysqli_fetch_assoc($coupon_codes_query_result)){
        $count++;
        $coupon_codes_query_result_row_output .='<tr>
        <td>'.$count.'</td>
        <td>'.$coupon_codes_query_result_row['valid_till'].'</td>
        <td>'.$coupon_codes_query_result_row['coupon_code'].'</td>
        <td>'.$coupon_codes_query_result_row['coupon_discount'].'</td>
        <td>'.$coupon_codes_query_result_row['coupon_max_amount'].' INR</td>
        <td>'.$coupon_codes_query_result_row['coupon_repeat_times'].' Times</td>
        <td>'.$coupon_codes_query_result_row['coupon_users'].'</td>
        <td>'.$coupon_codes_query_result_row['coupon_created_on'].'</td>
        <td>'.$coupon_codes_query_result_row['coupon_status'].'</td>
        <td><button class="_user_delete_btn" id="'.$coupon_codes_query_result_row['coupon_id'].'">Delete</button></td>
    </tr>'; 
    }

    echo $coupon_codes_query_result_row_output;
   
}else{
    echo "<tr><td colspan='10' style='color:#c5c5c5;'>No Record was found</td></tr>";
}
}else{
    die("Some issue has occured.Please report.");
}


?>