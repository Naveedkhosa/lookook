<?php 
include "../../config.php";
if(isset($_POST['_user_edit_btn_id'])){
$_user_edit_btn_id = $_POST['_user_edit_btn_id'];

$_user_edit_btn_id_query = "SELECT menu_c_name FROM menu_categories WHERE menu_c_id={$_user_edit_btn_id}";
if($_user_edit_btn_id_query_result = mysqli_query($conn,$_user_edit_btn_id_query)){
if(mysqli_num_rows($_user_edit_btn_id_query_result)>0){
 echo mysqli_fetch_assoc($_user_edit_btn_id_query_result)['menu_c_name'];
}else{
    echo 0;
}
}else{
    echo 0;
}
}
?>