<?php
  include 'config.php';
  if (isset($_SESSION['logged_user_id'])) {
    $user_id = $_SESSION['logged_user_id'];
    $sql = "SELECT * FROM users WHERE user_id={$user_id}";
    if($result = mysqli_query($conn,$sql)){
      if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
      }else{
        header("Location:login?location=" . urlencode($_SERVER['REQUEST_URI']));
      }
    }
  } else {
    header("Location:login?location=" . urlencode($_SERVER['REQUEST_URI']));
  }

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings | Look My Cook</title>
  <link rel="stylesheet" href="components/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

</head>

<body>
  <div class="kart_bookings_page">
    <!-- top menu start ... -->
    <div class="bottm_menu_container">
      <div class="top_menu_box">
        <div class="_logo" href="#">
          <img src="components/imag/look my cook logo.jpg" alt="" />
        </div>
        <div class="top_side_nav" id="nav_toggle_btn">
          <!-- <div class="profile_top_nav">
          <img src="components/imag/a (3).jpg" alt="" />
        </div>
        <div class="top_nav_ico">
          <iconify-icon icon="ei:navicon"></iconify-icon>
        </div> -->
          <iconify-icon icon="ei:navicon"></iconify-icon>
        </div>
      </div>
    </div>
    <!-- top menu end ... -->
    <!-- bookings section start -->
    <div class="booking_kart_section">
      <p class="heading_p margin_after_head">My Bookings</p>
      <p class="para_p">View all your booking here</p>
      <!-- booking card  -->
      <a href="service-bookings?bookings=chef" class="kart_booking_card">
        <div class="cardkart_booking_img margin_right">
          <div class="cardkart_imgimg">
            <img src="components/imag/cook.webp" alt="" loading="lazy">
          </div>
        </div>
        <div class="carrd_kart_content">
          <div class="card_con_heading">
            <p class="para_h">Chef & Cook</p>
          </div>
          <p class="para_p">See your party Chef & Cook bookings</p>
        </div>
      </a>
      <!--booking card  -->

      <!-- booking card  -->
      <a href="service-bookings?bookings=waiter" class="kart_booking_card">
        <div class="cardkart_booking_img margin_right">
          <div class="cardkart_imgimg cardkart_imgimg_pink">
            <img src="components/imag/waiter.png" alt="" loading="lazy">
          </div>
        </div>
        <div class="carrd_kart_content">
          <div class="card_con_heading">
            <p class="para_h">Waiter</p>
          </div>
          <p class="para_p">See your party Waiter bookings</p>
        </div>
      </a>
      <!-- booking card  -->

      <!-- booking card  -->
      <a href="service-bookings?bookings=bartender" class="kart_booking_card">
        <div class="cardkart_booking_img margin_right">
          <div class="cardkart_imgimg">
            <img src="components/imag/bartendar.png" alt="" loading="lazy">
          </div>
        </div>
        <div class="carrd_kart_content">
          <div class="card_con_heading">
            <p class="para_h">Bartender</p>
          </div>
          <p class="para_p">See your party bartender bookings</p>
        </div>
      </a>
      <!-- booking card  -->

      <!-- booking card  -->
      <a href="service-bookings?bookings=cleaner" class="kart_booking_card">
        <div class="cardkart_booking_img margin_right">
          <div class="cardkart_imgimg cardkart_imgimg_blue">
            <img src="components/imag/5385868.webp" alt="" loading="lazy">
          </div>
        </div>
        <div class="carrd_kart_content">
          <div class="card_con_heading">
            <p class="para_h">Cleaner <span class="Ord_active">2 Active</span></p>
          </div>
          <p class="para_p">See your party cleaner bookings</p>
        </div>
      </a>
      <!-- booking card  -->

    </div>
    <!-- bookings section start -->
  </div>


  <!-- bottom nav include -->
  <?php include "inc/bottom_nav.php"; ?>


  <!-- pop up popup of dishes -->
  <div id="modal4" class="modal">
    <div class="popup1">
      <p class="heading_p">Select Date</p>
      <a class="close" href="#">
        <svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
      </a>
      <div class="content1">
        <div class="time_bx_section date_bx_section " id="dateContainer">
          <!-- Add an ID to the element you want to update dynamically -->
          <a href="#" class="date-option" id="currentDate"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- pop up popup of dishes -->


  <!-- nav_popped_up -->
  <!-- bottom nav include -->
  <?php include "inc/navbar.php"; ?>

  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="components/js/js.js"></script>
  <script src="components/js/jquery-3.7.1.slim.min.js"></script>
  <script>
    $("#nav_toggle_btn").on("click", function() {
      $("#nav_popped_up").toggle();
    });
  </script>
</body>

</html>