<?php
include "config.php";

// get Service ID
$service_name = "waiter";
$sql = "SELECT services_id FROM services WHERE services_name='{$service_name}'";
if ($result = mysqli_query($conn, $sql)) {
  if (mysqli_num_rows($result) > 0) {
    $service_id = mysqli_fetch_assoc($result)['services_id'];
  } else {
    echo "<script>
     alert('Waiter Service is not available currently.');
     window.history.back();</script>";
  }
} else {
  echo "<script>
   alert('Something went wrong, Please try again later');
   window.history.back();
   </script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book a Waiter | Look My Cook</title>
  <link rel="stylesheet" href="components/css/style.css">
  <link rel="stylesheet" href="components/css/style_pop_up.css">
  <link rel="stylesheet" href="components/css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

</head>

<body>
  <input type="hidden" id="service_id" value="<?= $service_id ?>">
  <input type="hidden" id="event_date" value="null">
  <input type="hidden" id="event_time" value="null">
  <input type="hidden" id="event_adults" value="0">
  <input type="hidden" id="event_addon_cleaner" value="0">
  <input type="hidden" id="event_addon_bartender" value="0">
  <input type="hidden" id="event_workers" value="0">
  <input type="hidden" id="b_guest_charges" value="0">
  <input type="hidden" id="b_per_worker_charges" value="0">
  <input type="hidden" id="b_gst_tax" value="0">
  <input type="hidden" id="b_discount" value="0">
  <input type="hidden" id="b_addon_cleaner_guest_charges" value="0">
  <input type="hidden" id="b_addon_cleaner_per_worker_charges" value="0">
  <input type="hidden" id="b_addon_bartender_guest_charges" value="0">
  <input type="hidden" id="b_addon_bartender_per_worker_charges" value="0">
  <input type="hidden" id="b_addon_all_charges" value="0">
  <input type="hidden" id="b_adv_pay" value="0">
  <input type="hidden" id="b_balance_pay" value="0">
  <input type="hidden" id="b_total" value="0">
  <input type="hidden" id="b_coupon_code" value="0">

  <div class="pre_bk_kart_mainpage">

    <button class="back-button" onclick="history.back()">
      <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
      </svg>
      Book a waiter
    </button>
    <div class="pre_bk_kart_page">

      <!-- selection box -->
      <a id="select_date_event" class="pre_bk_slect_sec">
        <p class="para_p">Event Date</p>
        <div class="pre_bk_box">
          <p class="para_h_" id="date_select">Select date</p>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
      </a>
      <!-- selection box -->
      <!-- selection box -->
      <a id="select_event_time" class="pre_bk_slect_sec">
        <p class="para_p">Serving time</p>
        <div class="pre_bk_box">
          <p class="para_h_" id="time_select">Select serving time</p>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
      </a>
      <!-- selection box -->
      <!-- selection box -->
      <a onclick="openModal('modal2')" class="pre_bk_slect_sec">
        <p class="para_p">Number of people</p>
        <div class="pre_bk_box">
          <p class="para_h_" id="number_of_people">Select number of people</p>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
      </a>
      <!-- selection box -->

      <!-- selection box -->
      <a onclick="openModal('modal5')" class="pre_bk_slect_sec">
        <p class="para_p">Number of waiters</p>
        <div class="pre_bk_box">
          <p class="para_h_" id="number_of_workers">Select number of waiters</p>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
      </a>
      <!-- selection box -->

      <!-- Add Extra section start -->
      <p class="para_p">Select additional services</p>
      <div class="aditional_cards_container">

        <!-- booking card  -->
        <div class="kart_booking_card adi_booking_card">

          <div class="cardkart_imgimg adii_card_img">
            <img src="components/imag/Bar..png" alt="" loading="lazy">
          </div>

          <div class="carrd_kart_content addi_card_content">
            <div class="card_con_heading">
              <p class="para_h">Bartender</p>
            </div>
            <div class="adi_card_booking_botom">
              <p class="para_p">&#x20B9; 388</p>
              <div class="incre_dcre_daba">
                <div class="decree_w decree minus_plus" id="minusButton13">
                  <i class="fa-solid fa-minus"></i>
                </div>
                <div class="decree_w incre_no_dcree number">
                  <p class="number" id="displayedNumber13" data-min="0" data-max="100">0</p>
                </div>
                <div class="decree_w decree plus_minus incree" id="plusButton13">
                  <i class="fa-solid fa-plus"></i>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- booking card  -->
        <!-- booking card  -->
        <div class="kart_booking_card adi_booking_card">

          <div class="cardkart_imgimg adii_card_img">
            <img src="components/imag/waiter..png" alt="" loading="lazy">
          </div>

          <div class="carrd_kart_content addi_card_content">
            <div class="card_con_heading">
              <p class="para_h">Cleaner</p>
            </div>
            <div class="adi_card_booking_botom">
              <p class="para_p">&#x20B9; 388</p>
              <div class="incre_dcre_daba">
                <div class="decree_w decree minus_plus" id="minusButton12">
                  <i class="fa-solid fa-minus"></i>
                </div>
                <div class="decree_w incre_no_dcree number">
                  <p class="number" id="displayedNumber12" data-max="100" data-min="0">0</p>
                </div>
                <div class="decree_w decree plus_minus incree" id="plusButton12">
                  <i class="fa-solid fa-plus"></i>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- booking card  -->
      </div>

      <!-- Add Extra section end -->



      <!-- proceed to summary popup box -->
      <div class="amnt_detail_btn" id="proceed_btn_container">
        <div class="amnt_det">
          <p class="para_h_"><iconify-icon icon="ph:currency-inr-duotone"></iconify-icon>
            <span class="f_total">0</span>
          </p>
          <p onclick="openModal('modal16')" class="para_gray">Amount Payable <span class="malta"> (DETAILS)</span> </p>
        </div>
        <div id="booking_proceed_step1" class="continuebtnn">
          Proceed
        </div>
      </div>
      <!-- proceed to summary popup box -->

    </div>

    <!-- summary popup 4> popup of payment -->
    <!-- Add more popup containers with different IDs -->
    <div id="popupContainer4" class="popup-container" style="display: none;">
      <button class="back-button" style=" justify-content:space-between; align-items:center;">
        <div class="s_left_top" onclick="closePopup('popupContainer4')">
          <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
          </svg>
          Summary
        </div>
        <div class="s_right_top" onclick="closePopup('popupContainer4')">
          Edit
        </div>
      </button>
      <div class="popup">
        <div class="popup-content">
          <!-- Your scrollable content goes here -->

          <div class="party_details_sec">

          </div>

          <div class="summary_section">

            <div class="space_botom border_btm summary_top_box">
              <p class="solid_smal">Bookings Details</p>
            </div>

            <div class="space_ten summary_top_box">
              <p class="para_gray">Event Date</p>
              <span class="line"></span>
              <p class="para_gray" id="s_event_date">24 Dec 2023</p>
            </div>
            <div class="space_ten summary_top_box">
              <p class="para_gray">Serving Time</p>
              <span class="line"></span>
              <p class="para_gray" id="s_event_time">01:00 PM</p>
            </div>
            <div class="space_ten summary_top_box">
              <p class="para_gray">No. of people</p>
              <span class="line"></span>
              <p class="para_gray" id="s_event_adults">1</p>
            </div>
            <div class="space_ten summary_top_box">
              <p class="para_gray">No. of waiters</p>
              <span class="line"></span>
              <p class="para_gray" id="s_event_workers">1</p>
            </div>
            <div class="space_ten summary_top_box">
              <p class="para_gray">Additional Cleaners</p>
              <span class="line"></span>
              <p class="para_gray" id="f_addon_cleaner_count">-</p>
            </div>
            <div class="space_ten summary_top_box">
              <p class="para_gray">Additional Bartenders</p>
              <span class="line"></span>
              <p class="para_gray" id="f_addon_bartender_count">-</p>
            </div>

            <div class="space_ten summary_top_box note_summary">
              <ul>
                <li class="para_li">Waiter will arrive <span class="malta">30 Minutes</span> before Serving Time</li>
                <li class="para_li">Waiter will assigned <span class="">48 hours</span> before booking date</li>
              </ul>
            </div>

          </div>

        </div>

        <div class="para_h ceneter_heading space_ten stepceneter_heading" style="margin: 15px 0px;">
          <hr />
          <p>BILL SUMMARY</p>
          <hr />
        </div>

        <div class="summary_section summary_section1">
          <div class="space_ten summary_top_box">
            <p class="para_gray"><span class="f_guest_count"></span>&nbsp;People</p>
            <span class="line"></span>
            <p class="para_gray"> &#x20B9;
              <span class="f_guest_charges">0</span>
            </p>
          </div>
          <div class="space_ten summary_top_box">
            <p class="para_gray"><span class="f_worker_count"></span>&nbsp;Waiters</p>
            <span class="line"></span>
            <p class="para_gray"> &#x20B9; <span class="f_worker_charges">0</span></p>
          </div>

          <!-- additional services -->
          <div class="space_ten summary_top_box">
            <p class="para_gray">Adds On</p>
            <span class="line"></span>
            <p class="para_gray"> &#x20B9; <span class="f_addon_charges">0</span></p>
          </div>
          <!-- additional services -->
          <!-- tax -->
          <div class="space_ten summary_top_box">
            <p class="para_gray">Tax (GST)</p>
            <span class="line"></span>
            <p class="para_gray"> &#x20B9; <span class="f_tax_amount">0</span></p>
          </div>
          <!-- tax -->

          <div class="border_btm summary_top_box">
            <p class="para_gray malta">Discount</p>
            <span class="line"></span>
            <p class="para_gray malta"> &#x20B9;<span class="f_b_discount">0</span></p>
          </div>

          <div class=" border_btm summary_top_box">
            <p class="solid_smal">Total Amount</p>
            <p class="solid_smal"> &#x20B9;<span class="f_total"></span></p>
          </div>

          <div class="space_ten summary_top_box">
            <p class="para_gray">Pay Now (40% Advance)</p>
            <p class="para_gray"> &#x20B9;<span class="f_adv_pay"></span></p>
          </div>

          <div class="space_ten malta_bg_l space_top summary_top_box">
            <p class="solid_smal">Balance Payment<br>
            <p class="para_gray">(60% at end of Service)</p>
            </p>
            <p class="solid_smal"> &#x20B9;<span class="f_balance_pay"></span></p>
          </div>

          <div class="note_summary">
            <p class="para_li space_botm"> <b> <span class="malta">NOTE:</span></b> 40% advance payment is required as it blocks the chef for that day.
              100% refund if booking is cancelled within 4 hours. No refund is applicable after 4 hours of booking. </p>

            <a href="booking-cancellation-policy" target="_blank" rel="noreferrer" class="solid_smal">Read Cancellation Policy<iconify-icon icon="ri:arrow-right-s-line" style="color: #02645e; margin-bottom: -6px; font-size: 17px;"></iconify-icon></a>
          </div>
        </div>


        <div class="summary_section space_ten">

          <div class="space_ten summary_top_box">
            <p class="solid_smal">Offer & Benefits</p>
          </div>
          <!-- before coupon -->
          <div class="summary_section space_ten" id="party1">
            <!-- one coupon selected - by default -->
            <!-- <div class="space_ten summary_top_box">
              <p class="solid_smal">
                <span id="selected_coupin_code">
                  BESTOFFER
                </span>
                <p class="green_para_back">BEST OFFER</p>
              </p>
              <p id="apply_coupan" data-coupan="LIFEHAI" class="solid_smal malta curser">TAP TO APPLY</p>
            </div>
            <div class="space_ten summary_top_box">
              <p class="para_gray">You will save change<span style="margin-left: 10px;" class="solid_smal coupan_save_amount">350</span></p>
            </div> -->

            <div class="white_btn" id="explore_coupons" data-loaded="false">
              <button class="solid_smal" id="open_coupan_popups">EXPLORE OFFER</button>
            </div>
          </div>

          <!-- design after applied cuopon  -->
          <div class="summary_section space_ten " id="party2" style="display:none;">
            <div class="space_ten summary_top_box">
              <p class="solid_smal"><span class="f_coupon_code"></span><iconify-icon icon="icons8:checked" style="color: #02645e;"></iconify-icon></p>
              <p id="removeCoupan" class="solid_smal malta curser">Remove</p>
            </div>
            <div class="space_ten summary_top_box">
              <p class="para_gray"><span class="solid_smal f_coupon_discount_value">15%</span>&nbsp;discount applied </p>
            </div>
          </div>

        </div>


        <div class="trust_container">
          <div class="trust_img">
            <img src="components/imag/pay_methods_branding.png" alt="">
          </div>
          <div class="trust_img2">
            <img id="rzp-logo" alt="rzp-logo" src="https://cdn.razorpay.com/logo.svg">
          </div>
        </div>

      </div>

      <!-- pay now button -->
      <div class="amnt_detail_btn" id="razor_pay_btn_container">
        <div class="amnt_det">
          <p class="para_h_"><iconify-icon icon="ph:currency-inr-duotone"></iconify-icon>
            <span class="f_total">0</span>
          </p>
          <p onclick="openModal('modal16')" class="para_gray">Amount Payable <span class="malta"> (DETAILS)</span> </p>
        </div>
        <div id="razorpay-btn" class="continuebtnn">
          Pay Now
        </div>
      </div>
      <!-- pay now button -->

    </div>
  </div>

  <!-- old here -->

  <!-- bottom menu start ... -->
  <!-- bottom nav include -->
  <?php include "inc/bottom_nav.php"; ?>



  <!-- pop up of filter -->
  <!-- pop up of filter -->
  <div id="modal2" class="modal">
    <div class="popup1">
      <p class="heading_p">Number of people</p>
      <div class="close"><svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg></div>
      <div class="content1">
        <p class="para_p">How many number of guests you have?</p>
        <div class="increase_decrease_container">

          <!-- dishes box -->
          <div class="increase_decrease_box">
            <div class="incre_decre_contnt">
              <p class="para_h">Adult</p>
              <p class="para_p space_top">12 years and above</p>
            </div>
            <div class="incre_dcre_daba">
              <div class="decree_w decree minus_plus" id="minusButton5">
                <i class="fa-solid fa-minus"></i>
              </div>
              <div class="decree_w incre_no_dcree number">
                <p class="number" id="displayedNumber5" data-min="1" data-max="100" data-val="1">1</p>
              </div>
              <div class="decree_w decree plus_minus incree" id="plusButton5">
                <i class="fa-solid fa-plus"></i>
              </div>
            </div>

          </div>
          <!-- dishes box -->

          <button class="batun" id="confirm_guests_others">
            Confirm
            <!-- <i class="fa fa-spinner fa-spin"></i> -->
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- pop up of filter -->
  <div id="modal5" class="modal">
    <div class="popup1">
      <p class="heading_p">Number of waiters</p>
      <div class="close"><svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg></div>
      <div class="content1">
        <p class="para_p">How many number of waiters you need?</p>
        <div class="increase_decrease_container">

          <!-- dishes box -->
          <div class="increase_decrease_box">
            <div class="incre_decre_contnt">
              <p class="para_h">Waiters</p>
              <!-- <p class="para_p space_top"></p> -->
            </div>
            <div class="incre_dcre_daba">
              <div class="decree_w decree minus_plus" id="minusButton6">
                <i class="fa-solid fa-minus"></i>
              </div>
              <div class="decree_w incre_no_dcree number">
                <p class="number" id="displayedNumber6" data-min="1" data-max="100" data-val="1">1</p>
              </div>
              <div class="decree_w decree plus_minus incree" id="plusButton6">
                <i class="fa-solid fa-plus"></i>
              </div>
            </div>

          </div>
          <!-- dishes box -->

          <button class="batun" id="confirm_worker_others">
            Confirm
            <!-- <i class="fa fa-spinner fa-spin"></i> -->
          </button>
        </div>
      </div>
    </div>
  </div>



  <!-- pop up popup of dishes -->
  <div id="modal3" class="modal">
    <div class="popup1">
      <p class="heading_p">Serving time</p>
      <div class="close">
        <svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
      </div>
      <div class="content1">
        <p class="para_p">When would you love to serve your guests?</p>
        <div class="time_bx_section" id="timeContainer" style="min-height:70px;">
        </div>
      </div>
    </div>
  </div>
  <!-- pop up popup of dishes -->

  <!-- select Date Popup -->
  <div id="modal4" class="modal">
    <div class="popup1">
      <p class="heading_p">Select Date</p>
      <div class="close">
        <svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
      </div>
      <div class="content1">

        <div class="time_bx_section " id="dateContainer" style="min-height:100px;">
        </div>
      </div>
    </div>
  </div>


  <!-- pop up popup of dishes -->
  <!-- pop up of filter -->
  <div id="modal16" class="modal">
    <div class="popup1">
      <p class="heading_p">Details</p>
      <div class="close"><svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg></div>
      <div class="content1">

        <div class="space_ten summary_top_box">

        </div>



        <div class="space_ten summary_top_box">
          <p class="para_gray"><span class="f_guest_count">0</span>&nbsp;people</p>
          <span class="line"></span>
          <p class="para_gray"><span class="f_guest_charges">0</span></p>
        </div>

        <div class="space_ten summary_top_box">
          <p class="para_gray"><span class="f_worker_count">0</span>&nbsp;waiters</p>
          <span class="line"></span>
          <p class="para_gray"><span class="f_worker_charges">0</span></p>
        </div>

        <div class="space_ten summary_top_box">
          <p class="para_gray">Adds On</p>
          <span class="line"></span>
          <p class="para_gray"><span class="f_addon_charges"></span></p>
        </div>

        <div class="space_ten summary_top_box">
          <p class="para_gray">Tax (gst)</p>
          <span class="line"></span>
          <p class="para_gray"><span class="f_tax_amount"></span></p>
        </div>

        <div class="space_ten summary_top_box">
          <p class="para_gray">Discount</p>
          <span class="line"></span>
          <p class="para_gray"><span class="f_b_discount">0</span></p>
        </div>

        <hr>
        <div class="space_ten summary_top_box">
          <p class="solid_smal">Net Payable</p>
          <span class="line"></span>
          <p class="solid_smal"><span class="f_total">0</span></p>
        </div>
        <div class="space_ten summary_top_box">
          <p class="green_para_back_h">Pay <span class="f_adv_pay">0</span> to place your request</p>
        </div>
      </div>
    </div>
  </div>
  <!-- pop up of filter -->

  <!-- pop up of coupon -->
  <div id="coupon1000" class="modal">
    <div class="popup1 apply_popup">
      <div class="content1 apply_coupon_content ">
        <div class="apply_coupon_img">
          <img src="components/imag/animation_gif.gif" alt="" loading="lazy">
        </div>
        <p class="para_h">Hurray! You just saved&nbsp;<span class="f_coupon_discount_value">15%</span></p>
        <p class="para_gray">Coupon code applied!</p>

      </div>
    </div>
  </div>
  <!-- pop up of filter -->
  <div id="modal6" class="modal">
    <div class="popup1">
      <p class="heading_p">Apply Coupon</p>
      <div class="close"><svg width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg></div>
      <div class="content1 copon_input">
        <div class="space_ten summary_top_box"></div>
        <p class=" space_ten  margin-top solid_smal">Available Coupons</p>
        <div class="coupans_container" id="coupans_container"></div>
      </div>
    </div>
  </div>
  <!-- pop up of filter -->

  <!-- loading modal -->
  <div class="modal" id="loading_modal" style="z-index:1000000000;background:rgba(0, 0, 0, 0.2);">

  </div>

  <!-- login popup -->
  <div id="popupContainerLogin" class="popup-container tab_body" style="display: none;background:#fff;">
    <button class="back-button" onclick="closePopup('popupContainerLogin')">
      <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
      </svg>
      Signup | Login
    </button>
    <div class="popup login_popup">
      <div class="popup-content">
        <!-- Your scrollable content goes here -->
        <div class="logi_content">
          <!-- sign section start here..  -->
          <div class="_from_container_">
            <div class="_form_">
              <div class="_form_title" style="display: flex; flex-direction: column;">
                <div class="logo">
                  Signup | Login
                </div>
                <div class="logo" style="font-size: 16px; font-weight: bold; margin-top: 7px;">
                  GET &nbsp; <b class="malta"> &#8377; 250 </b> &nbsp; FREE CASH ON SIGNUP
                </div>
              </div>
              <div class="_form_content">

                <div class="_form_field">
                  <div class="label_field">
                    <label>Mobile Number</label>
                  </div>
                  <input type="test" maxlength="10" name="contacts" required="" id="contacts" placeholder="10 digit number">
                  <div class="_change_number"><span id="change_num">change Number ?</span></div>

                </div>

                <div class="_form_field">
                  <label>OTP</label>
                  <div class="_input_container">
                    <input type="text" name="number" id="otp" placeholder="xxxxxx" maxlength="6">
                    <div class="_timer" id="_timer">0</div>
                  </div>
                  <div class="_send_otp_btn">
                    <div id="responseMsg"></div>
                    <button class="_otp_btn" id="_otp_btn_again" style="visibility: hidden;">
                      Send Again
                    </button>
                  </div>
                </div>
                <div class="_agree_box">
                  <p>
                    By continuing, you agree to <a target="_blank" href="terms-and-conditions">Terms of Service &
                      Privacy Policy</a>
                  </p>
                </div>

                <button type="submit" id="_proceed_services_login_btn" class="_proceed_btn">
                  Sign In | Sign Up
                </button>

              </div>

            </div>
          </div>
          <?php include "inc/bottom_nav.php"; ?>
        </div>


      </div>
    </div>
  </div>


  <?php include "inc/bottom_nav.php"; ?>

  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="components/js/js.js"></script>
  <script src="static/js/jquery.js"></script>
  <script src="static/js/preferences.js"></script>
  <script src="static/js/waiter.js"></script>
  <script src="libs/alertifyjs/alertify.min.js"></script>
  <script src="static/js/login.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</body>

</html>