<?php 
include "../../config.php";
if(isset($_POST['_user_delete_btn_id'])){
    if($_POST['_user_delete_btn_id'] !=27){
        
        $_user_delete_btn_id = $_POST['_user_delete_btn_id'];
        $old_category_contain_items = 0;
        
        $sql_check_items = "SELECT menu_c_items FROM menu_categories WHERE menu_c_id={$_user_delete_btn_id};";
        if($sql_check_items_result = mysqli_query($conn,$sql_check_items)){
            $sql_check_items_result_row = mysqli_fetch_assoc($sql_check_items_result);
            $old_category_contain_items = $sql_check_items_result_row['menu_c_items'];
        }

        $update_uncategorized = "UPDATE `menu_categories` SET `menu_c_items`=`menu_c_items`+ {$old_category_contain_items} WHERE menu_c_id = 27;";

        $update_menu_items = "UPDATE `menu_items` SET `menu_item_category`=27 WHERE `menu_item_category` = {$_user_delete_btn_id};";


        $delete_menu_query = "DELETE FROM menu_categories WHERE menu_c_id={$_user_delete_btn_id}";
        if(mysqli_query($conn,$delete_menu_query)){

            mysqli_query($conn,$update_uncategorized);
            mysqli_query($conn,$update_menu_items);
            
             echo 1;
        }else{
            echo 0;
        }

    }else{
        echo 27;
    }
   
}else{
    echo "<p style='color:red;padding:20px 0px;font-size:18px;font-weight:bold;font-family:sans-serif;text-align:center;'>Access Denied....!</p>";
}


?>