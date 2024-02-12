<?php
include_once "../../config.php";

if(isset($_POST['_selected_items1'])){

    if($_POST['_selected_items1'] !="no"){
        $_selected_items = $_POST['_selected_items1'];
        $real_array = explode(",",$_POST['_selected_items1']);

        
        $_selected_items_array = array();
        for($i=1;$i<count($real_array);$i++){
            $item = explode("_",$real_array[$i]);
            $item = end($item);
            array_push($_selected_items_array,$item);
        }
    }else{
        $_selected_items_array = false;
    }
    
     $menu_item_type = $_POST['item_type'];
     
     
    if(isset($_POST['where_clause']) && $_POST['where_clause'] !=""){
        $where_clause = $_POST['where_clause'];
        
           if($menu_item_type=="both"){
                    $_select_able_items_query ="SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE (menu_categories.menu_c_name = 'soups' OR  menu_categories.menu_c_name = 'beverages') AND (`menu_item_name` LIKE '%{$where_clause}%' OR `menu_item_price` LIKE '%{$where_clause}%');";
           }else{
               $_select_able_items_query ="SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE (menu_categories.menu_c_name = 'soups' OR  menu_categories.menu_c_name = 'beverages') AND (`menu_item_name` LIKE '%{$where_clause}%' OR `menu_item_price` LIKE '%{$where_clause}%') AND menu_items.menu_item_type='{$menu_item_type}';"; 
           }
    }else{
        
           if($menu_item_type=="both"){
                $_select_able_items_query ="SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE (menu_categories.menu_c_name = 'soups' OR  menu_categories.menu_c_name = 'beverages') ;";
           }else{
                 $_select_able_items_query ="SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE (menu_categories.menu_c_name = 'soups' OR  menu_categories.menu_c_name = 'beverages') AND menu_items.menu_item_type='{$menu_item_type}';";
           }
    }
    
         $_select_able_items_output = '';
         if($_select_able_items_result = mysqli_query($conn,$_select_able_items_query)){
              if(mysqli_num_rows($_select_able_items_result)>0){
                  while($_select_able_items_row = mysqli_fetch_assoc($_select_able_items_result)){
                      
                      //   add these
                      
                        // veg & non_veg handler
                        if($_select_able_items_row['menu_item_type']=="veg"){
                            $veg_ind='<div class="veg" id="veg"></div>';
                            $veg = "true";
                        }else{
                            $veg = "false";
                            $veg_ind='<div class="veg" id="non_veg"></div>';
                        }

                        // chef special handler
                        $chef_special_ind='';
                        $chef_special = 0;
                        if($_select_able_items_row['is_chef_special']==1){
                            $chef_special_ind='<div class="ribbon">Chef Special</div>';
                            $chef_special = 1;
                        }
                      
                      
                    if($_selected_items_array !=false){
                        if(in_array($_select_able_items_row['menu_item_id'],$_selected_items_array)){
    
                        }else{
                            $_select_able_items_output.='<div class="_select_able_items_ _select_able_items__12" id="khan_'.$_select_able_items_row['menu_item_id'].'">
                            <div class="_img">
                                <img src="../uploads/feature_imgs/'.$_select_able_items_row['menu_item_feature_img'].'" alt="'.$_select_able_items_row['menu_item_name'].'">
                            </div>
                            <div class="_right_data_" data-veg="'.$veg.'" data-recommended="'.$chef_special.'">
                                <div class="select_able_name">'.$veg_ind.$_select_able_items_row['menu_item_name'].'</div>
                                <div class="dish_price">₹'.$_select_able_items_row['menu_item_price'].'</div>
                            </div>'.$chef_special_ind.'
                        </div>';
                        }
                        
                    }else{
                        $_select_able_items_output.='<div class="_select_able_items_ _select_able_items__12" id="khan_'.$_select_able_items_row['menu_item_id'].'">
                            <div class="_img">
                                <img src="../uploads/feature_imgs/'.$_select_able_items_row['menu_item_feature_img'].'" alt="'.$_select_able_items_row['menu_item_name'].'">
                            </div>
                            <div class="_right_data_" data-veg="'.$veg.'" data-recommended="'.$chef_special.'">
                                <div class="select_able_name">'.$veg_ind.$_select_able_items_row['menu_item_name'].'</div>
                                <div class="dish_price">₹'.$_select_able_items_row['menu_item_price'].'</div>
                            </div>'.$chef_special_ind.'
                        </div>';
                    }
                  
                  }
                  echo $_select_able_items_output;
              }else{
                echo "zero";
              }
    
        }else{
            echo "sql";
        }
      
}else{
    echo "<p style='color:red;padding:20px 0px;font-size:18px;font-weight:bold;font-family:sans-serif;text-align:center;'>Access Denied....!</p>";
}
              
?>