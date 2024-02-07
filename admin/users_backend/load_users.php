<?php 
include "../../config.php"; 

if(isset($_POST['search_term'])){

    $search_term = $_POST['search_term'];
    $users_query_result_row_output = "<tr><td colspan='9' style='color:#919191;'>No Record was found</td></tr>";
    if($search_term=="*"){
        $start = 0;
        $limit = 5000;
        $users_query = "SELECT * FROM `users` LIMIT {$start},{$limit};";
    }else{
        $users_query = "SELECT * FROM `users` WHERE first_name LIKE '%$search_term%' OR last_name LIKE '%$search_term%' OR user_original_number LIKE '%$search_term%';";
    }

    if($users_query_result = mysqli_query($conn,$users_query)){
        if(mysqli_num_rows($users_query_result) > 0){
            $users_query_result_row_output = "";
            
            
            while($users_query_result_row = mysqli_fetch_assoc($users_query_result)){
                $users_query_result_row_output .='<tr>
                <td>'.$users_query_result_row['user_id'].'</td>
                <td>'.$users_query_result_row['first_name'].' '.$users_query_result_row['last_name'].'</td>
        <td>'.$users_query_result_row['user_original_number'].'</td>
        <td>'.$users_query_result_row['joined_on'].'</td>
        <td><a class="_user_edit_btn" href="export-user.php?u='.$users_query_result_row['user_id'].'" id="'.$users_query_result_row['user_id'].'">Export Data</a></td>
        </tr>'; 
    }
    
}else{
    $users_query_result_row_output = "<tr><td colspan='5' style='color:#c5c5c5;'>No Record was found</td></tr>";
}

echo $users_query_result_row_output;

}else{
    echo "Some issue has occured.Please report.";
}

}

?>