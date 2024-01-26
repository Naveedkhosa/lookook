<?php 
 include "../../config.php"; 

 if(isset($_POST['keys']) && isset($_POST['values'])){

    $keys = mysqli_real_escape_string($conn,$_POST['keys']);
    $values = mysqli_real_escape_string($conn,$_POST['values']);

    $keys_array = explode(",",$keys);
    $values_array = explode(",",$values);
    $query = "";
    for($i=0;$i<count($keys_array)-1;$i++){
        $query.="UPDATE charges SET fees={$values_array[$i]}  WHERE charges_id ={$keys_array[$i]};";
    }

    if(mysqli_multi_query($conn,$query)){
        echo 1;
    }else{
        echo "Something went wrong";
    }
 }else{
    echo "something went wrong";
 }

 ?>