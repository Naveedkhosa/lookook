<?php
include_once "../../config.php";
$limit = 12;
$start = 0;
$result['success'] = false;
$result['msg'] = "Something went wrong";
if (isset($_POST['item_type']) && isset($_POST['start'])) {


    $menu_item_type = $_POST['item_type'];
    $start = $_POST['start'];

    if (isset($_POST['search']) && $_POST['search'] != "") {

        $search_term = $_POST['search'];
        if ($menu_item_type == "both") {
            if ($start == 0) {
                $total_count_query = "SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE menu_categories.menu_c_name = 'Desserts' AND `menu_item_name` LIKE '%{$search_term}%';";
                $total_count_result = mysqli_query($conn,$total_count_query);
                $result['total'] = mysqli_num_rows($total_count_result);
            }
            $select_query = "SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE menu_categories.menu_c_name = 'Desserts' AND `menu_item_name` LIKE '%{$search_term}%' LIMIT $start, $limit;";
        } else {
            if ($start == 0) {
                $total_count_query = "SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE  menu_categories.menu_c_name = 'Desserts' AND `menu_item_name` LIKE '%{$search_term}%' AND menu_items.menu_item_type='{$menu_item_type}';";
                $total_count_result = mysqli_query($conn,$total_count_query);
                $result['total'] = mysqli_num_rows($total_count_result);
            }
            $select_query = "SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE  menu_categories.menu_c_name = 'Desserts' AND `menu_item_name` LIKE '%{$search_term}%' AND menu_items.menu_item_type='{$menu_item_type}' LIMIT $start, $limit;";
        }
    } else {

        if ($menu_item_type == "both") {
            if ($start == 0) {
                $total_count_query = "SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE menu_categories.menu_c_name = 'Desserts';";
                $total_count_result = mysqli_query($conn,$total_count_query);
                $result['total'] = mysqli_num_rows($total_count_result);
            }
            $select_query = "SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE menu_categories.menu_c_name = 'Desserts' LIMIT $start, $limit;";
        } else {
            if ($start == 0) {
                $total_count_query = "SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE menu_categories.menu_c_name = 'Desserts' AND menu_items.menu_item_type='{$menu_item_type}'";
                $total_count_result = mysqli_query($conn,$total_count_query);
                $result['total'] = mysqli_num_rows($total_count_result);
            }
            $select_query = "SELECT `menu_item_id`, `menu_item_name`,`menu_item_feature_img`, `menu_item_price`, `menu_item_type`,`is_chef_special` FROM `menu_items` INNER JOIN menu_categories ON menu_items.menu_item_category=menu_categories.menu_c_id WHERE menu_categories.menu_c_name = 'Desserts' AND menu_items.menu_item_type='{$menu_item_type}' LIMIT $start, $limit;";
        }
    }


    if ($select_query_result = mysqli_query($conn, $select_query)) {
        if (mysqli_num_rows($select_query_result) > 0) {
            $result['success'] = true;
            $result['start'] = (int)$start;
            $result['limit'] = $limit;
            $result['success'] = true;
            $result['dishes'] = mysqli_fetch_all($select_query_result,true);
            $result['msg'] = "Loaded successfully";
        } else {
            if($start==0){
                $result['zero'] = true;
                $result['msg'] = "No dish was found."; 
            }else{
                $result['msg'] = "All loaded successfully.";
            }
        }
    }
}
die(json_encode($result));
