<?php
include "../../config.php";
if(isset($_POST['dish_id'])){
    $dish_id = $_POST['dish_id'];
    
    
   
    
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
    
    if($_FILES['dish_image']['name'] !=""){
           $feature_image_name = $_FILES['dish_image']['name'];
    $feature_image_tmpname = $_FILES['dish_image']['tmp_name'];
    
    $feature_image_ext = explode(".",$feature_image_name);
    $feature_image_ext = end($feature_image_ext);
    
           $select_dish = "SELECT menu_item_feature_img FROM menu_items WHERE menu_item_id = {$dish_id}";
           if($result_img = mysqli_query($conn,$select_dish)){
               if(mysqli_num_rows($result_img)>0){
                   $img_old = mysqli_fetch_assoc($result_img)['menu_item_feature_img'];
               }
            }
            
    $feature_image_new_name = date("d_m_Y_h_i_s_").".".$feature_image_ext;
    
    $insert_query = "UPDATE `menu_items` SET `menu_item_name`='{$dish_name}', `menu_item_category`={$cousine}, `menu_item_short_desc`='{$dish_short_desc}', `menu_item_excript`='{$excript}', `menu_item_about`='{$about}', `menu_item_type`='{$dish_type}', `menu_item_feature_img`='{$feature_image_new_name}', `menu_item_price`={$dish_price}, `menu_item_appetizer`='{$appetizer}', `is_chef_special`={$is_chef_special} WHERE menu_item_id={$dish_id};";
       
      
       
       // upload feature file
       if(move_uploaded_file($feature_image_tmpname,"../../uploads/feature_imgs/".$feature_image_new_name)){
      if(mysqli_query($conn,$insert_query)){
                    unlink("../../uploads/feature_imgs/".$img_old);
            
            // continue
       
      }else{
           unlink("../../uploads/feature_imgs/".$feature_image_new_name);
           echo "sql1";
           die();
      }
     }else{
         echo "not";
         die();
     }

    
    
    }else{
        $insert_query = "UPDATE `menu_items` SET `menu_item_name`='{$dish_name}',`menu_item_category`={$cousine},`menu_item_short_desc`='{$dish_short_desc}',`menu_item_excript`='{$excript}', `menu_item_about`='{$about}', `menu_item_type`='{$dish_type}', `menu_item_price`={$dish_price}, `menu_item_appetizer`='{$appetizer}',`is_chef_special`={$is_chef_special} WHERE menu_item_id={$dish_id};";
        
         if(mysqli_query($conn,$insert_query)){
            //  continue
         }else{
           echo "sql";
           die();
         }
        
        
    }
      
    
     $entered_dish_apps_query = "SELECT * FROM used_appliances WHERE dish_id={$dish_id}";
     $entered_dish_recps_query = "SELECT * FROM used_recipes WHERE dish_id={$dish_id}";
     
     if($entered_dish_apps_query_res = mysqli_query($conn,$entered_dish_apps_query)){
         if(mysqli_num_rows($entered_dish_apps_query_res)>0){
             
             
             
             
              $entered_dish_apps = array();
             while($apps_row = mysqli_fetch_assoc($entered_dish_apps_query_res)){
                 if(in_array($apps_row['appliance_id'],$appliances_array)){
                     
                 }else{
                     $del_q1 = "DELETE FROM `used_appliances` WHERE `used_appliance_id`={$apps_row['used_appliance_id']}";
                     mysqli_query($conn,$del_q1);
                 }
                 array_push($entered_dish_apps,$apps_row['appliance_id']);
             }
             
             
         }else{
             $entered_dish_apps = "";
         }
     }

 
      if($entered_dish_recps_query_res = mysqli_query($conn,$entered_dish_recps_query)){
          
         if(mysqli_num_rows($entered_dish_recps_query_res)>0){
             $entered_dish_recps = array();
             while($recps_row = mysqli_fetch_assoc($entered_dish_recps_query_res)){
                 if(in_array($recps_row['recipe_id'],$recipes_array)){
                     
                 }else{
                     $del_q = "DELETE FROM `used_recipes` WHERE `used_recipe_id`={$recps_row['used_recipe_id']}";
                     mysqli_query($conn,$del_q);
                 }
                 array_push($entered_dish_recps,$recps_row['recipe_id']);
             }
             
             
         }else{
             $entered_dish_recps = "";
         }
     }
        
        
        
       
        
        
        
        
      


           if($entered_dish_apps==""){
            //   insert all
            
            if($appliances_array[0]=="-1" && isset($appliances_array[1])){
                $appliance_counter = count($appliances_array);
                $appliance_insert_queries = "";
                $appliance_update_queries = "";
              
                     for ($a=1; $a <$appliance_counter; $a++) { 
                          $appliance_insert_queries .= "INSERT INTO `used_appliances`(`appliance_id`, `dish_id`) VALUES ({$appliances_array[$a]},{$dish_id});";
                    
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
        
    }else{
        // insert by conditions
        
        
         if($appliances_array[0]=="-1" && isset($appliances_array[1])){
                $appliance_counter = count($appliances_array);
                $appliance_insert_queries = "";
                $appliance_update_queries = "";
              
                     for ($a=1; $a <$appliance_counter; $a++) {
                         
                         if(in_array($appliances_array[$a],$entered_dish_apps)){
                            //  leave
                         }else{
                              $appliance_insert_queries .= "INSERT INTO `used_appliances`(`appliance_id`, `dish_id`) VALUES ({$appliances_array[$a]},{$dish_id});";
                    
                           $appliance_update_queries .= "UPDATE `appliances` SET `appliance_usedby_items`=`appliance_usedby_items` + 1 WHERE `appliance_id`= {$appliances_array[$a]};";
                         }
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
        
    }


   if($entered_dish_recps==""){
    //   insert all
    
        // add recipes
                    if($recipes_array[0]=="-1" && isset($recipes_array[1])){
                        $recipe_counter = count($recipes_array);
                        $recipe_insert_queries = "";
                        $recipe_update_queries = "";
                        for ($r=1; $r <$recipe_counter ; $r++) { 
                            $recipe_insert_queries .= "INSERT INTO `used_recipes`(`recipe_id`, `dish_id`) VALUES ({$recipes_array[$r]},{$dish_id});";
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

   }else{
    //   insert by conditions
    
    if($recipes_array[0]=="-1" && isset($recipes_array[1])){
                        $recipe_counter = count($recipes_array);
                        $recipe_insert_queries = "";
                        $recipe_update_queries = "";
                        for ($r=1; $r <$recipe_counter ; $r++) { 
                            
                             if(in_array($recipes_array[$r],$entered_dish_recps)){
                            //  leave
                         }else{
                            $recipe_insert_queries .= "INSERT INTO `used_recipes`(`recipe_id`, `dish_id`) VALUES ({$recipes_array[$r]},{$dish_id});";
                            $recipe_update_queries .= "UPDATE `recipes` SET `recipe_used_by_items`=`recipe_used_by_items`+1 WHERE recipe_id={$recipes_array[$r]};";
                            
                         }
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
    
   }



   

  
echo 1;


}else{
    echo "<p style='width:100%;text-align:center;font-family:sans-serif;padding:20px 0px;color:red;'>Access Denied..!</p>";
}

// ignored below ones






?>