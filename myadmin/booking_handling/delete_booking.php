<?php
include "../../config.php";
if (isset($_POST['b_id'])){
 $b_id = $_POST['b_id'];
 $query = "DELETE FROM booking WHERE primary_id = {$b_id}";
 if(mysqli_query($conn,$query)){
    echo 1;
 }else{
    echo 0;
 }
}
?>