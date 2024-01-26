<?php 
include "../../config.php";

if(isset($_POST['appliance_name'])){
$appliance_name = $_POST['appliance_name'];

$check_dup = "SELECT * FROM appliances WHERE appliance_name = '{$appliance_name}';";
if($dup_result = mysqli_query($conn,$check_dup)){
    if(mysqli_num_rows($dup_result)>0){
        echo "dup";
    }else{
        

$query_to_insert = "INSERT INTO `appliances`(`appliance_name`, `appliance_image`) VALUES ('{$appliance_name}','dummypic.webp')";


    if(mysqli_query($conn,$query_to_insert)){
     echo 1;
    }else{
        echo 0;
    }




    }
}else{
    echo 0;
}

}
    
?>