<?php 
include "../../config.php";
$query = "SELECT * FROM recipes ORDER BY recipe_id DESC;";
$output = "";
if($result = mysqli_query($conn,$query)){
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
    $output.='<div class="card">
    <div class="_card_img">
    <img src="../uploads/recipe_images/'.$row['recipe_image'].'" alt="'.$row['recipe_name'].'">
    </div>
    <div class="card-info">
        <h3>'.$row['recipe_name'].'</h3>
    </div>
    <div class="_delete_btn" data-id="'.$row['recipe_id'].'">
    <svg  width="18" height="18" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>
    </div>
</div>';
}
echo $output;
}else{
    echo "<p style='color:red;width:100%;padding:10px 0px;'>No record was found.</p>";
}
}else{
    echo "<p style='color:red;width:100%;padding:10px 0px;'>We are sorry. Some issue has occured.</p>";
}
?>