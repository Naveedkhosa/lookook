<?php
include "../../config.php";
if(isset($_POST['id'])){
    $d_id = $_POST['id'];
    $images = false;
    $are_imgs = false;

    $dish = "SELECT `menu_item_feature_img`,`menu_item_category` FROM `menu_items` WHERE `menu_item_id` = {$d_id};";
    $all_images = "SELECT `img_name` FROM `images` WHERE `img_of_` = {$d_id};";

    $del_query = "DELETE FROM `menu_items` WHERE `menu_item_id` = {$d_id};";
    $del_query .= "DELETE FROM `images` WHERE `img_of_` = {$d_id};";


            


    if($result_1 = mysqli_query($conn,$dish)){
      if(mysqli_num_rows($result_1) > 0){
          $row_result = mysqli_fetch_assoc($result_1);
          $feature_img = $row_result['menu_item_feature_img'];
          $category = $row_result['menu_item_category'];
          
                  // update cousine/menu
            $del_query .= "UPDATE `menu_categories` SET `menu_c_items`=`menu_c_items`-1 WHERE menu_c_id = {$category};";
           
            

         
          
          

          if($images = mysqli_query($conn,$all_images)){
            if(mysqli_num_rows($images) > 0){
             $are_imgs = true;
            }


            // run multi query to delete all
            if(mysqli_multi_query($conn,$del_query)){
                unlink("../../uploads/feature_imgs/".$feature_img);
                if($images != false && $are_imgs==true){
                    while($row = mysqli_fetch_assoc($images)){
                        unlink("../../uploads/dish_images/".$row['img_name']);
                    }
                }
                echo 1;
            }else{
                echo 0;
            }
            // run multi query to delete all
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