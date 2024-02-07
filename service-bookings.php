<?php
include "config.php";
if (isset($_SESSION['logged_user_id'])) {
  $user_id = $_SESSION['logged_user_id'];
} else {
  header("Location:login");
}

$services = ["chef", "waiter", "cleaner", "bartender"];
if (isset($_GET['bookings']) && in_array($_GET['bookings'], $services)) {
  // get Service ID
  $service_name = $_GET['bookings'];
  $sql = "SELECT services_id FROM services WHERE services_name='{$service_name}'";
  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      $service_id = mysqli_fetch_assoc($result)['services_id'];

      $bookings = 0;
    } else {
      echo "<script>window.history.back();</script>";
    }
  } else {
    echo "<script>window.history.back();</script>";
  }
} else {
  echo "<script>window.history.back();</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bookings | Look My Cook</title>
  <link rel="stylesheet" href="components/css/style.css" />
  <link rel="stylesheet" href="components/css/style_pop_up.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>

  <button class="back-button" onclick="history.back()">
    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
    </svg>
    Bookings
  </button>


  <?php if ($bookings < 0) : ?>
    <div class="no_book_page">
      <div class="no_book_img">
        <iconify-icon icon="ion:ticket"></iconify-icon>
      </div>
      <p class="para_h ">No Bookings available</p>
      <p class="para_p space_top">Book a <?= $_GET['bookings'] ?? "Service" ?> now!</p>
      <div class="bookbtn">
        <a href="Chef_party.html">Book a <?= $_GET['bookings'] ?? "Service" ?></a>
      </div>
    </div>
  <?php else : ?>




    <!-- pending, cancelled,confirmed bookings code... -->
    <div class="service_booking_container">

      <div class="service_booking_kards">
        <!-- card of booking -->
        <div onclick="openPopup('popupContainer1')" class="service_booking_kard">
          <div class="status_booking">PENDING</div>
          <div class="kard_top">
            <div class="service_kard_img">
              <iconify-icon icon="openmoji:man-cook-medium-skin-tone"></iconify-icon>
            </div>
            <div class="kard_details">
              <p class="solid_smal">
                Chef details will be updated after full payment
              </p>
              <p class="para_gray space_ten">
                <iconify-icon icon="ic:twotone-location-on"></iconify-icon>A1,
                chattarpur Enclave, Delhi
              </p>
              <div class="kard_timing">
                <p class="para_p_active solid_hsmal">
                  <iconify-icon icon="lets-icons:date-today-duotone"></iconify-icon>
                  01 Dec 2023
                </p>
                <p class="para_p_active solid_hsmal margten">
                  <iconify-icon icon="ic:twotone-access-time"></iconify-icon>12:00 AM
                </p>
              </div>
              <p class="para_p space_topp">
                Paid - <span class="para_p_active">0</span>
              </p>
            </div>
          </div>
          <div class="kard_bottom">
            <div class="confirm_btn">
              <a class="btn solid_smal">Pay & Confirm</a>
            </div>
            <div class="need_help">
              <a href=""><iconify-icon icon="fluent:person-support-24-regular"></iconify-icon></a>
              <a class="solid_smal" href="">Need Help?</a>
            </div>
          </div>
        </div>
        <!-- card of booking -->
        <!-- card of booking -->
        <div class="service_booking_kard">
          <div class="status_booking">PENDING</div>
          <div class="kard_top">
            <div class="service_kard_img">
              <iconify-icon icon="openmoji:man-cook-medium-skin-tone"></iconify-icon>
            </div>
            <div class="kard_details">
              <p class="solid_smal">
                Chef details will be updated after full payment
              </p>
              <p class="para_gray space_ten">
                <iconify-icon icon="ic:twotone-location-on"></iconify-icon> A1,
                chattarpur Enclave, Delhi
              </p>
              <div class="kard_timing">
                <p class="para_p_active solid_hsmal">
                  <iconify-icon icon="lets-icons:date-today-duotone"></iconify-icon>
                  01 Dec 2023
                </p>
                <p class="para_p_active solid_hsmal margten">
                  <iconify-icon icon="ic:twotone-access-time"></iconify-icon>12:00 AM
                </p>
              </div>
              <p class="para_p space_topp">
                Paid - <span class="para_p_active">0</span>
              </p>
            </div>
          </div>
          <div class="kard_bottom">
            <div class="confirm_btn">
              <a class="btn solid_smal">Pay & Confirm</a>
            </div>
            <div class="need_help">
              <a href=""><iconify-icon icon="fluent:person-support-24-regular"></iconify-icon></a>
              <a class="solid_smal" href="">Need Help?</a>
            </div>
          </div>
        </div>
        <!-- card of booking -->
        <!-- card of booking -->
        <div class="service_booking_kard">
          <div class="status_booking">PENDING</div>
          <div class="kard_top">
            <div class="service_kard_img">
              <iconify-icon icon="openmoji:man-cook-medium-skin-tone"></iconify-icon>
            </div>
            <div class="kard_details">
              <p class="solid_smal">
                Chef details will be updated after full payment
              </p>
              <p class="para_gray space_ten">
                <iconify-icon icon="ic:twotone-location-on"></iconify-icon>A1,
                chattarpur Enclave, Delhi
              </p>
              <div class="kard_timing">
                <p class="para_p_active solid_hsmal">
                  <iconify-icon icon="lets-icons:date-today-duotone"></iconify-icon>
                  01 Dec 2023
                </p>
                <p class="para_p_active solid_hsmal margten">
                  <iconify-icon icon="ic:twotone-access-time"></iconify-icon>12:00 AM
                </p>
              </div>
              <p class="para_p space_topp">
                Paid - <span class="para_p_active">0</span>
              </p>
            </div>
          </div>
          <div class="kard_bottom">
            <div class="confirm_btn">
              <a class="btn solid_smal">Pay & Confirm</a>
            </div>
            <div class="need_help">
              <a href=""><iconify-icon icon="fluent:person-support-24-regular"></iconify-icon></a>
              <a class="solid_smal" href="">Need Help?</a>
            </div>
          </div>
        </div>
        <!-- card of booking -->
      </div>
    </div>

  <?php endif; ?>

  <!-- bottom menu start ... -->
  <!-- bottom nav include -->
  <?php include "inc/bottom_nav.php"; ?>


  <!-- popup for payment -->
  <!-- Add more popup containers with different IDs -->
  <div id="popupContainer1" class="popup-container" style="display: none;">
    <button class="back-button" onclick="closePopup('popupContainer1')">
      <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
      </svg>
      Payment Pending
    </button>
    <div class="pop_fixed_detail" style="height: fit-content;margin-top: 55px;">
      <!-- <div class="fixed_detail_content">
          <p class="heading_p"></p>
          <p class=" space_ten para_p">Please pay token amount to place your request</p>
        </div>
        <div class="fixed_img">
          <img src="components/imag/stopwatch.png" alt="">
        </div> -->
    </div>

    <div class="popup">
      <div class="popup-content">
        <!-- Your scrollable content goes here -->

        <!-- card service  -->
        <div class="party_detail_kard">
          <div class="party_deatil_top">
            <div class="kard_timing">
              <p class="para_p_active solid_hsmal">
              <iconify-icon icon="mynaui:hash-square"></iconify-icon>
                Booking Id: 01928637484
              </p>
              <p class="para_p_active solid_hsmal">
                <iconify-icon icon="lets-icons:date-today-duotone"></iconify-icon>
                01 Dec 2023
              </p>
              <p class="para_p_active solid_hsmal">
                <iconify-icon icon="ic:twotone-access-time"></iconify-icon>12:00 AM
              </p>
            </div>
              <!-- choose dishes -->
              <a onclick="openPopup('popupContainer2')" class="pre_bk_slect_sec">
            <p class="solid_smal space_ten">Choose Dishes</p>
            <div class="pre_bk_box">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">View Menu</p>
              </div>
              <i class="fa-solid fa-chevron-down"></i>
            </div>
          </a>
          <!-- choose dishes box -->
            <div class="main_box_input">
               <p class="space_ten solid_smal">Address </p>
              <div class="input_box" style="border:none;">
                 <p class="para_gray space_ten" style="padding:10px 0px ;justify-content:flex-start; align-items:flex-start; max-width:80%;">
                  <iconify-icon icon="ic:twotone-location-on"></iconify-icon>
                  A1, chattarpur Enclave, Delhi chattarpur Enclave, Delhi
                 </p>
                 <p onclick="openModal('modal19')" class="para_gray"><span class="malta">Add New</span> </p>
              </div>
            </div>
        </div>

      
        <div class="kard_additional_sec">
            <p class="solid_smal" style="margin: 10px 0px;">Additional Services</p>
            <div class="count_service">
              <p class="para_gray">Bartender</p>
              <p class="para_gray">1</p>
            </div>
            <div class="count_service">
              <p class="para_gray ">Cleaner</p>
              <p class="para_gray ">2</p>
            </div>
            <div class="count_service">
              <p class="para_gray">Waiter</p>
              <p class="para_gray">10</p>
            </div>
          </div>

          <div class="kard_bottom" style="justify-content:flex-start;">
            <div class="confirm_btn" style="margin-right:10px;">
              <a class="btnt solid_smal">Cancel</a>
            </div>
            <div class="need_help btnt">
              <a class="solid_smal" href="">Need Help ?</a>
            </div>
          </div>

  
          <!-- <div class="sticky_complete">
            50% <br> Complete
          </div> -->
        </div>
        <!-- card service  -->
        <div class="para_h ceneter_heading space_ten stepceneter_heading" style="margin: 15px 0px;">
          <hr />
          <p>BILL SUMMARY</p>
          <hr />
        </div>

        <div class="summary_section summary_section1">
          <div class="space_ten summary_top_box">
            <p class="para_gray">7 People</p>
            <span class="line"></span>
            <p class="para_gray"> &#x20B9;1329</p>
          </div>
          <div class="space_ten summary_top_box">
            <p class="para_gray">2 Dishes</p>
            <span class="line"></span>
            <p class="para_gray"> &#x20B9;723</p>
          </div>
          <div class="summary_top_box border_btm">
            <p class="para_gray malta">Discount</p>
            <span class="line"></span>
            <p class="para_gray malta"> &#x20B9;0</p>
          </div>

          <div class=" summary_top_box border_btm">
            <p class="solid_smal">Total Amount</p>
            <p class="solid_smal"> &#x20B9;13235.00</p>
          </div>

          <div class="border_btm summary_top_box">
            <p class="para_gray">Pay Now (40% Advance)</p>
            <p class="para_gray"> &#x20B9;13235.00</p>
          </div>

          <div class=" space_ten malta_bg_l space_top summary_top_box">
            <p class="solid_smal">Balance Payment<br>
            <p class="para_gray">(60% at end of Service)</p>
            </p>
            <p class="solid_smal"> &#x20B9;13235.00</p>
          </div>

          <div class="note_summary">
            <p class="para_li space_botm"> <b> <span class="malta">NOTE:</span></b> 40% advance payment is required as it blocks the chef for that day.
              100% refund if booking is cancelled within 4 hours. No refund is applicable after 4 hours of booking. </p>

            <a class="solid_smal">Read Cancellation Policy<iconify-icon icon="ri:arrow-right-s-line" style="color: #02645e; margin-bottom: -6px; font-size: 17px;"></iconify-icon></a>
          </div>
        </div>


      </div>
      <div class="popup-buttons">
        <button onclick="confirmAction('popupContainer1')">Pay Token Amount <svg xmlns="http://www.w3.org/2000/svg" style="margin-bottom: -5px;" width="14" height="14" viewBox="0 0 24 24">
            <path fill="currentColor" d="M8 3h10l-1 2h-3.26c.48.58.84 1.26 1.05 2H18l-1 2h-2a5.558 5.558 0 0 1-4.8 4.96V14h-.7l6 7H13l-6-7v-2h2.5c1.76 0 3.22-1.3 3.46-3H7l1-2h4.66C12.1 5.82 10.9 5 9.5 5H7z" />
          </svg>200.00</button>
      </div>
    </div>
  </div>

  <!-- popup of payment -->

  <!-- choose dishes popup > popup of payment -->
  <!-- Add more popup containers with different IDs -->
  <div id="popupContainer2" class="popup-container" style="display: none;">
    <button class="back-button" onclick="closePopup('popupContainer2')">
      <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
      </svg>
      Party Detail
    </button>
    <div class="popup">
      <div class="popup-content">
        <!-- Your scrollable content goes here -->

        <div class="scadual_box">
          <div class="scadual_one_sec">
            <div class="kard_timing timing_cenetr">
              <p class="para_p_active solid_hsmal">
                <iconify-icon icon="lets-icons:date-today-duotone"></iconify-icon>
                01 Dec 2023
              </p>
              <p class="para_p_active solid_hsmal">
                <iconify-icon icon="ic:twotone-access-time"></iconify-icon>12:00 AM
              </p>
              <p class="para_p_active solid_hsmal">
                <iconify-icon icon="icon-park-twotone:people-plus-one"></iconify-icon>
                <span>20 </span> People
              </p>
            </div>
          </div>
        </div>
        <div class="cuisine_kart_msection">
          <div class="cuisine_kart_section">
            <div class="cuisine_kart">
              <div class="cui_kart_img">
                <img src="components/imag/a (1).jpg" alt="" loading="lazy">
              </div>
              <p class="solid_hsmal">CONTINENTAL</p>
            </div>
            <div class="cuisine_kart">
              <div class="cui_kart_img">
                <img src="components/imag/a (2).jpg" alt="" loading="lazy">
              </div>
              <p class="solid_hsmal">INDIAN</p>
            </div>
            <div class="cuisine_kart">
              <div class="cui_kart_img">
                <img src="components/imag/a (3).jpg" alt="" loading="lazy">
              </div>
              <p class="solid_hsmal">MAXICAN</p>
            </div>
            <div class="cuisine_kart">
              <div class="cui_kart_img">
                <img src="components/imag/a (4).jpg" alt="" loading="lazy">
              </div>
              <p class="solid_hsmal">ASIAN</p>
            </div>
          </div>
        </div>

        <!-- select dishes card service appetizer -->
        <P class="para_h space_top space_topp">Seclect Appetizer</P>
        <div class="party_detail_kard space_botom">
          <!-- choose dishes -->
          <div onclick="openPopup('popupContainer2')" class="pre_bk_slect_sec">
            <p class="para_h_">

              Dishes (03)</p>

            <!-- dishes......  -->
            <div class="pre_bk_box" onclick="openPopup('popupContainer3')">
              <div class="pre_img_text" onclick="openPopup('popupContainer3')">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

            <!-- dishes......  -->
            <div class="pre_bk_box" onclick="openPopup('popupContainer3')">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

            <!-- dishes......  -->
            <div class="pre_bk_box" onclick="openPopup('popupContainer3')">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

          </div>
          <!-- choose dishes box -->

        </div>
        <!-- select dishes card service appetizer -->
        <!-- select dishes card service main course -->
        <P class="para_h space_top space_topp">Seclect Main Course</P>
        <div class="party_detail_kard space_botom">
          <!-- choose dishes -->
          <div onclick="openPopup('popupContainer2')" class="pre_bk_slect_sec">
            <p class="para_h_">

              Dishes (03)</p>

            <!-- dishes......  -->
            <div class="pre_bk_box" onclick="openPopup('popupContainer3')">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

            <!-- dishes......  -->
            <div class="pre_bk_box" onclick="openPopup('popupContainer3')">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

            <!-- dishes......  -->
            <div class="pre_bk_box">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

          </div>
          <!-- choose dishes box -->

        </div>
        <!-- select dishes card service main course -->
        <!-- select dishes card service Dessert -->
        <P class="para_h space_top space_topp">Seclect Dessert</P>
        <div class="party_detail_kard space_botom">
          <!-- choose dishes -->
          <div onclick="openPopup('popupContainer2')" class="pre_bk_slect_sec">
            <p class="para_h_">

              Dishes (03)</p>

            <!-- dishes......  -->
            <div class="pre_bk_box">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

            <!-- dishes......  -->
            <div class="pre_bk_box">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

            <!-- dishes......  -->
            <div class="pre_bk_box">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

          </div>
          <!-- choose dishes box -->

        </div>
        <!-- select dishes card service Dessert -->
        <!-- select dishes card service Sides -->
        <P class="para_h space_top space_topp">Seclect Sides</P>
        <div class="party_detail_kard space_botom">
          <!-- choose dishes -->
          <div onclick="openPopup('popupContainer2')" class="pre_bk_slect_sec">
            <p class="para_h_">

              Dishes (03)</p>

            <!-- dishes......  -->
            <div class="pre_bk_box">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

            <!-- dishes......  -->
            <div class="pre_bk_box">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

            <!-- dishes......  -->
            <div class="pre_bk_box">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <p class="para_p_active" id="date_select">Choose of dish</p>
              </div>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <!-- dishes......  -->

          </div>
          <!-- choose dishes box -->

        </div>
        <!-- select dishes card service Sides -->

      </div>
      <div class="popup-buttons">
        <button onclick="confirmAction('popupContainer2')">Pay Token Amount <svg xmlns="http://www.w3.org/2000/svg" style="margin-bottom: -5px;" width="14" height="14" viewBox="0 0 24 24">
            <path fill="currentColor" d="M8 3h10l-1 2h-3.26c.48.58.84 1.26 1.05 2H18l-1 2h-2a5.558 5.558 0 0 1-4.8 4.96V14h-.7l6 7H13l-6-7v-2h2.5c1.76 0 3.22-1.3 3.46-3H7l1-2h4.66C12.1 5.82 10.9 5 9.5 5H7z" />
          </svg>200.00</button>
      </div>
    </div>
  </div>

  <!-- choose dishes popup > popup of payment -->

  <!-- choice your dishes popup 3> popup of payment -->
  <!-- Add more popup containers with different IDs -->
  <div id="popupContainer3" class="popup-container" style="display: none;">
    <button class="back-button" onclick="closePopup('popupContainer3')">
      <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
      </svg>
      Party Detail
    </button>
    <div class="popup">
      <div class="popup-content">
        <!-- Your scrollable content goes here -->


        <div class="cuisine_kart_msection padding_top">
          <div class="cuisine_kart_section">
            <div class="cuisine_kart">
              <div class="cui_kart_img">
                <img src="components/imag/a (1).jpg" alt="" loading="lazy">
              </div>
              <p class="solid_hsmal">CONTINENTAL</p>
            </div>
            <div class="cuisine_kart">
              <div class="cui_kart_img">
                <img src="components/imag/a (2).jpg" alt="" loading="lazy">
              </div>
              <p class="solid_hsmal">INDIAN</p>
            </div>
            <div class="cuisine_kart">
              <div class="cui_kart_img">
                <img src="components/imag/a (3).jpg" alt="" loading="lazy">
              </div>
              <p class="solid_hsmal">MAXICAN</p>
            </div>
            <div class="cuisine_kart">
              <div class="cui_kart_img">
                <img src="components/imag/a (4).jpg" alt="" loading="lazy">
              </div>
              <p class="solid_hsmal">ASIAN</p>
            </div>
          </div>
        </div>

        <!-- select dishes card service appetizer -->
        <P class="para_h space_ten">Seclect Appetizer</P>
        <p class="para_gray">Select the dishes as per your choice for appetizer.</p>

        <!-- select dishes card service appetizer -->

        <div class="choice_dish_container">

          <!-- choice list box start. -->
          <div class="choc_d_box">
            <div class="choc_1_part">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <div class="choice_detal">
                  <div class="choice_veg_icn_sec">
                    <p class="solid_hsmal" id="date_select">View Menu </p>
                    <iconify-icon icon="mdi:lacto-vegetarian"></iconify-icon>
                  </div>
                  <p class="thin_smal">italian soup with veggies and pasta..</p>
                </div>
              </div>
            </div>
            <div class="choce_2_part">
              <p class="thin_smal malta">View ingredients</p>
            </div>
          </div>
          <!-- choice list box start. -->
          <!-- choice list box start. -->
          <div class="choc_d_box">
            <div class="choc_1_part">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <div class="choice_detal">
                  <div class="choice_veg_icn_sec">
                    <p class="solid_hsmal" id="date_select">View Menu </p>
                    <iconify-icon icon="mdi:lacto-vegetarian"></iconify-icon>
                  </div>
                  <p class="thin_smal">italian soup with veggies and pasta..</p>
                </div>
              </div>
            </div>
            <div class="choce_2_part">
              <p class="thin_smal malta">View ingredients</p>
            </div>
          </div>
          <!-- choice list box start. -->
          <!-- choice list box start. -->
          <div class="choc_d_box">
            <div class="choc_1_part">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <div class="choice_detal">
                  <div class="choice_veg_icn_sec">
                    <p class="solid_hsmal" id="date_select">View Menu </p>
                    <iconify-icon icon="mdi:lacto-vegetarian"></iconify-icon>
                  </div>
                  <p class="thin_smal">italian soup with veggies and pasta..</p>
                </div>
              </div>
            </div>
            <div class="choce_2_part">
              <p class="thin_smal malta">View ingredients</p>
            </div>
          </div>
          <!-- choice list box start. -->
          <!-- choice list box start. -->
          <div class="choc_d_box">
            <div class="choc_1_part">
              <div class="pre_img_text">
                <div class="preimg"><iconify-icon icon="emojione:pot-of-food"></iconify-icon></div>
                <div class="choice_detal">
                  <div class="choice_veg_icn_sec">
                    <p class="solid_hsmal" id="date_select">View Menu </p>
                    <iconify-icon icon="mdi:lacto-vegetarian"></iconify-icon>
                  </div>
                  <p class="thin_smal">italian soup with veggies and pasta..</p>
                </div>
              </div>
            </div>
            <div class="choce_2_part">
              <p class="thin_smal malta">View ingredients</p>
            </div>
          </div>
          <!-- choice list box start. -->

        </div>
      </div>

    </div>
  </div>

  <!-- choose dishes popup3 > popup of payment -->


  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="components/js/js.js"></script>
  <script src="components/js/jquery-3.7.1.slim.min.js"></script>

</body>

</html>