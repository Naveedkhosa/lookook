<?php
include "../config.php";
$total_users = 0;
$users_query = "SELECT count(*) as total_user FROM `users`;";
if ($user_result = mysqli_query($conn, $users_query)) {
    $total_users = mysqli_fetch_assoc($user_result)['total_user'];
}


$total_menus = 0;
$total_dishes = 0;
$menu_categories_query = "SELECT count(*) as total_menus , sum(`menu_c_items`) as total_dishes FROM `menu_categories`;";
if ($menu_categories_query_result = mysqli_query($conn, $menu_categories_query)) {
    if (mysqli_num_rows($menu_categories_query_result) > 0) {
        $menu_categories_query_result_rows = mysqli_fetch_assoc($menu_categories_query_result);
        $total_menus = $menu_categories_query_result_rows['total_menus'];
        $total_dishes = $menu_categories_query_result_rows['total_dishes'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Look My Cook</title>

    <!-- css link -->

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/user.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php include "dashboard_header.php"; ?>
    <!-- <div class="_dashboard">
        <div class="_top">
            <div class="_top_logo"> Admin Panel</div>
            <ul class="right_nav">
                <li>
                    <a href="#">
                        <i class="fa-solid fa-envelope"></i>
                        <span>Messages</span>
                        <i class="fa-solid fa-chevron-down doosra" style="font-size: 14px;"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-bell"></i>
                        <span>Alerts</span>
                        <i class="fa-solid fa-chevron-down doosra" style="font-size: 14px;"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-user"></i>
                        <span>Admin</span>
                        <i class="fa-solid fa-chevron-down doosra" style="font-size: 14px;"></i>
                    </a>
                </li>

                <li>
                    <a href="" id="btn_for_sidebar">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="_bottom">
            <div class="_bottom_left">
                <ul class="_side_bar">

                    <li class="__active">
                        <a href="dashboard.php">
                            <i class="fa-solid fa-gauge-high"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="users.php">
                            <i class="fa-solid fa-users-line"></i>
                            <span class="text">Users</span>
                        </a>
                    </li>

                    <li>
                        <a href="menu.php">
                            <i class="fa-solid fa-utensils"></i>
                            <span class="text">Menu</span>
                        </a>
                    </li>

                    <li class="__active">
                        <a href="dashboard.php">
                            <i class="fa-solid fa-gauge-high"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="users.php">
                            <i class="fa-solid fa-users-line"></i>
                            <span class="text">Users</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-user-group"></i>
                            <span class="text">Creators</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-file-pen"></i>
                            <span class="text">Requests</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-blog"></i>
                            <span class="text">Blogs</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-pen"></i>
                            <span class="text">Articles</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-gauge-high"></i>
                            <span class="text">Posts</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-align-left"></i>
                            <span class="text">Drafts</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-square-check"></i>
                            <span class="text">Published</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-tags"></i>
                            <span class="text">Categories</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-chart-column"></i>
                            <span class="text">web stats</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa-solid fa-palette"></i>
                            <span class="text">web theme</span>
                        </a>
                    </li>



                </ul>
            </div>
            <div class="_bottom_right">
                CONTENT
    <div class="_greeting">Slam Admin !</div>
    <div class="_breadcrumb">
        Dashboard
        <hr>
    </div>
    -->


    <div class="_welcome_message">
        <i class="fa-solid fa-bullhorn"></i> Welcome to your dashboard!..
    </div>

    <div class="_websites_stats_container _users_stats">


        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count">
                        <?php echo $total_users; ?>
                    </div>
                    <div class="_stat_count_name">Users</div>
                </div>
            </div>
            <a href="users" class="_stat_box_bottom">
                <div class="_stat_count_type_name">View</div>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </a>
        </div>
        <!-- stat box end -->

        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-utensils"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count">
                        <?php echo $total_menus; ?>
                    </div>
                    <div class="_stat_count_name">Menus</div>
                </div>
            </div>
            <a href="menu" class="_stat_box_bottom">
                <div class="_stat_count_type_name">View</div>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </a>
        </div>
        <!-- stat box end -->

        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-plate-wheat"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count">
                        <?php echo $total_dishes; ?>
                    </div>
                    <div class="_stat_count_name">Total Dishes</div>
                </div>
            </div>
            <a href="dishes" class="_stat_box_bottom">
                <div class="_stat_count_type_name">View</div>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </a>
        </div>
        <!-- stat box end -->





    </div>


    <div class="_revenue_heading">
        Business earning
    </div>
    <div class="_websites_stats_container _users_stats new_state">
        <?php
          $total_revenue = "SELECT SUM(`total_payment`) as total_earning FROM `booking` WHERE booking_status='completed';";
          $last_month_total_revenue = "SELECT SUM(`total_payment`) as last_month_total_earning FROM `booking` WHERE booking_status='completed' AND booking_for_date <= CURRENT_DATE AND booking_for_date >= DATE_SUB(CURRENT_DATE,INTERVAL 30 DAY);";

          function thousandsCurrencyFormat($num) {

            if($num>1000) {
                
                  $x = round($num);
                  $x_number_format = number_format($x);
                  $x_array = explode(',', $x_number_format);
                  $x_parts = array('k', 'm', 'b', 't');
                  $x_count_parts = count($x_array) - 1;
                  $x_display = $x;
                  $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                  $x_display .= $x_parts[$x_count_parts - 1];
          
                  return $x_display;
          
            }
          
            return $num;
          }


          $total_rev = 0;
          
          if($rev_result = mysqli_query($conn,$total_revenue)){
            if(mysqli_num_rows($rev_result)>0){
                $total_rev = mysqli_fetch_assoc($rev_result)['total_earning'];
                if($total_rev==NULL){
                     $total_rev = 0;
                }else{
                $total_rev = thousandsCurrencyFormat($total_rev);
                }
            }
          }



          $total_rev_monthly = 0;
          if($rev_month = mysqli_query($conn,$last_month_total_revenue)){
            if(mysqli_num_rows($rev_month)>0){
                $total_rev_monthly = mysqli_fetch_assoc($rev_month)['last_month_total_earning'];
                if($total_rev_monthly==NULL){
                    $total_rev_monthly = 0;
                }else{
                $total_rev_monthly = thousandsCurrencyFormat($total_rev_monthly);
                }
            }
          }


        ?>

        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-indian-rupee-sign"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count"><?php echo $total_rev_monthly; ?></div>
                    <div class="_stat_count_name">last month</div>
                </div>
            </div>
            <!-- <div class="_stat_box_bottom">
                <div class="_stat_count_type_name">View</div>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </div> -->
        </div>
        <!-- stat box end -->

        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-indian-rupee-sign"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count"><?php echo $total_rev; ?></div>
                    <div class="_stat_count_name">Total</div>
                </div>
            </div>
            <!-- <div class="_stat_box_bottom">
                <div class="_stat_count_type_name">View</div>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </div> -->
        </div>
        <!-- stat box end -->





    </div>





    <!-- <div class="_websites_stats_container _container_3"> -->
    <!--stat box -->
    <!-- <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count">100</div>
                    <div class="_stat_count_name">Users</div>
                </div>
            </div>
            <div class="_stat_box_bottom">
                <div class="_stat_count_type_name">View</div>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </div>
        </div> -->
    <!-- stat box end -->
    <!-- </div> -->



    <!-- CONTENT -->
    <?php include "dashboard_footer.php"; ?>
    <script>
        $(document).ready(function () {




        });
    </script>
</body>

</html>