<?php
include "../../config.php";
if(isset($_POST['dish_price'])){
    $appliance_insert_queries = "";
    $appliance_update_queries = "";
    $recipe_insert_queries = "";
    $recipe_update_queries = "";
    $dish_name = mysqli_real_escape_string($conn,$_POST['dish_name']);
    $dish_price = $_POST['dish_price'];
    $dish_short_desc = mysqli_real_escape_string($conn,$_POST['dish_short_desc']);
    $cousine = $_POST['cousine'];
    $dish_type = $_POST['dish_type'];
    $excript = mysqli_real_escape_string($conn,$_POST['excript']);
    $about = mysqli_real_escape_string($conn,$_POST['about']);
    $appliances_ = $_POST['appliances_'];
    $recipes_ = $_POST['recipes_'];
    $is_chef_special = 0;
    if($_POST['toggle1']=="on"){
    $is_chef_special = 1;
    }
    
    
    
    $appliances_array = explode(",",$appliances_);
    $recipes_array = explode(",",$recipes_);
    
    if(isset($_POST['radio'])){
        $appetizer = $_POST['radio'];
    }else{
        $appetizer = 1;
    }
    
    $feature_image_name = $_FILES['dish_image']['name'];
    $feature_image_tmpname = $_FILES['dish_image']['tmp_name'];
    
    $feature_image_ext = explode(".",$feature_image_name);
    $feature_image_ext = end($feature_image_ext);
    $feature_image_new_name = $dish_name."_K_".date("d_m_Y_h_i_s")."_".".".$feature_image_ext;
    
    
    
    
    $insert_query = "INSERT INTO `menu_items`(`menu_item_name`, `menu_item_category`, `menu_item_short_desc`, `menu_item_excript`, `menu_item_about`, `menu_item_type`, `menu_item_feature_img`, `menu_item_price`, `menu_item_appetizer`, `menu_item_is_active`,`is_chef_special`) VALUES ('{$dish_name}',{$cousine},'{$dish_short_desc}','{$excript}','{$about}','{$dish_type}','{$feature_image_new_name}',{$dish_price},'{$appetizer}',1,{$is_chef_special});";
    
    
  


  




    // check dup
    // $dup_sql = "SELECT * FROM `menu_items` WHERE `menu_item_name`='{$dish_name}';";
    // if($dup_result = mysqli_query($conn,$dup_sql)){
    //   if(mysqli_num_rows($dup_result)>0){
    //     echo "dup";
    //   }else{

 
      // upload feature file
       if(move_uploaded_file($feature_image_tmpname,"../../uploads/feature_imgs/".$feature_image_new_name)){
          
        
        if(mysqli_query($conn,$insert_query)){
 
            $last_inserted_id=mysqli_insert_id($conn);

            


            // update cousine/menu
            $_update_menu = "UPDATE `menu_categories` SET `menu_c_items`=`menu_c_items`+1 WHERE menu_c_id = {$cousine};";
            mysqli_query($conn,$_update_menu);
            // update cousine/menu


            if($appliances_array[0]=="-1" && isset($appliances_array[1])){
                        
                $appliance_counter = count($appliances_array);
                $appliance_insert_queries = "";
                $appliance_update_queries = "";
              
                     for ($a=1; $a <$appliance_counter; $a++) { 
                          $appliance_insert_queries .= "INSERT INTO `used_appliances`(`appliance_id`, `dish_id`) VALUES ({$appliances_array[$a]},{$last_inserted_id});";
                    
                           $appliance_update_queries .= "UPDATE `appliances` SET `appliance_usedby_items`=`appliance_usedby_items` + 1 WHERE `appliance_id`= {$appliances_array[$a]};"; 
                         }
            }

        if($appliance_insert_queries !=""){
            if(mysqli_multi_query($conn,$appliance_insert_queries)){
                do {
                       
                    if ($result__ = mysqli_store_result($conn)) {
                        while ($row__ = mysqli_fetch_row($result__)) {
                        
                        }
                        mysqli_free_result($result__);
                      }
                      // if there are more result-sets, the print a divider
                      if (mysqli_more_results($conn)) {
                       
                      }
    
                  } while (mysqli_next_result($conn));
            }
        }

        if($appliance_update_queries !=""){
            if(mysqli_multi_query($conn,$appliance_update_queries)){
                do {
                       
                    if ($result___ = mysqli_store_result($conn)) {
                        while ($row___ = mysqli_fetch_row($result___)) {
                        
                        }
                        mysqli_free_result($result___);
                      }
                      // if there are more result-sets, the print a divider
                      if (mysqli_more_results($conn)) {
                       
                      }
    
                  } while (mysqli_next_result($conn));
            }
        }
        

        // add recipes
                    if($recipes_array[0]=="-1" && isset($recipes_array[1])){
                        $recipe_counter = count($recipes_array);
                        $recipe_insert_queries = "";
                        $recipe_update_queries = "";
                        for ($r=1; $r <$recipe_counter ; $r++) { 
                            $recipe_insert_queries .= "INSERT INTO `used_recipes`(`recipe_id`, `dish_id`) VALUES ({$recipes_array[$r]},{$last_inserted_id});";
                            $recipe_update_queries .= "UPDATE `recipes` SET `recipe_used_by_items`=`recipe_used_by_items`+1 WHERE recipe_id={$recipes_array[$r]};";
                        }
                       
                        
                    }

                    
                    
                    // add recipes

                    
        if($recipe_insert_queries != ""){
            if(mysqli_multi_query($conn,$recipe_insert_queries)){
                do {
                       
                    if ($result___1 = mysqli_store_result($conn)) {
                        while ($row___1 = mysqli_fetch_row($result___1)) {
                        
                        }
                        mysqli_free_result($result___1);
                      }
                      // if there are more result-sets, the print a divider
                      if (mysqli_more_results($conn)) {
                       
                      }
    
                  } while (mysqli_next_result($conn));
            }
        }

                    
        if($recipe_update_queries !=""){
            if(mysqli_multi_query($conn,$recipe_update_queries)){
                do {
                       
                    if ($result___2 = mysqli_store_result($conn)) {
                        while ($row___2 = mysqli_fetch_row($result___2)) {
                        
                        }
                        mysqli_free_result($result___2);
                      }
                      // if there are more result-sets, the print a divider
                      if (mysqli_more_results($conn)) {
                       
                      }
    
                  } while (mysqli_next_result($conn));
            }
        }


        


         echo 1;
        }else{
            unlink("../../uploads/feature_imgs/".$feature_image_new_name);
            echo "sql";
        }




        }else{
         echo "file";
        }// upload feature file




    //   }
    // }else{
    //     echo "sql";
    // }
    // check dup

   


}else{
    echo "<p style='width:100%;text-align:center;font-family:sans-serif;padding:20px 0px;color:red;'>Access Denied..!</p>";
}

// ignored below ones






?>