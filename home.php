<?php
include "config.php";
include "inc/global_functions.php";
$home_banners = getBanners();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Look My Cook</title>
  <link rel="stylesheet" href="components/css/style.css" />
  <link rel="stylesheet" href="components/css/footer.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

  <!-- swiperjs - cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
  <div class="landing_page_kart">


    <!-- top menu start ... -->
    <div class="bottm_menu_container">
      <div class="top_menu_box">
        <div class="_logo" href="#">
          <img src="components/imag/look my cook logo.jpg" alt="" />
        </div>
        <div class="top_side_nav" id="nav_toggle_btn">
          <iconify-icon icon="ei:navicon"></iconify-icon>
        </div>
      </div>
    </div>



    <!-- slider - swiper js -->
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php
        /**
         * Show banners - from database
         */
        if ($home_banners) {

          foreach ($home_banners as $key => $banner) { ?>
            <div class="swiper-slide">
              <img src="components/banner-images/<?= $banner['banner_image']  ?>" alt="<?= $banner['banner_img_alt']  ?>" />
            </div>
          <?php }
          ?>

        <?php
          /**
           * if no banners was found - then show the default one
           */
        } else {
        ?>
          <div class="swiper-slide">
            <img src="components/imag/g_img/WhatsApp Image 2024-01-11 at 02.02.33_b9109300.jpg" />
          </div>
          <div class="swiper-slide">
            <img src="components/imag/img1 (4).webp" />
          </div>
          <div class="swiper-slide">
            <img src="components/imag/img1 (2).webp" />
          </div>
          <div class="swiper-slide">
            <img src="components/imag/img1 (1).webp" />
          </div>

        <?php
        }
        ?>

      </div>
      <div class="swiper-pagination"></div>
    </div>
    <!-- slider - swiper js -->



    <!-- services section -->
    <div class="kart_services_main">
      <p class="heading_p">Our Services</p>
      <div class="kart_services_sec">




        <a href="know-your-chef" class="service_kart_card">
          <div class="kart_card_block_bg "></div>
          <div class="kart_card_img_btnblock">
            <div class="kart_card_block">
              <img src="components/imag/chef..png" alt="" loading="lazy" />
            </div>
            <div class="kart_card_block_content">
              <div class="kart_card_block_cntent">
                <p class="solid_hsmal colr space_botm ">Chef & Cook</p>
                <p class="thin_smal_l space_botom ">Start &#x20B9;888</p>
                <p class="book_btn">Book Now</p>
              </div>
            </div>
          </div>
        </a>

        <a href="know-your-waiter" class="service_kart_card">
          <div class="kart_card_block_bg "></div>
          <div class="kart_card_img_btnblock">
            <div class="kart_card_block">
              <img src="components/imag/waiter..png" alt="" loading="lazy" />
            </div>
            <div class="kart_card_block_content">
              <div class="kart_card_block_cntent">
                <p class="solid_hsmal colr space_botm ">Waiter</p>
                <p class="thin_smal_l space_botom ">Start &#x20B9;888</p>
                <p class="book_btn ">Book Now</p>
              </div>
            </div>
          </div>
        </a>

        <a href="know-your-cleaner" class="service_kart_card">
          <div class="kart_card_block_bg "></div>
          <div class="kart_card_img_btnblock">
            <div class="kart_card_block">
              <img src="components/imag/cleaner..png" alt="" loading="lazy" />
            </div>
            <div class="kart_card_block_content">
              <div class="kart_card_block_cntent">
                <p class="solid_hsmal colr space_botm ">Cleaner</p>
                <p class="thin_smal_l space_botom ">Start &#x20B9;888</p>
                <p class="book_btn ">Book Now</p>
              </div>
            </div>
          </div>
        </a>

        <a href="know-your-bartender" class="service_kart_card">
          <div class="kart_card_block_bg "></div>
          <div class="kart_card_img_btnblock">
            <div class="kart_card_block">
              <img src="components/imag/Bar..png" alt="" loading="lazy" />
            </div>
            <div class="kart_card_block_content">
              <div class="kart_card_block_cntent">
                <p class="solid_hsmal colr space_botm ">Bartender</p>
                <p class="thin_smal_l space_botom ">Start &#x20B9;888</p>
                <p class="book_btn ">Book Now</p>
              </div>
            </div>
          </div>
        </a>

      </div>
    </div>

    <!-- services section -->


    <!-- serving city start  -->
    <div class="suisine_section_main">
      <p class="heading_p">Our Serving Locations</p>
      <p class="para_gray">4+ Cities and counting</p>
      <div class="serving_city_main_cards">

        <!-- card city -->
        <div class="city_card">
          <div class="city_img">
            <img src="components/imag/delhi.png" alt="">
          </div>
          <p>Delhi</p>
        </div>
        <!-- card city -->
        <!-- card city -->
        <div class="city_card">
          <div class="city_img">
            <img src="components/imag/ghaziabad.png" alt="">
          </div>
          <p>Ghaziabad</p>
        </div>
        <!-- card city -->
        <!-- card city -->
        <div class="city_card">
          <div class="city_img">
            <img src="components/imag/mumbai.png" alt="">
          </div>
          <p>Mumbai</p>
        </div>
        <!-- card city -->
        <!-- card city -->
        <div class="city_card">
          <div class="city_img">
            <img src="components/imag/noida.png" alt="">
          </div>
          <p>Noida</p>
        </div>
        <!-- card city -->
        <!-- card city -->
        <div class="city_card">
          <div class="city_img">
            <img src="components/imag/gurgoan.png" alt="">
          </div>
          <p>Gurugram</p>
        </div>
        <!-- card city -->
        <!-- card city -->
        <div class="city_card">
          <div class="city_img">
            <img src="components/imag/bangalore-svgrepo-com.svg" alt="">
          </div>
          <p>Bangalore</p>
        </div>
        <!-- card city -->
      </div>
    </div>
    <!-- serving city end  -->

    <!-- choose us start. -->
    <div class="suisine_section_main">
      <p class="heading_p">Why Choose Us</p>
      <p class="para_gray">4+ Cities and counting</p>
      <div class="choose_section">
        <div class="choose_box_main">

          <div class="choose_right">
            <div class="choose_r_box">
              <div class="chooser_img">
                <img src="components/imag/protection-.png" alt="" loading="lazy">
              </div>
              <p class="cardp choose_r_w_contnet">100% Verified Professionals</p>
            </div>
            <div class="choose_r_box">
              <!-- <iconify-icon icon="fluent:service-bell-20-regular"></iconify-icon> -->
              <div class="chooser_img">
                <img src="components/imag/food-.png" alt="" loading="lazy">
              </div>
              <p class="cardp choose_r_w_contnet">Quality and taste assured</p>
            </div>
            <div class="choose_r_box">
              <!-- <iconify-icon icon="logos:facebook"></iconify-icon> -->
              <!-- <iconify-icon icon="fluent:people-star-48-filled"></iconify-icon> -->
              <div class="chooser_img">
                <img src="components/imag/rate-.png" alt="" loading="lazy">
              </div>
              <p class="cardp choose_r_w_contnet">4.8/5 customer reviews</p>
            </div>
            <div class="choose_r_box">
              <!-- <iconify-icon icon="logos:facebook"></iconify-icon> -->
              <!-- <iconify-icon icon="emojione-monotone:pot-of-food"></iconify-icon> -->
              <div class="chooser_img">
                <img src="components/imag/customer-.png" alt="" loading="lazy">
              </div>
              <p class="cardp choose_r_w_contnet">24x7 Customer support</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- choose us end. -->

    <!-- our top rated section start..  -->
    <div class="suisine_section_main">
      <p class="heading_p">Our Top Rated Professionals</p>
      <p class="para_gray">Trained, Verified and Background Checked</p>

      <div class="toprated_proile_main_cards">

        <!-- top rated card..  -->
        <div class="top_rated_card">
          <div class="top_rated_card_left">
            <div class="top_rated_left_content">
              <p class="solid_smal justify">Chef Puneet</p>
            </div>
            <div class="top_rated_left_content ">
              <p class="thin_smal_l justify">North Indian and South Indian</p>
              <p class="yelo_i space_top center_align">5.0 &nbsp; <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>
          <div class="top_rated_card_right">
            <div class="top_rated_img_card">
              <img src="components/imag/bartender.png" alt="">
            </div>
          </div>
        </div>
        <!-- top rated card..  -->

        <!-- top rated card..  -->
        <div class="top_rated_card">
          <div class="top_rated_card_left">
            <div class="top_rated_left_content">
              <p class="solid_smal justify">Chef Puneet</p>
            </div>
            <div class="top_rated_left_content ">
              <p class="thin_smal_l justify">North Indian and South Indian</p>
              <p class="yelo_i space_top center_align">5.0 &nbsp; <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>
          <div class="top_rated_card_right">
            <div class="top_rated_img_card">
              <img src="components/imag/bartender.png" alt="">
            </div>
          </div>
        </div>
        <!-- top rated card..  -->

        <!-- top rated card..  -->
        <div class="top_rated_card">
          <div class="top_rated_card_left">
            <div class="top_rated_left_content">
              <p class="solid_smal justify">Chef Puneet</p>
            </div>
            <div class="top_rated_left_content ">
              <p class="thin_smal_l justify">North Indian and South Indian</p>
              <p class="yelo_i space_top center_align">5.0 &nbsp; <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>
          <div class="top_rated_card_right">
            <div class="top_rated_img_card">
              <img src="components/imag/bartender.png" alt="">
            </div>
          </div>
        </div>
        <!-- top rated card..  -->

        <!-- top rated card..  -->
        <div class="top_rated_card">
          <div class="top_rated_card_left">
            <div class="top_rated_left_content">
              <p class="solid_smal justify">Chef Puneet</p>
            </div>
            <div class="top_rated_left_content ">
              <p class="thin_smal_l justify">North Indian and South Indian</p>
              <p class="yelo_i space_top center_align">5.0 &nbsp; <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>
          <div class="top_rated_card_right">
            <div class="top_rated_img_card">
              <img src="components/imag/bartender.png" alt="">
            </div>
          </div>
        </div>
        <!-- top rated card..  -->

        <!-- top rated card..  -->
        <div class="top_rated_card">
          <div class="top_rated_card_left">
            <div class="top_rated_left_content">
              <p class="solid_smal justify">Chef Puneet</p>
            </div>
            <div class="top_rated_left_content ">
              <p class="thin_smal_l justify">North Indian and South Indian</p>
              <p class="yelo_i space_top center_align">5.0 &nbsp; <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>
          <div class="top_rated_card_right">
            <div class="top_rated_img_card">
              <img src="components/imag/bartender.png" alt="">
            </div>
          </div>
        </div>
        <!-- top rated card..  -->

        <!-- top rated card..  -->
        <div class="top_rated_card">
          <div class="top_rated_card_left">
            <div class="top_rated_left_content">
              <p class="solid_smal justify">Chef Puneet</p>
            </div>
            <div class="top_rated_left_content ">
              <p class="thin_smal_l justify">North Indian and South Indian</p>
              <p class="yelo_i space_top center_align">5.0 &nbsp; <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
            </div>
          </div>
          <div class="top_rated_card_right">
            <div class="top_rated_img_card">
              <img src="components/imag/bartender.png" alt="">
            </div>
          </div>
        </div>
        <!-- top rated card..  -->


      </div>
    </div>
    <!-- our top rated section end..  -->

    <!-- Rating and Reviews section start..  -->
    <div class="suisine_section_main">
      <p class="heading_p">Our Rating and Reviews</p>
      <!-- <p class="para_gray">Trained, Verified and Background Checked</p> -->
      <div class="al_rev_count space_top">
        <iconify-icon icon="lets-icons:star-duotone"></iconify-icon>
        <p class="heading_p space_top">4.5 Rating
        <p class="para_p space_top"> &nbsp;(Based on 15K+ Reviews)</p>
        </p>
      </div>
      <div class="reviews_cards_main">

        <!-- review card  -->
        <div class="review_card rating_card">
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
            <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe minima, magni aperiam id nemo.</p>
          </div>
          <div class="review_r_top">
            <p class="thin_smal">four days ago</p>
          </div>
        </div>
        <!-- review card  -->
        <!-- review card  -->
        <div class="review_card rating_card">
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
            <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe minima, magni aperiam id nemo.</p>
          </div>
          <div class="review_r_top">
            <p class="thin_smal">four days ago</p>
          </div>
        </div>
        <!-- review card  -->
        <!-- review card  -->
        <div class="review_card rating_card">
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
            <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe minima, magni aperiam id nemo.</p>
          </div>
          <div class="review_r_top">
            <p class="thin_smal">four days ago</p>
          </div>
        </div>
        <!-- review card  -->
        <!-- review card  -->
        <div class="review_card rating_card">
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
            <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe minima, magni aperiam id nemo.</p>
          </div>
          <div class="review_r_top">
            <p class="thin_smal">four days ago</p>
          </div>
        </div>
        <!-- review card  -->
        <!-- review card  -->
        <div class="review_card rating_card">
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
            <p class="para_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea aspernatur maiores reiciendis quaerat quae voluptates! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quidem, molestias magni ipsa sed minima accusantium, corrupti, aperiam dolore natus nisi adipisci explicabo. Facere saepe minima, magni aperiam id nemo.</p>
          </div>
          <div class="review_r_top">
            <p class="thin_smal">four days ago</p>
          </div>
        </div>
        <!-- review card  -->
      </div>
    </div>
    <!-- Rating and Reviews section end..  -->





  </div>
  <!-- footer include -->
  <?php include "inc/footer.php"; ?>


  <!-- bottom nav include -->
  <?php include "inc/bottom_nav.php"; ?>

  <!-- bottom nav include -->
  <?php include "inc/navbar.php"; ?>

  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="components/js/js.js"></script>
  <script src="components/js/jquery-3.7.1.slim.min.js"></script>
  <script>
    /**
     * swiper-js - slider configuartion
     */
    const swiper = new Swiper(".swiper", {
      direction: "horizontal",
      loop: true,
      allowTouchMove: true,
      autoplay: true,
      delay: 3000,
      disableOnInteraction: true,
    });

    $("#nav_toggle_btn").on("click", function() {
      $("#nav_popped_up").toggle();
    });
  </script>
</body>

</html>