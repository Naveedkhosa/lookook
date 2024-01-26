<?php
include "../../config.php"; 
if(isset($_POST['menu_name'])){

    $menu_name = $_POST['menu_name'];

    $check_duplicacy = "SELECT * FROM menu_categories where menu_c_name = '{$menu_name}'";
    if($check_duplicacy_result = mysqli_query($conn,$check_duplicacy)){
      if(mysqli_num_rows($check_duplicacy_result)>0){
         echo "dup";
      }else{
        $add_menu_query = "INSERT INTO `menu_categories`(`menu_c_name`) VALUES ('{$menu_name}');";
        if(mysqli_query($conn,$add_menu_query)){
            echo 1;
        }else{
            echo 0;
        }
      }

    }else{
        echo 0;
    }
   
   

}else{
    echo "<p style='color:red;padding:20px 0px;font-size:18px;font-weight:bold;font-family:sans-serif;text-align:center;'>Access Denied....!</p>";
}

?>