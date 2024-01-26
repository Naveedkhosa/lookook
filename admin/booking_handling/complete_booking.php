<?php
include "../../config.php";
if (isset($_POST['b_id'])){
 $b_id = $_POST['b_id'];
 $query = "UPDATE booking SET booking_status='completed',date_completed=CURRENT_TIMESTAMP() WHERE primary_id = {$b_id}";
 if(mysqli_query($conn,$query)){
    echo 1;
 }else{
    echo 0;
 }
}
?>