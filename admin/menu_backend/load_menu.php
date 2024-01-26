<?php 
include "../../config.php"; 
// ORDER BY `menu_c_name` ASC;
$menu_categories_query_row_output = "";
$menu_categories_query = "SELECT * FROM `menu_categories`";
if($menu_categories_query_result = mysqli_query($conn,$menu_categories_query)){
if(mysqli_num_rows($menu_categories_query_result) > 0){
   while($menu_categories_query_result_row = mysqli_fetch_assoc($menu_categories_query_result)){
        $menu_categories_query_row_output .='<tr>
        <td>'.$menu_categories_query_result_row['menu_c_id'].'</td>
        <td>'.$menu_categories_query_result_row['menu_c_name'].'</td>
        <td>'.$menu_categories_query_result_row['menu_c_items'].'</td>
        <td>'.$menu_categories_query_result_row['menu_c_created_date'].'</td>
       </tr>'; 
    }
   
    echo $menu_categories_query_row_output;
   
}else{
    echo "<tr><td colspan='4' style='color:#c5c5c5;'>No Record was found</td></tr>";
}
}else{
    echo "<tr><td colspan='4' style='color:#c5c5c5;'>Some issue has occured while loading. Please report.</td></tr>";
    
}

// <td><button class="_user_edit_btn" id="'.$menu_categories_query_result_row['menu_c_id'].'">Edit</button></td>
// <td><button class="_user_delete_btn" id="'.$menu_categories_query_result_row['menu_c_id'].'">Delete</button></td>


?>