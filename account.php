<?php
include 'config.php';
if (isset($_SESSION['logged_user_id'])) {
  $user_id = $_SESSION['logged_user_id'];

  /**
   * get user detail
   */

  $sql = "SELECT * FROM users WHERE user_id={$user_id}";
  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
    } else {
      header("Location:login?location=" . urlencode($_SERVER['REQUEST_URI']));
    }
  }
} else {
  header("Location:login");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Account Details | Look My Cook</title>
  <link rel="stylesheet" href="components/css/style.css" />
  <link rel="stylesheet" href="components/css/style_pop_up.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!-- alertify.js styles -->
  <link rel="stylesheet" href="libs/alertifyjs/css/alertify.min.css">
  <link rel="stylesheet" href="libs/alertifyjs/css/themes/default.css">
</head>

<body>
  <button class="back-button" onclick="history.back()">
    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
    </svg>
    My Account
  </button>

  <!-- account details start  -->
  <div class="Myaccount_container">
    <div class="support_help_contact_cards">
      <a onclick="openPopup('popupContainer21')" class="card_contact">
        <div class="card_contact_icn">
          <iconify-icon icon="material-symbols:manage-accounts"></iconify-icon>
        </div>
        <div class="card-conatct_con">
          <p class="_head_solid_smal">Account Details</p>
          <p class="para_p space_top">Name, Mobile Number</p>
        </div>
      </a>
      <a onclick="openPopup('popupContainer23')" class="card_contact">
        <div class="card_contact_icn">
          <iconify-icon icon="fluent:wallet-credit-card-16-regular"></iconify-icon>
        </div>
        <div class="card-conatct_con">
          <p class="_head_solid_smal">My Wallet</p>
          <p class="para_p space_top">Reward and transection</p>
        </div>
      </a>
      <a onclick="openPopup('popupContainer22')" class="card_contact">
        <div class="card_contact_icn">
          <iconify-icon icon="mdi:home-location"></iconify-icon>
        </div>
        <div class="card-conatct_con">
          <p class="_head_solid_smal">My address</p>
          <p class="para_p space_top">New Address & Saved Address</p>
        </div>
      </a>

    </div>
  </div>
  <!-- account details end  -->

  <!-- bottom menu start ... -->
  <!-- bottom nav include -->
  <?php include "inc/bottom_nav.php"; ?>




  <!--  popup21 of my account-->
  <!-- Add more popup containers with different IDs -->
  <div id="popupContainer21" class="popup-container" style="display: none;">
    <button class="back-button" onclick="closePopup('popupContainer21')">
      <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
      </svg>
      Account Details
    </button>
    <div class="popup">
      <div class="popup-content">
        <!-- Your scrollable content goes here -->
        <div class="accnt_detail_section">
          <div class="main_box_input">
            <p class="space_ten solid_smal">Your Name</p>
            <div class="input_box">
              <p class="para_gray" id="my_fullname">
                <?php if (empty($user['first_name']) && empty($user['last_name'])) : ?>
                  Please edit to add your name
                <?php else : ?>
                  <?= $user['first_name'] . " " . $user['last_name'] ?>
                <?php endif; ?>
              </p>
              <p onclick="openModal('modal17')" class="para_gray"><span class="malta">Edit</span> </p>
            </div>
          </div>
          <div class="main_box_input">
            <p class="space_ten solid_smal">Mobile No</p>
            <div class="input_box">
              <p class="para_gray" id="my_mobile_number_content"><?= $user['user_original_number'] ?? "" ?></p>
              <p onclick="openModal('modal18')" class="para_gray"><span class="malta">Edit</span> </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- bottom menu start ... -->
    <!-- bottom nav include -->
    <?php include "inc/bottom_nav.php"; ?>
    <!-- bottom menu start ... -->
  </div>

  <!--  popup21 of my account-->

  <!-- pop up of Edit name -->
  <div id="modal17" class="modal">
    <div class="popup1">
      <p class="heading_p">Edit your details</p>
      <a class="close" href="#"><svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg></a>
      <div class="content1">

        <div class="btm_pop_edit">
          <div class="main_box_input">
            <p class="space_ten solid_smal">First Name</p>
            <div class="input_box">
              <input type="text" value="<?= $user['first_name'] ?? '' ?>" placeholder="e.g John" id="first_name">
            </div>
          </div>
          <div class="main_box_input">
            <p class="space_ten solid_smal">Last Name</p>
            <div class="input_box">
              <input type="text" value="<?= $user['last_name'] ?? '' ?>" placeholder="e.g Doe" id="last_name">
            </div>
          </div>
          <button class="malta_bg twobatun" id="update_names">Update</button>

        </div>
      </div>
    </div>
  </div>
  <!-- pop up of Edit name -->
  <!-- pop up of Edit phone no -->
  <div id="modal18" class="modal">
    <div class="popup1">
      <p class="heading_p">Details</p>
      <a class="close" href="#"><svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg></a>
      <div class="content1">


        <div class="btm_pop_edit">
          <div class="main_box_input">
            <p class="space_ten solid_smal">Update Your Phone no</p>
            <div class="input_box">
              <input type="text" value="<?= $user['user_original_number'] ?? '' ?>" maxlength="10" placeholder="e.g 0123456789" id="mobile_number">
            </div>
          </div>

          <button class="malta_bg twobatun" id="update_phone_number">Update</button>

        </div>
      </div>
    </div>
  </div>
  <!-- pop up of Edit Phone no -->
  <!--  popup22 of my account-->
  <!-- Add more popup containers with different IDs -->
  <div id="popupContainer22" class="popup-container" style="display: none;">
    <button class="back-button" onclick="closePopup('popupContainer22')">
      <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
      </svg>
      Account Details
    </button>
    <div class="popup">
      <div class="popup-content">
        <!-- Your scrollable content goes here -->
        <div class="accnt_detail_section">
          <div class="main_box_input">
            <p class="space_ten solid_smal">Your Address </p>
            <div class="input_box">
              <p class="para_gray" id="user_address_content"><?= $user['user_address'] == "" ? "Please click edit to enter your address" : $user['user_address'] ?></p>
              <p onclick="openModal('modal19')" class="para_gray"><span class="malta">Edit</span> </p>
            </div>
          </div>

        </div>



      </div>
    </div>
    <!-- bottom menu start ... -->
    <!-- bottom nav include -->
    <?php include "inc/bottom_nav.php"; ?>
    <!-- bottom menu start ... -->
  </div>
  <!--  popup22 of my account-->


  <!-- pop up of Edit phone no -->
  <div id="modal19" class="modal">
    <div class="popup1">
      <p class="heading_p">Address update</p>
      <a class="close" href="#"><svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg></a>
      <div class="content1">


        <div class="btm_pop_edit">
          <div class="main_box_input">
            <p class="space_ten solid_smal">Update Your Address</p>
            <div class="input_box">
              <input type="text" id="user_address" placeholder="A1 , Chattarpur Enclave, Chattarpur, Delhi">
            </div>
          </div>

          <button class="malta_bg twobatun" id="update_user_address">Update</button>

        </div>
      </div>
    </div>
  </div>
  <!-- pop up of Edit Address -->
  <!--  popup23 of my account-->
  <!-- Add more popup containers with different IDs -->
  <div id="popupContainer23" class="popup-container" style="display: none;">
    <button class="back-button" onclick="closePopup('popupContainer23')">
      <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
      </svg>
      Wallet Details
    </button>
    <div class="popup">
      <div class="popup-content">
        <!-- Your scrollable content goes here -->
        <div class="accnt_detail_section wallet_section">
          <div class="wallet_container">
            <p class="para_gray">Hello!</p>
            <p class="para_p_active" id="wallet_address_name"><?= $user['first_name'] . " " . $user['last_name']; ?></p>
            <div class="wallet_card">
              <div class="bg_wallet_icon1">
                <iconify-icon icon="solar:chef-hat-heart-line-duotone"></iconify-icon>
              </div>
              <div class="bg_wallet_icon2">
                <iconify-icon icon="solar:chef-hat-heart-line-duotone"></iconify-icon>
              </div>
              <div class="bg_wallet_icon3">
                <iconify-icon icon="solar:chef-hat-heart-line-duotone"></iconify-icon>
              </div>
              <div class="bg_wallet_icon4">
                <iconify-icon icon="solar:chef-hat-heart-line-duotone"></iconify-icon>
              </div>
              <div class="wallet_card_balance">
                <p class="solid_hsmal">Total Balance</p>
                <p class="Balance_p">&#x20B9; <?= $user['wallet_balance'] ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- bottom menu start ... -->
    <!-- bottom nav include -->
    <?php include "inc/bottom_nav.php"; ?>


  </div>
  <!--  popup23 of my account-->

  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="components/js/js.js"></script>
  <script src="components/js/jquery-3.7.1.slim.min.js"></script>
  <script src="static/js/jquery.js"></script>
  <script src="libs/alertifyjs/alertify.min.js"></script>
  <script src="static/js/my_account.js"></script>


</body>

</html>