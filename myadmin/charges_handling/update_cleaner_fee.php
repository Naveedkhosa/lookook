<?php
 include "../../config.php"; 
if(isset($_POST['fee']) && isset($_POST['id'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $fee = mysqli_real_escape_string($conn,$_POST['fee']);

    $update_fee = "UPDATE `services` SET `services_fee`={$fee} WHERE services_id = {$id};";

    if(mysqli_query($conn,$update_fee)){
        echo 1;
    }else{
        echo "Something went wrong. Please try again later";
    }



}


?>