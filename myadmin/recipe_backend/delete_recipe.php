<?php
include "../../config.php";
if(isset($_POST['id'])){
    $app_id = $_POST['id'];

    $query = "SELECT recipe_image FROM recipes WHERE recipe_id={$app_id};";

    if($recipe_img = mysqli_query($conn,$query)){
      if(mysqli_num_rows($recipe_img) > 0){

        $recipe_image = mysqli_fetch_assoc($recipe_img)['recipe_image'];
        $del_query = "DELETE FROM `recipes` WHERE recipe_id={$app_id};";
        $del_query .= "DELETE FROM `used_recipes` WHERE `recipe_id` = {$app_id};";
   

            if(mysqli_multi_query($conn,$del_query)){
                if($recipe_image !="dummypic.webp"){
                  unlink("../../uploads/recipe_images/".$recipe_image);
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