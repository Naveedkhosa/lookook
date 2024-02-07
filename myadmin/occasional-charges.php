<?php include "../config.php"; 
function loadAll(){
    global $conn;
    $query = "SELECT id,DATE_FORMAT(date_start, '%d %b %Y (%a)') as date_start,DATE_FORMAT(date_end, '%d %b %Y (%a)') as date_end,amount,for_service FROM `occasional_charges` ORDER BY date_start ASC";
    if($res = mysqli_query($conn,$query)){
        if(mysqli_num_rows($res) > 0){
            return mysqli_fetch_all($res,MYSQLI_ASSOC);
        }else{
            return 0;
        }
    }
}

$services = ['Chef','Bartender','Cleaner','Waiter'];

function dates_are_in_order($first,$second){
    if(strtotime($second) >= strtotime($first)){
        return true;
    }else{
        return false;
    }
}
function validate_start_date($first){
    if(strtotime($first) >= strtotime(date("Y-m-d"))){
        return true;
    }else{
        return false;
    }
}

function date_range_exist($date_s,$date_e,$service_id){
    global $conn;
    $res = mysqli_query($conn,"SELECT * FROM `occasional_charges` WHERE (('{$date_s}' between date_start AND date_end) OR ('{$date_e}' between date_start AND date_end)) AND for_service={$service_id};");
    
    if(mysqli_num_rows($res) > 0){
        return true;
    }else{
        return false;
    }
    
}

$all_occ_charges = loadAll();

// form submit
$error = "";
$class = "hide";
$message = "";

if(isset($_POST['_btn_update'])){
    
    
    
    if(validate_start_date($_POST['date_start']) && validate_start_date($_POST['date_end'])){
        
        if(dates_are_in_order($_POST['date_start'],$_POST['date_end'])){
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $service_id = $_POST['service_id'];
            
            if($_POST['amount_increased'] > 0){
                $amount = $_POST['amount_increased'];
                
                // check duplicacy or date range matches
            
                if(date_range_exist($date_start,$date_end,$service_id)){
                    $class="error";
                    $error = "Please choose unique date range for  {$services[$service_id-1]} Service. It should not collapse with created date ranges for {$services[$service_id-1]} Service. This is collapsing with either start date or end date.";
                }else{
                    // every thing is okay  
                }
                
            }else{
                $error = "The amount should be greater than 0";
            }
            
           
            
        }else{
            $error = "Ending date should be greater than or equal to starting  date";
        }
        
    }else{
        $error = "You can't choose past dates";
    }
    
   
    if($error == ""){
            $query_to_create = "INSERT INTO `occasional_charges`(`date_start`, `date_end`, `amount`, `created_on`,`for_service`) VALUES ('{$date_start}','{$date_end}',{$amount},CURRENT_TIMESTAMP(),{$service_id});";
            
            if(mysqli_query($conn,$query_to_create)){
                $class = "success";
                $message = "Additional charge of amount ₹{$amount} on bookings for {$services[$service_id-1]} Service from {$date_start} to {$date_end} created successfully.";
                $all_occ_charges = loadAll();
                
                $_POST['date_start'] = "";
                $_POST['date_end'] = "";
                $_POST['amount_increased'] = 0;
                
            }else{
                $class = "error";
                $message = "Something went wrong, while creating new record. Please try again or report to developer.";
            }
        
    }else{
         $class="error";
         $message = $error;
       
    }
}


// delete it
if(isset($_GET['action']) && $_GET['action'] =="delete" && isset($_GET['id']) && $_GET['id'] >0){
    $d_id = $_GET['id'];
    if(mysqli_query($conn,"DELETE FROM occasional_charges WHERE id={$d_id};")){
        $all_occ_charges = loadAll();
        
        $class = "success";
        $message = "Record deleted Successfully";
    }else{
        $class= "error";
        $message = "Something went wrong, Try again later";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Occasional fee | Look My Cook</title>

    <!-- css link -->


    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/alert_box.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    
    
    /*
    * Ocassional Charges
    */
    .occasional_charges_container{
        padding:20px 10px;
        background:#eee;
    }
    .occasional_charges_container .occasional_charges_heading{
         color:green !important;
         font-size:22px;
         background:transparent !important;
         padding: 7px 0 !important;
    }
    .occasional_charges{
        width:100%;
        padding:20px;
        background:#f5f5f5;
    }
    
    .occasional_charges .message{
        padding:10px;
        border-radius:5px;
        background:#eee;
        font-size:14px;
        line-height:calc(14 * 1.3px);
    }
    
    .occasional_charges .message.error{
        color:red;
    }
    
    .occasional_charges .message.success{
        color:green;
    }
    
     .occasional_charges .message.hide{
         display:none;
     }
    
 
 .occasional_charges .input_box{
     margin-top:10px;
 }
    
    .occasional_charges .input_box input,.occasional_charges .input_box select{
        width: 100%;
        padding: 7px 10px;
        border: none;
        outline: none;
        border: 1px solid #c5c5c5;
        border-radius: 3px 3px;
        text-align: start;
        font-size: 14px;
    }
    
    .occasional_charges .input_box label{
        display:block;
        font-size:16px;
        padding:5px 0 !important;
        text-transform:capitalize;
        color:#777;
    }
    #increase_feeses{
        width:100%;
        border:none;
        outline:none;
        margin:15px 0;
        padding:7px 15px;
        background: green;
        border-radius: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
        
    }
    
    /* table */
    
    .table-container{
        background:#f5f5f5;
        padding:20px;
    }

    table {
      table-layout: fixed;
      width: 100%;
      border-collapse: collapse;
    }
    
    .caption{
       padding:10px 0;
       width:100%;
       text-align:left;
    }
    
   
    
    th,
    td {
      padding: 20px;
    }


    thead th {
      font-family: "Rock Salt", cursive;
      text-align: center;
    }
    
    th {
      letter-spacing: 2px;
    }
    
    td {
      letter-spacing: 1px;
    }
    
    td a.delete{
        padding:5px 10px;
        background:red;
        color:#fff;
        border:none;
        outline:none;
        cursor:pointer;
        border-radius:3px;
    }
    tbody td {
      text-align: center;
    }
    
   


    </style>

</head>

<body>


    <?php include "dashboard_header.php"; ?>
    
    
    <!-- #occasional charges -->
    <div class="occasional_charges_container">
            <h1 class="occasional_charges_heading">Create New</h1>
            <form class="occasional_charges" method="post" action="occasional-charges">
                <div class="message <?= $class; ?>">
                    <?= $message??"" ?>
                </div>
                
                <div class="input_box">
                  <label>Service</label>
                  <select name="service_id">
                      <option value="1">Chef</option>
                      <option value="2">Bartender</option>
                      <option value="3">Cleaner</option>
                      <option value="4">Waiter</option>
                  </select>
                 </div>
    
                <div class="input_box">
                  <label>Start Date</label>
                  <input type="date" name="date_start" value="<?= $_POST['date_start']??"" ?>" required id="date_start" placeholder="Starting date">
                 </div>
    
                <div class="input_box">
                      <label>End Date</label>
                      <input type="date" value="<?= $_POST['date_end']??"" ?>" name="date_end" required id="date_end" placeholder="Ending date">
                </div>
                
                <div class="input_box">
                     <label>Amount (INR)</label>
                     <input type="number" required name="amount_increased" id="amount_increased" value="<?= $_POST['amount_increased']??0 ?>" placeholder="amount to be added in all below prices for an event" min="0">
                </div>
                <input type="submit" class="_btn_update1" name="_btn_update" id="increase_feeses" value="Save Changes">

        </form>
        
        <br>
        <p class="caption">
            All Occasional Charges - records
        </p>
        <div class="table-container">
            <table border="1">
          <thead>
            <tr>
              <th scope="col">No.#</th>
              <th scope="col">Service</th>
              <th scope="col">Starting Date</th>
              <th scope="col">Ending Date</th>
              <th scope="col">Amount</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              
              <?php
              $i = 0;
              if($all_occ_charges != 0){
              foreach($all_occ_charges as $charge_item){ ?>
              
             
            <tr>
              <td><?= ++$i ?></td>
              <td><?= $services[$charge_item['for_service']-1] ?></td>
              <td><?= $charge_item['date_start'] ?></td>
              <td><?= $charge_item['date_end'] ?></td>
              <td><?= $charge_item['amount'] ?></td>
              <td>
               <a class="delete" href="?action=delete&id=<?= $charge_item['id'] ?>">Delete</a>
              </td>
            </tr>
            
             <?php } 
             }else{
             ?>
             <tr>
                <td colspan="6" style="color:#777;text-align:center;">No record found</td>
             </tr>
             <?php } ?>
            
          </tbody>
        </table>

        </div>
        <!--table-->
    </div>
    


            
           
       
  
  
   


    <!-- CONTENT -->




    <?php include "dashboard_footer.php"; ?>

    
</body>

</html>