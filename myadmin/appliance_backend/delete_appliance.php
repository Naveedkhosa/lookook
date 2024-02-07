<?php
include "../../config.php";
if(isset($_POST['id'])){
    $app_id = $_POST['id'];

    $query = "SELECT appliance_image FROM appliances WHERE appliance_id={$app_id};";

    if($recipe_img = mysqli_query($conn,$query)){
      if(mysqli_num_rows($recipe_img) > 0){

        $recipe_image = mysqli_fetch_assoc($recipe_img)['appliance_image'];
        $del_query = "DELETE FROM `appliances` WHERE appliance_id={$app_id};";
        $del_query .= "DELETE FROM `used_appliances` WHERE `appliance_id` = {$app_id};";
        $del_query .= "DELETE FROM `users_appliances` WHERE `appliance_id` = {$app_id};";
   

            if(mysqli_multi_query($conn,$del_query)){
              if($recipe_image !="dummypic.webp"){
                  unlink("../../uploads/appliances_images/".$recipe_image);
                }
               echo 1;
            }else{
                 echo 0;
            }

      }else{
        echo 0;
      }
    }else{
        echo 0;
    }


    
}

?>