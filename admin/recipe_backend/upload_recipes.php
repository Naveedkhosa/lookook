<?php 
include "../../config.php";
   

if(isset($_POST['recipe_name'])){


$recipe_name = $_POST['recipe_name'];

$check_dup = "SELECT * FROM recipes WHERE recipe_name = '{$recipe_name}';";
if($dup_result = mysqli_query($conn,$check_dup)){
    if(mysqli_num_rows($dup_result)>0){
        echo "dup";
    }else{
        


$query_to_insert = "INSERT INTO `recipes`(`recipe_name`, `recipe_image`) VALUES ('{$recipe_name}','dummypic.webp')";


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