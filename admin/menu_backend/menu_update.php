<?php 
include "../../config.php";
if(isset($_POST['_to_be_update_id'])){
$_to_be_update_id = $_POST['_to_be_update_id'];
$updated_menu = $_POST['updated_menu'];

$update_menu_query = "UPDATE menu_categories SET menu_c_name='{$updated_menu}' WHERE menu_c_id={$_to_be_update_id};";
if(mysqli_query($conn,$update_menu_query)){
 echo 1;
}else{
    echo 0;
}

}
?>