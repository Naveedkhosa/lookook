<?php 
include "../../config.php";
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];




    
    $query = "SELECT `admin_username`, `admin_email`, `admin_id`,`admin_password` FROM `admin` WHERE admin_email='{$email}' AND admin_password = '{$password}'";
    if($result = mysqli_query($conn,$query)){
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($row['admin_email'] ==$email && $row['admin_password']==$password){
                echo 1;
                $_SESSION['admin_id']=$row['admin_id'];
                $_SESSION['admin_username']=$row['admin_username'];
            }else{
                echo 0;
            }

        }else{
            echo 0;
        }
    }else{
        echo $query;
    }
}

?>