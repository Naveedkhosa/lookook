<?php
include "../config.php";
if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])){
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_username']);

    if(!isset($_SESSION['admin_id']) && !isset($_SESSION['admin_username'])){
        header("Location:index");
    }else{
        echo "There is an error. Please Try again later.";
    }
    

}else{
    header("Location:index");
   
}

?>