<?php 
include "../../config.php";
if(isset($_POST['app_term'])){
    $query = "SELECT appliance_name,appliance_image,appliance_id FROM appliances WHERE appliance_name LIKE '%{$_POST['app_term']}%'  ORDER BY appliance_id DESC;";
}else{
    $query = "SELECT appliance_name,appliance_image,appliance_id FROM appliances ORDER BY appliance_id DESC;";
}

$data_exclude_2 = explode(",",$_POST['data_exclude_2']);

$output = "";
if($result = mysqli_query($conn,$query)){
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
    if(!in_array($row['appliance_id'],$data_exclude_2)){
        $output.='<div class="_select_able_items_ _select_able_items_2" data-id="'.$row['appliance_id'].'">
    <div class="_img">
        <img src="../uploads/appliances_images/'.$row['appliance_image'].'" alt="">
    </div>
    <div class="_right_data_">
        <div class="select_able_name">'.$row['appliance_name'].'</div>
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