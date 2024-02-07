<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dishes | Look My Cook</title>
        <link rel="stylesheet" href="components/css/style.css">
        <link rel="stylesheet" href="components/css/style_pop_up.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
      
      </head>
<body>
      <!-- select dishes 120> popup of payment -->
  <!-- Add more popup containers with different IDs -->
  <div class="pre_bk_kart_mainpage">
    
    <div id="popupContainer120" class="popup-container tab_body">
        <button class="back-button" onclick="history.back()">
          <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
          </svg>
          Select Dishes Now
        </button>

        <!-- Your scrollable content goes here -->

        <div class="tabs_topspace"></div>
        <div class="dishes_page_top_">
          <div class="increase_dec_selected_dish">
            <p class="solid_smal" style="margin:5px;">Starters</p>
            <div style="height:25px;box-shadow:none;border: 1px solid #ddd; background:#fff;" class="incre_dcre_daba">
              <div style="height:25px;" class="decree_w decree minus_plus" id="minusButton14">
                <i class="fa-solid fa-minus"></i>
              </div>
              <div style="height:25px;" class="decree_w incre_no_dcree number">
                <p class="number" id="displayedNumber14">0</p>
              </div>
              <div style="height:25px;" class="decree_w decree plus_minus incree" id="plusButton14">
                <i class="fa-solid fa-plus"></i>
              </div>
            </div>
          </div>

          <div class="dieshes_search_container">
            <input type="text" name="search" id="searchbar" onkeyup="search_animal()" placeholder="Search for names..">
          </div>
        </div>


        <div id="tabs-container">
          <div class="tab">

            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">
              <div class="tablinks_container">
                <div class="tablink_img">
                  <img src="components/imag/categorie_tab/Indian-Food-PNG-Clipart.png" alt="">
                </div>
                Starters
              </div>
            </button>

            <button class="tablinks" onclick="openCity(event, 'Paris')">
              <div class="tablinks_container">
                <div class="tablink_img">
                  <img src="components/imag/categorie_tab/Indian-Food-PNG-Pic.png" alt="">
                </div>
                Main Course
              </div>
            </button>

            <button class="tablinks" onclick="openCity(event, 'Tokyo')">
              <div class="tablinks_container">
                <div class="tablink_img">
                  <img src="components/imag/categorie_tab/Indian-Food-PNG-Image.png" alt="">
                </div>
                Breads & Rice
              </div>
            </button>

            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">
              <div class="tablinks_container">
                <div class="tablink_img">
                  <img src="components/imag/categorie_tab/Indian-Food-PNG-Clipart.png" alt="">
                </div>
                Desserts
              </div>
            </button>

            <button class="tablinks" onclick="openCity(event, 'Paris')">
              <div class="tablinks_container">
                <div class="tablink_img">
                  <img src="components/imag/categorie_tab/Indian-Food-PNG-Pic.png" alt="">
                </div>
                Soups & Beverages
              </div>
            </button>


          </div>

          <div id="London" class="tabcontent">
            <!-- categoris card.. start -->
            <div id="myUL" class="tabs_cards">
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Miss</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Khosa</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
            </div>
            <!-- categoris card.. end -->
          </div>

          <div id="Paris" class="tabcontent">
            <!-- categoris card.. start -->
            <div id="myUL" class="tabs_cards">
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Miss</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Khosa</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
            </div>
            <!-- categoris card.. end -->
          </div>

          <div id="Tokyo" class="tabcontent">
            <!-- categoris card.. start -->
            <div id="myUL" class="tabs_cards">
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Miss</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Khosa</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
              <!-- tabs card..  -->
              <div class="tab_card">
                <div class="tabcard_center">
                  <div class="tabimg">
                    <img src="components/imag/bartendar_11zon.png" alt="" />
                  </div>
                  <p class="para_p">Naveed</p>
                  <div class="add_btn">
                    <button>Add</button>
                  </div>
                </div>
              </div>
              <!-- tabs card..  -->
            </div>
            <!-- categoris card.. end -->
          </div>
    </div>
    <!-- bottom menu start ... -->
    <!-- bottom nav include -->
    <?php include "inc/bottom_nav.php"; ?>


  </div>

  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="components/js/js.js"></script>
  <script src="static/js/jquery.js"></script>
  <script src="static/js/preferences.js"></script>
  <script src="static/js/chef.js"></script>

</body>
</html>