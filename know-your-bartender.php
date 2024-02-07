<?php
$services = ["chef", "waiter", "cleaner", "bartender"];
include 'config.php';

if (isset($_SESSION['logged_user_id'])) {
  $user_id = $_SESSION['logged_user_id'];
} else {
  header("Location:login?location=" . urlencode($_SERVER['REQUEST_URI']));
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Know bartender for event | Look My Cook</title>
  <link rel="stylesheet" href="components/css/style.css">
  <link rel="stylesheet" href="components/css/style_pop_up.css">
  <link rel="stylesheet" href="components/css/test.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
  </style>
  <link rel="stylesheet" href="libs/lightgallery/lightgallery.min.css">

</head>

<body>
  <button class="back-button" onclick="history.back()">
    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
    </svg>
    Know bartender for event
  </button>
  <div class="now_main_page">

    <div class="hero_how_sec">
      <div class="now_hero_img">
        <img src="components/imag/img1 (5).webp" alt="" loading="lazy" />
      </div>

    </div>
    <div class="now_hero_al_contnt">
      <div class="para_h danger ceneter_heading stepceneter_heading">
        <hr />
        <p>STEP - BY - STEP GUIDE</p>
        <hr />
      </div>

      <div class="step_box_container">
        <!-- step card  -->
        <a class="kart_booking_card step_kart">
          <div class="cardkart_booking_img step_kart_img_box">
            <div class="cardkart_imgimg step_kart_img">
              <img src="components/imag/people.png" alt="" loading="lazy" />
            </div>
          </div>
          <div class="carrd_kart_content">
            <div class="numbrr">01</div>
            <div class="card_con_heading">
              <!-- <p class="para_h">Bartender</p> -->
            </div>
            <p class="para_p w_s">Select Event Details and Book Chef</p>
          </div>
        </a>
        <!-- step card  -->
        <!-- step card  -->
        <a class="kart_booking_card step_kart">
          <div class="cardkart_booking_img step_kart_img_box">
            <div class="cardkart_imgimg step_kart_img">
              <img src="components/imag/shopping-bag.png" alt="" loading="lazy" />
            </div>
          </div>
          <div class="carrd_kart_content">
            <div class="numbrr">02</div>
            <div class="card_con_heading">
              <!-- <p class="para_h">Bartender</p> -->
            </div>
            <p class="para_p w_s">⁠Chef is Assigned and Ingredients List is Shared </p>
          </div>
        </a>
        <!-- step card  -->
        <!-- step card  -->
        <a class="kart_booking_card step_kart">
          <div class="cardkart_booking_img step_kart_img_box">
            <div class="cardkart_imgimg step_kart_img">
              <img src="components/imag/chef.png" alt="" loading="lazy" />
            </div>
          </div>
          <div class="carrd_kart_content">
            <div class="numbrr">03</div>
            <div class="card_con_heading">
              <!-- <p class="para_h">Bartender</p> -->
            </div>
            <p class="para_p w_s">⁠Chef arrives and Cook Delicious Dishes </p>
          </div>
        </a>
        <!-- step card  -->
        <!-- step card  -->
        <a class="kart_booking_card step_kart">
          <div class="cardkart_booking_img step_kart_img_box">
            <div class="cardkart_imgimg step_kart_img">
              <img src="components/imag/clean_step.png" alt="" loading="lazy" />
            </div>
          </div>
          <div class="carrd_kart_content">
            <div class="numbrr">04</div>
            <div class="card_con_heading">
              <!-- <p class="para_h">Bartender</p> -->
            </div>
            <p class="para_p w_s">Chef cleans the Kitchen Area and Leaves</p>
          </div>
        </a>

        <!-- step card  -->
      </div>
      <a href="#scroll_g" class="scroll_gallry">

        <p class="size_se">Reviews & Gallery</p>
        <iconify-icon icon="solar:alt-arrow-down-bold-duotone"></iconify-icon>

      </a>
    </div>

  </div>
  <div class="now_hero_al_contnt">
    <p class="space_botom heading_p danger space_top">
      <iconify-icon icon="mdi:multiply-box"></iconify-icon> What's not included
    </p>
    <!-- booking card  -->
    <a class="kart_booking_card included_kart n_include_kart">
      <div class="cardkart_booking_img included_kart_img ">
        <div class="cardkart_imgimg included_imgkart_img">
          <img src="components/imag/ingredient1.png" alt="" loading="lazy" />
        </div>
      </div>
      <div class="carrd_kart_content">
        <div class="card_con_heading">
          <p class="para_h"> No Ingredients and Utensils </p>
        </div>
        <p class="para_p">
          We don't offer any post-service utensil cleaning.
        </p>
      </div>
    </a>
    <!-- booking card  -->
    <!-- booking card  -->
    <a class="kart_booking_card included_kart n_include_kart">
      <div class="cardkart_booking_img included_kart_img">
        <div class="cardkart_imgimg included_imgkart_img">
          <img src="components/imag/cutlery.png" alt="" loading="lazy" />
        </div>
      </div>
      <div id="scroll_g" class="carrd_kart_content">
        <div class="card_con_heading">
          <p class="para_h">No Utensils Cleaning</p>
        </div>
        <p class="para_p">See your party Chef & Cook bookings</p>
      </div>
    </a>
    <!-- booking card  -->
  </div>
  <div class="now_hero_al_contnt">
    <p class="heading_p">Our Gallery</p>
    <p class="para_p space_top ">Lorem ipsum dolor sit amet</p>

    <!-- light-box gallery -->
    <div class="gallery-container image-lightbox">

      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (5).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (5).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (4).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (4).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (3).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (3).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (2).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (2).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (1).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (1).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>


      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (6).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (6).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (7).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (7).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (8).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (8).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (9).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (9).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (10).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (10).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>


      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (11).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (11).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (12).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (12).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (13).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (13).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (14).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (14).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (15).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (15).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>


      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (16).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (16).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (17).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (17).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (18).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (18).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (19).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (19).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (20).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (20).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>

      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (21).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (21).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (22).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (22).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (23).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (23).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (24).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (24).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <div class="gallery-image">
        <a href="components/imag/Gallery/gallery1 (25).jpg" target="_blank" class="ai-lightbox-image">
          <img width="100%" src="components/imag/Gallery/gallery1 (25).jpg" alt="gallery image" data-tippy-placement="top" title="my chef">
        </a>
      </div>
      <!-- light-box gallery -->


    </div>




    <!-- testimonial style start -->
    <div class="now_hero_al_contnt space_top">
      <p class="heading_p">Taste Testimonial</p>
      <p class="space_top">Overall Rating</p>
      <div class="al_rev_count space_top">
        <iconify-icon icon="lets-icons:star-duotone"></iconify-icon>
        <p class="heading_p space_top">4.5 Rating
        <p class="para_p space_top"> &nbsp;(Based on 15K+ Reviews)</p>
        </p>
      </div>
      <!-- review card  -->
      <div class="review_card">
        <div class="review_top">
          <div class="review_r_top">
            <div class="re_r_t_img">
              <!-- <iconify-icon icon="iconamoon:profile-fill"></iconify-icon> -->
              <img src="components/imag/g_img/g_img (10).jpg" alt="" loading="lazy">
            </div>
            <div class="re_r_t_details">
              <p class="solid_smal">Naveed khosa</p>
              <p class="thin_smal space_top">Delhi, Sector 57</p>
              <p class="yelo_i space_top"> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>

        </div>
        <div class="review_bottom">
          <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis
            quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias
            magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe
            minima, magni aperiam id nemo.</p>
        </div>
        <div class="review_r_top">
          <p class="thin_smal">four days ago</p>
        </div>
      </div>
      <!-- review card  -->
      <!-- review card  -->
      <div class="review_card">
        <div class="review_top">
          <div class="review_r_top">
            <div class="re_r_t_img">
              <!-- <iconify-icon icon="iconamoon:profile-fill"></iconify-icon> -->
              <img src="components/imag/g_img/g_img (20).jpg" alt="" loading="lazy">
            </div>
            <div class="re_r_t_details">
              <p class="solid_smal">Naveed khosa</p>
              <p class="thin_smal space_top">Delhi, Sector 57</p>
              <p class="yelo_i space_top"> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>

        </div>
        <div class="review_bottom">
          <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis
            quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias
            magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe
            minima, magni aperiam id nemo.</p>
        </div>
        <div class="review_r_top">
          <p class="thin_smal">four days ago</p>
        </div>
      </div>
      <!-- review card  -->
      <!-- review card  -->
      <div class="review_card">
        <div class="review_top">
          <div class="review_r_top">
            <div class="re_r_t_img">
              <!-- <iconify-icon icon="iconamoon:profile-fill"></iconify-icon> -->
              <img src="components/imag/g_img/g_img (15).jpg" alt="" loading="lazy">
            </div>
            <div class="re_r_t_details">
              <p class="solid_smal">Naveed khosa</p>
              <p class="thin_smal space_top">Delhi, Sector 57</p>
              <p class="yelo_i space_top"> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>

        </div>
        <div class="review_bottom">
          <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis
            quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias
            magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe
            minima, magni aperiam id nemo.</p>
        </div>
        <div class="review_r_top">
          <p class="thin_smal">four days ago</p>
        </div>
      </div>
      <!-- review card  -->

      <!-- review card  -->
      <div class="review_card">
        <div class="review_top">
          <div class="review_r_top">
            <div class="re_r_t_img">
              <!-- <iconify-icon icon="iconamoon:profile-fill"></iconify-icon> -->
              <img src="components/imag/g_img/g_img (13).jpg" alt="" loading="lazy">
            </div>
            <div class="re_r_t_details">
              <p class="solid_smal">Naveed khosa</p>
              <p class="thin_smal space_top">Delhi, Sector 57</p>
              <p class="yelo_i space_top"> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>

        </div>
        <div class="review_bottom">
          <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis
            quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias
            magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe
            minima, magni aperiam id nemo.</p>
        </div>
        <div class="review_r_top">
          <p class="thin_smal">four days ago</p>
        </div>
      </div>
      <!-- review card  -->


    </div>
    <!-- testimonial style end -->

    <div class="now_hero_al_contnt">
      <div class="para_h danger ceneter_heading">
        <hr />
        <p>LEARN MORE</p>
        <hr />
      </div>

      <!-- booking card  -->
      <a href="FAQs" class="kart_booking_card included_kart Faqs_card">
        <div class="cardkart_booking_img included_kart_img sml_img_kart">
          <div class="cardkart_imgimg included_imgkart_img sml_img">
            <img src="components/imag/info.png" alt="" loading="lazy" />
          </div>
        </div>
        <div class="carrd_kart_content">
          <div class="card_con_heading">
            <p class="para_h">FAQs</p>
          </div>
          <p class="para_p">Know all about Booking</p>
        </div>
      </a>
      <!-- booking card  -->

    </div>

    <!-- bottom menu start ... -->
    <div class="bottm_menu_container bottom_btn">
      <div class="bottom_menu_box bottom_btn_bx">
      <div class="continuebtn">
            <a href="book-a-bartender">Continue</a>
        </div>
      </div>
    </div>
    <!-- bottom menu start ... -->

  </div>
  <script src="components/js/jquery-3.7.1.slim.min.js"></script>
  <script src="libs/lightgallery/lightgallery.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="components/js/js.js"></script>
  <script>
    $(".image-lightbox").each(function() {
      lightGallery($(this).get(0), {
        selector: '.ai-lightbox-image',
        download: false,
      });
    });
  </script>
</body>

</html>