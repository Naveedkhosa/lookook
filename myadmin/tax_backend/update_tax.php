<?php
include "../../config.php";
if(isset($_POST['gst___'])){
    $gst___ = $_POST['gst___'];
    $gst___id = $_POST['____'];

    $query = "UPDATE `tax` SET `tax_percentage`= {$gst___} WHERE `tax_id` = {$gst___id};";
    if(mysqli_query($conn,$query)){
        echo 1;
    }else{
        echo 0;
    }

}

?>