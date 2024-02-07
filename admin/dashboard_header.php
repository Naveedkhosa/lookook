<?php
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  


if(!isset($_SESSION['admin_id'])){
    header("Location:index");
}


?>
<div class="_dashboard">
    <div class="_top">
        <div class="_top_logo">Admin Panel</div>
        <ul class="right_nav">
            <!-- <li>
                <a href="#">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Messages</span>
                    <i class="fa-solid fa-chevron-down doosra" style="font-size: 14px;"></i>
                </a>
            </li> -->
            <!-- <li>
                <a href="#">
                    <i class="fa-solid fa-bell"></i>
                    <span>Alerts</span>
                    <i class="fa-solid fa-chevron-down doosra" style="font-size: 14px;"></i>
                </a>
            </li> -->
            <li>
                <a href="#" id="sub_menu_trigger">
                    <i class="fa-solid fa-user"></i>
                    <span>
                        <?php if(isset($_SESSION['admin_username'])){
                            echo $_SESSION['admin_username'];
                        }else{
                            echo "Admin";
                        } ?>
                    </span>
                    <i class="fa-solid fa-chevron-down doosra" style="font-size: 14px;"></i>
                </a>
                <ul class="sub_menu">
                    <!-- <li>
                        <a href="#"><i class="fa-solid fa-user-gear"></i>My Profile</a>
                    </li> -->

                    <li>
                        <a href="logout"><i class="fa-solid fa-power-off"></i>Logout</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="" id="btn_for_sidebar">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="_bottom">
        <div class="_bottom_left">
            <ul class="_side_bar">

                <!-- menu item 1 -->
                <?php if(explode(".", $curPageName)[0]=="dashboard"){ ?>
                <li class="__active">
                    <a href="dashboard">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="dashboard">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 1 -->

                <!-- menu item 2 -->
                <?php if(explode(".", $curPageName)[0]=="users"){ ?>
                <li class="__active">
                    <a href="users">
                        <i class="fa-solid fa-users-line"></i>
                        <span class="text">Users</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="users">
                        <i class="fa-solid fa-users-line"></i>
                        <span class="text">Users</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 2 -->


                <!-- menu item 3 -->
                <?php if(explode(".", $curPageName)[0]=="menu"){ ?>
                <li class="__active">
                    <a href="menu">
                        <i class="fas fa-cocktail"></i>
                        <span class="text">Menu</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="menu">
                        <i class="fas fa-cocktail"></i>
                        <span class="text">Menu</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 3 -->



                <?php if(explode(".", $curPageName)[0]=="recipes"){ ?>
                <li class="__active">
                    <a href="recipes">
                        <i class="fa-solid fa-utensils"></i>
                        <span class="text">Recipes</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="recipes">
                        <i class="fa-solid fa-utensils"></i>
                        <span class="text">Recipes</span>
                    </a>
                </li>
                <?php } ?>


                <!-- menu item 4 -->
                <?php if(explode(".", $curPageName)[0]=="dishes"){ ?>
                <li class="__active">
                    <a href="dishes">
                        <i class="fa-solid fa-plate-wheat"></i>
                        <span class="text">Dishes</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="dishes">
                        <i class="fa-solid fa-plate-wheat"></i>
                        <span class="text">Dishes</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 4 -->



                <!-- menu item 5 -->
                <?php if(explode(".", $curPageName)[0]=="coupons"){ ?>
                <li class="__active">
                    <a href="coupons">
                        <i class="fa-solid fa-tag"></i>
                        <span class="text">Coupons</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="coupons">
                        <i class="fa-solid fa-tag"></i>
                        <span class="text">Coupons</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 5 -->

                <!-- menu item 6 -->
                <?php if(explode(".", $curPageName)[0]=="appliances"){ ?>
                <li class="__active">
                    <a href="appliances">
                        <i class="fa-solid fa-kitchen-set"></i>
                        <span class="text">Appliances</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="appliances">
                        <i class="fa-solid fa-kitchen-set"></i>
                        <span class="text">Appliances</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 6 -->


                <!-- menu item 7 -->
                <?php 
                if(explode(".", $curPageName)[0]=="service-fee"){
                     ?>
                <li class="__active">
                    <a href="service-fee">
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                        <span class="text">Services Fee</span>
                    </a>
                </li>
                <?php
                 }else{ 
                    ?>
                <li>
                    <a href="service-fee">
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                        <span class="text">Services Fee</span>
                    </a>
                </li>
                <?php 
                } 
                ?>
                <!-- menu item 7 -->
                
                
                <!-- menu item new -->
                <?php 
                if(explode(".", $curPageName)[0]=="occasional-charges"){
                     ?>
                <li class="__active">
                    <a href="occasional-charges">
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                        <span class="text">Occasional Fee</span>
                    </a>
                </li>
                <?php
                 }else{ 
                    ?>
                <li>
                    <a href="occasional-charges">
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                        <span class="text">Occasional Fee</span>
                    </a>
                </li>
                <?php 
                } 
                ?>
                <!-- menu item new -->



                <!-- menu item 8 -->
                <?php if(explode(".", $curPageName)[0]=="taxes"){ ?>
                <li class="__active">
                    <a href="taxes">
                        <i class="fa-solid fa-money-check"></i>
                        <span class="text">Taxes</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="taxes">
                        <i class="fa-solid fa-money-check"></i>
                        <span class="text">Taxes</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 8 -->



                <!-- menu item 9 -->
                <?php if(explode(".", $curPageName)[0]=="bookings"){ ?>
                <li class="__active">
                    <a href="bookings">
                        <i class="fa-solid fa-calendar"></i>
                        <span class="text">Bookings</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="bookings">
                        <i class="fa-solid fa-calendar"></i>
                        <span class="text">Bookings</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 9 -->


                  <!-- menu item 10 -->
                  <?php if(explode(".", $curPageName)[0]=="rewards"){ ?>
                <li class="__active">
                    <a href="rewards">
                        <i class="fa-solid fa-gear"></i>
                        <span class="text">Settings</span>
                    </a>
                </li>
                <?php }else{ ?>
                <li>
                    <a href="rewards">
                        <i class="fa-solid fa-gear"></i>
                        <span class="text">Settings</span>
                    </a>
                </li>
                <?php } ?>
                <!-- menu item 10 -->








            </ul>
        </div>

        <!-- CONTENT -->
        <div class="_bottom_right">
            <div class="_greeting">Slam Admin !</div>
            <div class="_breadcrumb">
                Dashboard
                <hr> <?php if(explode(".", $curPageName)[0]!="dashboard"){echo explode(".", $curPageName)[0]; }?>
            </div>