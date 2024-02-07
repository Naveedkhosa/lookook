<?php
include "../../config.php";

function getExtracharge($b_date,$ser_id){
    global $conn;
    if($resul = mysqli_query($conn,"SELECT  `amount` FROM `occasional_charges` WHERE ('{$b_date}' BETWEEN date_start AND date_end) AND for_service={$ser_id};")){
        
        if(mysqli_num_rows($resul) > 0){
            return mysqli_fetch_assoc($resul)['amount'];
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}

// getExtracharge($date_is_w);

if (isset($_POST['s_is_w'])) {
  $s_is_w = mysqli_real_escape_string($conn, $_POST['s_is_w']);
  $time_is_w = mysqli_real_escape_string($conn, $_POST['time_is_w']);
  //new-data
  if(isset($_POST['date_is_w'])){
    $date_is_w = mysqli_real_escape_string($conn, $_POST['date_is_w']);
  }else{
    $date_is_w = "";
  }
  //new-data

  $time_array = explode("-", $time_is_w);
  $arrival_time = $time_array[1];
  if ($arrival_time > 12) {
    $arrival_time = $arrival_time - 12;
  }
  $arrival_time_medit = $time_array[2];
  if ($arrival_time_medit == "p") {
    $final_time = $arrival_time . ":00 " . "PM";
  } else if ($arrival_time_medit == "a") {
    $final_time = $arrival_time . ":00 " . "AM";
  }


  if ($s_is_w == 1) {
    $service_name = 'chef';
    $guests = $_POST['guests'];
    $dish_count = 0;
    $dish_prices = 0;
    $dish_varieties = 0;
    
    // @breakfast items
    $breakfast_items = $_POST['breakfast_items'];
    $soap_items = $_POST['soap_items'];
    // @breakfast items

    // @lunch items
    $lunch_appetizer = $_POST['lunch_appetizer'];
    $lunch_maincourse = $_POST['lunch_maincourse'];
    $lunch_rice_raita = $_POST['lunch_rice_raita'];
    $lunch_desserts = $_POST['lunch_desserts'];
    $lunch_soup_beverages = $_POST['lunch_soup_beverages'];
    // @lunch items

    // @dinner items
    $dinner_appetizer = $_POST['dinner_appetizer'];
    $dinner_maincourse = $_POST['dinner_maincourse'];
    $dinner_rice_raita = $_POST['dinner_rice_raita'];
    $dinner_desserts = $_POST['dinner_desserts'];
    $dinner_soup_beverages = $_POST['dinner_soup_beverages'];
    // @dinner items


    // breakfast item 1
    if ($breakfast_items != "no" && $breakfast_items != "") {
      $dish_varieties = $dish_varieties + 1; //as it as
      $breakfast_items_array = explode(",", $breakfast_items);

      for ($i = 1; $i < count($breakfast_items_array); $i++) {
        $breakfast_item = explode("_", $breakfast_items_array[$i]);
        $breakfast_item = end($breakfast_item);
        $dish_q_b = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$breakfast_item};";
        if ($b_result = mysqli_query($conn, $dish_q_b)) {
          if (mysqli_num_rows($b_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($b_result)['menu_item_price'];//as it as
            $dish_count++; // as it as
          }

        }

      }
    }
    
    // soap_items counting
    if ($soap_items != "no" && $soap_items != "") {
      $dish_varieties = $dish_varieties + 1; //as it as
      $soap_items_array = explode(",", $soap_items);

      for ($i = 1; $i < count($soap_items_array); $i++) {
        $soap_items_item = explode("_", $soap_items_array[$i]);
        $soap_items_item = end($soap_items_item);
        $soap_items_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$soap_items_item};";
        if ($soap_items_result = mysqli_query($conn, $soap_items_query)) {
          if (mysqli_num_rows($soap_items_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($soap_items_result)['menu_item_price'];//as it as
            $dish_count++; // as it as
          }

        }

      }
    }
    // soap_items counting
    // breakfast items

    // @lunch items

    // lunch_appetizer counting
    if ($lunch_appetizer != "no" && $lunch_appetizer != "") {
      $dish_varieties = $dish_varieties + 1; //as it as
      $lunch_appetizer_array = explode(",", $lunch_appetizer);

      for ($i = 1; $i < count($lunch_appetizer_array); $i++) {
        $lunch_appetizer_item = explode("_", $lunch_appetizer_array[$i]);
        $lunch_appetizer_item = end($lunch_appetizer_item);
        $lunch_appetizer_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$lunch_appetizer_item};";
        if ($lunch_appetizer_result = mysqli_query($conn, $lunch_appetizer_query)) {
          if (mysqli_num_rows($lunch_appetizer_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($lunch_appetizer_result)['menu_item_price'];//as it as
            $dish_count++; // as it as
          }

        }

      }
    }
    // lunch_appetizer counting


    // lunch_maincourse counting
    if ($lunch_maincourse != "no" && $lunch_maincourse != "") {
      $dish_varieties = $dish_varieties + 1; //as it as
      $lunch_maincourse_array = explode(",", $lunch_maincourse);

      for ($i = 1; $i < count($lunch_maincourse_array); $i++) {
        $lunch_maincourse_item = explode("_", $lunch_maincourse_array[$i]);
        $lunch_maincourse_item = end($lunch_maincourse_item);
        $lunch_maincourse_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$lunch_maincourse_item};";
        if ($lunch_maincourse_result = mysqli_query($conn, $lunch_maincourse_query)) {
          if (mysqli_num_rows($lunch_maincourse_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($lunch_maincourse_result)['menu_item_price'];//as it as
            $dish_count++; // as it as
          }

        }

      }
    }
    // lunch_maincourse counting

    // lunch_rice_raita counting
    if ($lunch_rice_raita != "no" && $lunch_rice_raita != "") {
      $dish_varieties = $dish_varieties + 1; //as it as
      $lunch_rice_raita_array = explode(",", $lunch_rice_raita);

      for ($i = 1; $i < count($lunch_rice_raita_array); $i++) {
        $lunch_rice_raita_item = explode("_", $lunch_rice_raita_array[$i]);
        $lunch_rice_raita_item = end($lunch_rice_raita_item);
        $lunch_rice_raita_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$lunch_rice_raita_item};";
        if ($lunch_rice_raita_result = mysqli_query($conn, $lunch_rice_raita_query)) {
          if (mysqli_num_rows($lunch_rice_raita_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($lunch_rice_raita_result)['menu_item_price'];//as it as
            $dish_count++; // as it as
          }

        }

      }
    }
    // lunch_rice_raita counting
    // lunch_desserts counting
    if ($lunch_desserts != "no" && $lunch_desserts != "") {
      $dish_varieties = $dish_varieties + 1; //as it as
      $lunch_desserts_array = explode(",", $lunch_desserts);

      for ($i = 1; $i < count($lunch_desserts_array); $i++) {
        $lunch_desserts_item = explode("_", $lunch_desserts_array[$i]);
        $lunch_desserts_item = end($lunch_desserts_item);
        $lunch_desserts_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$lunch_desserts_item};";
        if ($lunch_desserts_result = mysqli_query($conn, $lunch_desserts_query)) {
          if (mysqli_num_rows($lunch_desserts_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($lunch_desserts_result)['menu_item_price'];//as it as
            $dish_count++; // as it as
          }

        }

      }
    }
    // lunch_desserts counting

    // lunch_soup_beverages counting
    if ($lunch_soup_beverages != "no" && $lunch_soup_beverages != "") {
      $dish_varieties = $dish_varieties + 1; //as it as
      $lunch_soup_beverages_array = explode(",", $lunch_soup_beverages);

      for ($i = 1; $i < count($lunch_soup_beverages_array); $i++) {
        $lunch_soup_beverages_item = explode("_", $lunch_soup_beverages_array[$i]);
        $lunch_soup_beverages_item = end($lunch_soup_beverages_item);
        $lunch_soup_beverages_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$lunch_soup_beverages_item};";
        if ($lunch_soup_beverages_result = mysqli_query($conn, $lunch_soup_beverages_query)) {
          if (mysqli_num_rows($lunch_soup_beverages_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($lunch_soup_beverages_result)['menu_item_price'];//as it as
            $dish_count++; // as it as
          }

        }

      }
    }
    // lunch_soup_beverages counting


    // @lunch
    

    // @dinner items

// dinner_appetizer counting
if ($dinner_appetizer != "no" && $dinner_appetizer != "") {
  $dish_varieties = $dish_varieties + 1; //as it as
  $dinner_appetizer_array = explode(",", $dinner_appetizer);

  for ($i = 1; $i < count($dinner_appetizer_array); $i++) {
    $dinner_appetizer_item = explode("_", $dinner_appetizer_array[$i]);
    $dinner_appetizer_item = end($dinner_appetizer_item);
    $dinner_appetizer_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$dinner_appetizer_item};";
    if ($dinner_appetizer_result = mysqli_query($conn, $dinner_appetizer_query)) {
      if (mysqli_num_rows($dinner_appetizer_result) > 0) {
        $dish_prices = $dish_prices + mysqli_fetch_assoc($dinner_appetizer_result)['menu_item_price'];//as it as
        $dish_count++; // as it as
      }

    }

  }
}
// dinner_appetizer counting

// dinner_maincourse counting
if ($dinner_maincourse != "no" && $dinner_maincourse != "") {
  $dish_varieties = $dish_varieties + 1; //as it as
  $dinner_maincourse_array = explode(",", $dinner_maincourse);

  for ($i = 1; $i < count($dinner_maincourse_array); $i++) {
    $dinner_maincourse_item = explode("_", $dinner_maincourse_array[$i]);
    $dinner_maincourse_item = end($dinner_maincourse_item);
    $dinner_maincourse_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$dinner_maincourse_item};";
    if ($dinner_maincourse_result = mysqli_query($conn, $dinner_maincourse_query)) {
      if (mysqli_num_rows($dinner_maincourse_result) > 0) {
        $dish_prices = $dish_prices + mysqli_fetch_assoc($dinner_maincourse_result)['menu_item_price'];//as it as
        $dish_count++; // as it as
      }

    }

  }
}
// dinner_maincourse counting

// dinner_rice_raita counting
if ($dinner_rice_raita != "no" && $dinner_rice_raita != "") {
  $dish_varieties = $dish_varieties + 1; //as it as
  $dinner_rice_raita_array = explode(",", $dinner_rice_raita);

  for ($i = 1; $i < count($dinner_rice_raita_array); $i++) {
    $dinner_rice_raita_item = explode("_", $dinner_rice_raita_array[$i]);
    $dinner_rice_raita_item = end($dinner_rice_raita_item);
    $dinner_rice_raita_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$dinner_rice_raita_item};";
    if ($dinner_rice_raita_result = mysqli_query($conn, $dinner_rice_raita_query)) {
      if (mysqli_num_rows($dinner_rice_raita_result) > 0) {
        $dish_prices = $dish_prices + mysqli_fetch_assoc($dinner_rice_raita_result)['menu_item_price'];//as it as
        $dish_count++; // as it as
      }

    }

  }
}
// dinner_rice_raita counting
// dinner_desserts counting
if ($dinner_desserts != "no" && $dinner_desserts != "") {
  $dish_varieties = $dish_varieties + 1; //as it as
  $dinner_desserts_array = explode(",", $dinner_desserts);

  for ($i = 1; $i < count($dinner_desserts_array); $i++) {
    $dinner_desserts_item = explode("_", $dinner_desserts_array[$i]);
    $dinner_desserts_item = end($dinner_desserts_item);
    $dinner_desserts_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$dinner_desserts_item};";
    if ($dinner_desserts_result = mysqli_query($conn, $dinner_desserts_query)) {
      if (mysqli_num_rows($dinner_desserts_result) > 0) {
        $dish_prices = $dish_prices + mysqli_fetch_assoc($dinner_desserts_result)['menu_item_price'];//as it as
        $dish_count++; // as it as
      }

    }

  }
}
// dinner_desserts counting

// dinner_soup_beverages counting
if ($dinner_soup_beverages != "no" && $dinner_soup_beverages != "") {
  $dish_varieties = $dish_varieties + 1; //as it as
  $dinner_soup_beverages_array = explode(",", $dinner_soup_beverages);

  for ($i = 1; $i < count($dinner_soup_beverages_array); $i++) {
    $dinner_soup_beverages_item = explode("_", $dinner_soup_beverages_array[$i]);
    $dinner_soup_beverages_item = end($dinner_soup_beverages_item);
    $dinner_soup_beverages_query = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$dinner_soup_beverages_item};";
    if ($dinner_soup_beverages_result = mysqli_query($conn, $dinner_soup_beverages_query)) {
      if (mysqli_num_rows($dinner_soup_beverages_result) > 0) {
        $dish_prices = $dish_prices + mysqli_fetch_assoc($dinner_soup_beverages_result)['menu_item_price'];//as it as
        $dish_count++; // as it as
      }

    }

  }
}
// dinner_soup_beverages counting

    // @dinner items


    $charges_ = "SELECT `fees` FROM `charges` WHERE service_id = {$s_is_w} AND {$guests} BETWEEN min_guest AND max_guest;";
    $t_query = "SELECT `tax_id`, `tax_name`, `tax_percentage`, `tax_last_updated` FROM `tax` WHERE `tax_name` = 'GST';";




    if ($charges = mysqli_query($conn, $charges_)) {
      if (mysqli_num_rows($charges) > 0) {
        $row = mysqli_fetch_assoc($charges);
        $charge = $row['fees'] + getExtracharge($date_is_w,$s_is_w);


        $gst_tax = 0;
        $is_tax = false;
        if ($t_result = mysqli_query($conn, $t_query)) {
          if (mysqli_num_rows($t_result) > 0) {
            $t_row = mysqli_fetch_assoc($t_result);
            $t_percentage = $t_row['tax_percentage'];
            $t_name = trim($t_row['tax_name']);
            $gst_tax = round((($charge + $dish_prices) / 100) * $t_percentage);
            $is_tax = true;
          }

        }

        $total_amount = $charge + $gst_tax + $dish_prices;
        $pay_adv = round(($total_amount / 100) * 40);
        $pay_remaining = $total_amount - $pay_adv;




        $arr = array(
          "service_name" => $service_name,
          "bartender_fee" => $charge,
          "total_amount" => $total_amount,
          "pay_adv" => $pay_adv,
          "final_time" => $final_time,
          "pay_remaining" => $pay_remaining,
          "gst_tax" => $gst_tax,
          "t_name" => $t_name,
          "t_percentage" => $t_percentage,
          "dishes_variety" => $dish_varieties,
          "dishes_count" => $dish_count,
          "dish_prices" => $dish_prices,
          "people_count" => $guests,
          "discount" => 0
        );

        echo json_encode($arr);

      }
    } else {
      echo json_encode(array("msg" => "Something went wrong, Please try again later"));
    }




  } else if ($s_is_w == 2) {
    $guests = $_POST['guests'];
    $service_name = 'bartender';
    $cocktails = $_POST['cocktails'];
    $mocktails = $_POST['mocktails'];
    $dish_count = 0;
    $dish_prices = 0;
    $dish_varieties = 0;

    if ($cocktails != "no") {
      $dish_varieties = $dish_varieties + 1;
      $cocktails_array = explode(",", $cocktails);

      for ($i = 1; $i < count($cocktails_array); $i++) {
        $cock = explode("_", $cocktails_array[$i]);
        $cock = end($cock);
        $dish_q_c = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$cock};";
        if ($c_result = mysqli_query($conn, $dish_q_c)) {
          if (mysqli_num_rows($c_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($c_result)['menu_item_price'];
            $dish_count++;
          }

        }

      }
    }
    if ($mocktails != "no") {
      $dish_varieties = $dish_varieties + 1;
      $mocktails_array = explode(",", $mocktails);
      for ($i = 1; $i < count($mocktails_array); $i++) {
        $mock = explode("_", $mocktails_array[$i]);
        $mock = end($mock);
        $dish_q_m = "SELECT `menu_item_price` FROM `menu_items` WHERE `menu_item_id`={$mock};";
        if ($m_result = mysqli_query($conn, $dish_q_m)) {
          if (mysqli_num_rows($m_result) > 0) {
            $dish_prices = $dish_prices + mysqli_fetch_assoc($m_result)['menu_item_price'];
            $dish_count++;
          }
        }
      }
    }

    $charges_ = "SELECT `fees` FROM `charges` WHERE service_id = {$s_is_w} AND {$guests} BETWEEN min_guest AND max_guest;";
    $t_query = "SELECT `tax_id`, `tax_name`, `tax_percentage`, `tax_last_updated` FROM `tax` WHERE `tax_name` = 'GST';";


    if ($charges = mysqli_query($conn, $charges_)) {
      if (mysqli_num_rows($charges) > 0) {
        $row = mysqli_fetch_assoc($charges);
        $charge = $row['fees']+getExtracharge($date_is_w,$s_is_w);


        $gst_tax = 0;
        $is_tax = false;
        if ($t_result = mysqli_query($conn, $t_query)) {
          if (mysqli_num_rows($t_result) > 0) {
            $t_row = mysqli_fetch_assoc($t_result);
            $t_percentage = $t_row['tax_percentage'];
            $t_name = trim($t_row['tax_name']);
            $gst_tax = round((($charge + $dish_prices) / 100) * $t_percentage);
            $is_tax = true;
          }

        }

        $total_amount = $charge + $gst_tax + $dish_prices;
        $pay_adv = round(($total_amount / 100) * 40);
        $pay_remaining = $total_amount - $pay_adv;




        $arr = array(
          "service_name" => $service_name,
          "bartender_fee" => $charge,
          "total_amount" => $total_amount,
          "pay_adv" => $pay_adv,
          "final_time" => $final_time,
          "pay_remaining" => $pay_remaining,
          "gst_tax" => $gst_tax,
          "t_name" => $t_name,
          "t_percentage" => $t_percentage,
          "dishes_variety" => $dish_varieties,
          "dishes_count" => $dish_count,
          "dish_prices" => $dish_prices,
          "people_count" => $guests,
          "discount" => 0,
          "cocktails" => $cocktails,
          "mocktails" => $mocktails
        );

        echo json_encode($arr);

      }
    } else {
      echo json_encode(array("msg" => "Something went wrong, Please try again later"));
    }



  } else if ($s_is_w == 3) {
    $service_name = 'cleaner';
    $s_query = "SELECT * FROM `services` WHERE services_id={$s_is_w};";
    $t_query = "SELECT `tax_id`, `tax_name`, `tax_percentage`, `tax_last_updated` FROM `tax` WHERE `tax_name` = 'GST';";

    if ($result = mysqli_query($conn, $s_query)) {
      if (mysqli_num_rows($result) > 0) {
        $services_row = mysqli_fetch_assoc($result);

        $waiter_s_fee = $services_row['services_fee'] + getExtracharge($date_is_w,$s_is_w);
        $gst_tax = 0;
        $is_tax = false;
        if ($t_result = mysqli_query($conn, $t_query)) {
          if (mysqli_num_rows($t_result) > 0) {
            $t_row = mysqli_fetch_assoc($t_result);
            $t_percentage = $t_row['tax_percentage'];
            $t_name = trim($t_row['tax_name']);
            $gst_tax = round(($waiter_s_fee / 100) * $t_percentage);
            $is_tax = true;
          }

        }

        $total_amount = $waiter_s_fee + $gst_tax;
        $pay_adv = round(($total_amount / 100) * 40);
        $pay_remaining = $total_amount - $pay_adv;


        $arr = array(
          "service_name" => $service_name,
          "waiter_s_fee" => $waiter_s_fee,
          "total_amount" => $total_amount,
          "pay_adv" => $pay_adv,
          "final_time" => $final_time,
          "pay_remaining" => $pay_remaining,
          "gst_tax" => $gst_tax,
          "t_name" => $t_name,
          "t_percentage" => $t_percentage,
          "discount" => 0
        );

        echo json_encode($arr);


      }
    }
  } else if ($s_is_w == 4) {
    $service_name = 'waiter';

    // waiter
    $s_query = "SELECT * FROM `services` WHERE services_id={$s_is_w};";
    $t_query = "SELECT `tax_id`, `tax_name`, `tax_percentage`, `tax_last_updated` FROM `tax` WHERE `tax_name` = 'GST';";

    if ($result = mysqli_query($conn, $s_query)) {
      if (mysqli_num_rows($result) > 0) {
        $services_row = mysqli_fetch_assoc($result);

        $waiter_s_fee = $services_row['services_fee'] + getExtracharge($date_is_w,$s_is_w);
        $gst_tax = 0;
        $is_tax = false;
        if ($t_result = mysqli_query($conn, $t_query)) {
          if (mysqli_num_rows($t_result) > 0) {
            $t_row = mysqli_fetch_assoc($t_result);
            $t_percentage = $t_row['tax_percentage'];
            $t_name = trim($t_row['tax_name']);
            $gst_tax = round(($waiter_s_fee / 100) * $t_percentage);
            $is_tax = true;
          }

        }

        $total_amount = $waiter_s_fee + $gst_tax;
        $pay_adv = round(($total_amount / 100) * 40);
        $pay_remaining = $total_amount - $pay_adv;


        $arr = array(
          "service_name" => $service_name,
          "waiter_s_fee" => $waiter_s_fee,
          "total_amount" => $total_amount,
          "pay_adv" => $pay_adv,
          "final_time" => $final_time,
          "pay_remaining" => $pay_remaining,
          "gst_tax" => $gst_tax,
          "t_name" => $t_name,
          "t_percentage" => $t_percentage,
          "discount" => 0
        );

        echo json_encode($arr);


      }
    }
    // waiter
  }



}
?>