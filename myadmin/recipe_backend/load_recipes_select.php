<?php 
include "../../config.php";
if(isset($_POST['term'])){
    $query = "SELECT recipe_name,recipe_image,recipe_id FROM recipes WHERE recipe_name LIKE '%{$_POST['term']}%'  ORDER BY recipe_id DESC;";
}else{
    $query = "SELECT recipe_name,recipe_image,recipe_id FROM recipes ORDER BY recipe_id DESC;";
}
$data_exclude_1 = explode(",",$_POST['data_exclude_1']);

$output = "";
if($result = mysqli_query($conn,$query)){
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
    if(!in_array($row['recipe_id'],$data_exclude_1)){
    $output.='<div class="_select_able_items_ _select_able_items_1" data-id="'.$row['recipe_id'].'">
    <div class="_img">
        <img src="../uploads/recipe_images/'.$row['recipe_image'].'" alt="">
    </div>
    <div class="_right_data_">
        <div class="select_able_name">'.$row['recipe_name'].'</div>
    </div>
</div>';
    }

}
echo $output;
}else{
    echo "no";
}
}else{
    echo "sql";
}
?>