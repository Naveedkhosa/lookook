<?php
include "../config.php";
set_time_limit(0);

$result['success'] = false;
$result['msg'] = "Access Denied..!";
if(isset($_POST['type'])){

// update - names
    if($_POST['type']=="update_names"){
        if(isset($_SESSION['logged_user_id'])){
            $user_id = $_SESSION['logged_user_id'];

            if(isset($_POST['first_name']) && isset($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])){

                $first_name  = $_POST['first_name'];
                $last_name  = $_POST['last_name'];
    
                $sql = "UPDATE users SET first_name='{$first_name}', last_name = '{$last_name}' WHERE user_id = {$user_id};";
                if(mysqli_query($conn,$sql)){
                    $result['success'] = true;
                    $result['msg'] = "Your name updated successfully";
                    die(json_encode($result));
                }else{
                    $result['success'] = false;
                    $result['msg'] = "Query Failed, Please try again later.";
                    $result['first_name'] = $first_name;
                    $result['last_name'] = $last_name;
                    die(json_encode($result));
                }
    
            }else{
                $result['success'] = false;
                $result['msg'] = "First and Last name both are required";
                die(json_encode($result));
            }
        }else{
            $result['success'] = false;
            $result['msg'] = "Please login to update profile";
            $result['login'] = false;
            die(json_encode($result));
        }
    }

//   update address
if($_POST['type']=="update_address"){
    if(isset($_SESSION['logged_user_id'])){
        $user_id = $_SESSION['logged_user_id'];

        if(isset($_POST['address']) && strlen($_POST['address']) > 5 ){

            $address  = $_POST['address'];

            $sql = "UPDATE users SET user_address='{$address}' WHERE user_id = {$user_id};";
            if(mysqli_query($conn,$sql)){
                $result['success'] = true;
                $result['msg'] = "Your address updated successfully";
                die(json_encode($result));
            }else{
                $result['success'] = false;
                $result['msg'] = "Query Failed, Please try again later.";
                $result['address'] = $address;
                die(json_encode($result));
            }

        }else{
            $result['success'] = false;
            $result['msg'] = "Please enter valid address";
            die(json_encode($result));
        }

    }else{
        $result['success'] = false;
        $result['msg'] = "Please login to update address";
        $result['login'] = false;
        die(json_encode($result));
    }
}



//   update mobile number
if($_POST['type']=="update_mobile"){
    if(isset($_SESSION['logged_user_id'])){
        $user_id = $_SESSION['logged_user_id'];

        if(isset($_POST['mobile_number']) && strlen($_POST['mobile_number']) == 10 && is_numeric($_POST['mobile_number'])){

            $mobile_number  = $_POST['mobile_number'];

            $sql = "UPDATE users SET user_original_number='{$mobile_number}' WHERE user_id = {$user_id};";
            if(mysqli_query($conn,$sql)){
                $result['success'] = true;
                $result['msg'] = "Your mobile number updated successfully";
                die(json_encode($result));
            }else{
                $result['success'] = false;
                $result['msg'] = "Query Failed, Please try again later.";
                $result['mobile_number'] = $mobile_number;
                die(json_encode($result));
            }

        }else{
            $result['success'] = false;
            $result['msg'] = "Please enter a valid mobile number";
            die(json_encode($result));
        }

    }else{
        $result['success'] = false;
        $result['msg'] = "Please login to update mobile number";
        $result['login'] = false;
        die(json_encode($result));
    }
}


}else{
    die(json_encode($result));
}
