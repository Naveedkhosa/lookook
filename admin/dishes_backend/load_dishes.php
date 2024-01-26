<?php 
include "../../config.php";
$query = "SELECT menu_items.menu_item_id,menu_items.menu_item_name,menu_items.menu_item_short_desc,menu_items.menu_item_type,menu_items.menu_item_feature_img,menu_items.menu_item_price,menu_categories.menu_c_name FROM menu_items INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id ORDER BY menu_item_id DESC;";
$output = "";
$type;

if($result = mysqli_query($conn,$query)){
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
    if($row['menu_item_type']=="non_veg"){
        $type = "Non Veg";
    }else{
        $type = "Veg";
    }
    $output.='<div class="dish-card">
    
    <div class="dish-image">
        <img src="../uploads/feature_imgs/'.$row['menu_item_feature_img'].'" alt="'.$row['menu_item_name'].'">
    </div>
    <div class="dish-details">
        <div class="dish-name">
            <h3>'.$row['menu_item_name'].'</h3>
            <span class="dish-price">₹'.$row['menu_item_price'].'</span>
        </div>
        <div class="dish-description">
            <p>'.$row['menu_item_short_desc'].'</p>
        </div>
        <div class="dish-info">
            <span class="dish-category"><b>'.$row['menu_c_name'].'</b> ('.$type.')</span>
            <div>
            <a class="dish-type edit-dish" style="border-color:blue;color:blue;" href="edit-dish.php?id='.$row['menu_item_id'].'">Edit</a>
            <span class="dish-type delete-dish" data-dishId="'.$row['menu_item_id'].'">Delete</span></div>
        </div>
    </div>
</div>';
}
echo $output;
}else{
    echo "<p style='color:red;width:100%;padding:10px 0px;text-align:center;'>No record was found.</p>";
}
}else{
    echo "<p style='color:red;width:100%;padding:10px 0px;text-align:center;'>We are sorry. Some issue has occured.</p>";
}
?>