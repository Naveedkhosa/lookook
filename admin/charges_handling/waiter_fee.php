<?php
 include "../../config.php"; 

if(isset($_POST['s_id'])){
    $s_id = $_POST['s_id'];

    $query = "SELECT `services_fee` FROM `services` WHERE services_id = {$s_id};";

    if($result = mysqli_query($conn,$query)){
      if(mysqli_num_rows($result)>0){
         echo mysqli_fetch_assoc($result)['services_fee'];
      }else{
        echo 0;
      }
    }else{
        echo 0;
    }




}

?>