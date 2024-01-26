<?php
include "../config.php";
$total_menus = 0;
$total_dishes = 0;
$menu_categories_query = "SELECT count(*) as total_menus , sum(`menu_c_items`) as total_dishes FROM `menu_categories`;";
if($menu_categories_query_result = mysqli_query($conn,$menu_categories_query)){
if(mysqli_num_rows($menu_categories_query_result) > 0){
    
    $menu_categories_query_result_rows = mysqli_fetch_assoc($menu_categories_query_result);
    $total_menus =  $menu_categories_query_result_rows['total_menus'];
    $total_dishes =  $menu_categories_query_result_rows['total_dishes'];
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Look My Cook</title>

    <!-- css link -->

    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/alert_box.css">
    <link rel="stylesheet" href="css/model_box.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php include "dashboard_header.php"; ?>







    <div class="_websites_stats_container _users_stats">

        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-utensils"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count"><?php echo $total_menus; ?></div>
                    <div class="_stat_count_name">Menus</div>
                </div>
            </div>
        </div>
        <!-- stat box end -->


        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-plate-wheat"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count"><?php echo $total_dishes; ?></div>
                    <div class="_stat_count_name">Total Dishes</div>
                </div>
            </div>
        </div>
        <!-- stat box end -->





    </div>



    <div class="_top_btns_container">
        <input type="text" placeholder="Enter Menu" id="menu_name_field">
        <button class="_add_new_menu_btn" id="add_new_menu">Add New</button>
    </div>
    <div class="_table_container_">
        <table class="_table_is" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Menu</th>
                    <th>Dishes</th>
                    <th>Last updated</th>
                    <!-- <th>Edit</th>
                    <th>Delete</th> -->
                </tr>
            </thead>
            <tbody id="loaded_table">



            </tbody>
        </table>

    </div>

    <!-- CONTENT -->


    <!-- alert box -->
    <div class="alert">
        <div class="_message_"></div>
        <span class="closebtn">&times;</span>
    </div>
    <!-- alert box -->


    <!-- pop up for Update menu -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">

            <div class="_top_btns_container">
                <input type="text" placeholder="Enter Menu" id="update_menu_name_field">
                <button class="_add_new_menu_btn" id="update_menu">Update</button>
            </div>

            <div class="_btn_close_pop_up" id="_btn_close_pop_up"><i class="fa-solid fa-xmark"></i></div>
        </div>

    </div>
    <!-- pop up for Update menu -->
    <?php include "dashboard_footer.php"; ?>
    <script>
    $(document).ready(function() {



        // show - hide model
        $("#myModal").css("display", "flex");
        $("#myModal").hide();


        $("#_btn_close_pop_up").click(function() {
            $("#myModal").hide();
        });

        // show - hide model

        // edit menu
        $(document).on("click", "._user_edit_btn", function() {
            clearTimeout(hide_alert_timeout);
            clearTimeout(myTimeout);

            var _user_edit_btn_id = $(this).attr("id");

            if (_user_edit_btn_id != 27) {
                $("#myModal").show();
                $("#update_menu_name_field").attr("data-__i__", _user_edit_btn_id);
                $.ajax({
                    url: "menu_backend/get_menu_to_update",
                    type: "post",
                    data: {
                        _user_edit_btn_id: _user_edit_btn_id
                    },
                    success: function(_response_menu_name) {
                        if (_response_menu_name != 0) {
                            $("#update_menu_name_field").val(_response_menu_name);
                        } else {
                            load_menu__();
                            $("#myModal").hide();
                        }
                    }
                });
            } else {

                $(".alert").css("background", "#2196F3");
                $(".alert ._message_").html(
                    "<strong>Info!</strong>&nbsp;You can't edit Uncategorized menu."
                );
                $(".alert").css("display", "flex");
                $(".alert").css("opacity", "1");
                myTimeout = setTimeout(hide_alert_auto, 4000);
            }

        });

        $("#update_menu").on("click", function() {

            var updated_menu = $("#update_menu_name_field").val();
            var _to_be_update_id = $("#update_menu_name_field").attr("data-__i__");

            if (updated_menu != "") {
                $("#update_menu_name_field").css("border", "1px solid #c5c5c5");
                $("#update_menu_name_field").blur();
                $.ajax({
                    url: "menu_backend/menu_update",
                    type: "post",
                    data: {
                        _to_be_update_id: _to_be_update_id,
                        updated_menu: updated_menu
                    },
                    success: function(updated_menu_response) {
                        $("#myModal").hide();
                        load_menu__();
                        $(".alert").css("background", "#04AA6D");
                        $(".alert ._message_").html(
                            "<strong>Success!</strong>&nbsp;Menu Updated Successfully."
                        );
                        $(".alert").css("display", "flex");
                        $(".alert").css("opacity", "1");
                        myTimeout = setTimeout(hide_alert_auto, 4000);

                    }
                });

            } else {
                $("#update_menu_name_field").css("border", "1px solid red");
                $("#update_menu_name_field").focus();
            }

        });
        // edit menu




        // delete menu
        $(document).on("click", "._user_delete_btn", function() {

            clearTimeout(hide_alert_timeout);
            clearTimeout(myTimeout);

            if ($(this).attr("id") == 27) {
                $(".alert").css("background", "#2196F3");
                $(".alert ._message_").html(
                    "<strong>Info!</strong>&nbsp;You can't delete Uncategorized menu."
                );
                $(".alert").css("display", "flex");
                $(".alert").css("opacity", "1");
                myTimeout = setTimeout(hide_alert_auto, 4000);

            } else {

                if (confirm(
                        "Dishes in this menu will be added to uncategorized menu. Do you want to continue?"
                    )) {
                    var _user_delete_btn_id = $(this).attr("id");
                    //    request ajax to delete
                    $.ajax({
                        url: "menu_backend/delete_menu",
                        type: "post",
                        data: {
                            _user_delete_btn_id: _user_delete_btn_id
                        },
                        beforeSend: function() {
                            $(this).attr("disabled", "disabled");
                            $(this).css("opacity", "0.8");
                            $(this).css("cursor", "not-allowed");
                        },
                        success: function(delete_menu_response) {
                            if (delete_menu_response == 1) {
                                load_menu__();
                                $(".alert").css("background", "#04AA6D");
                                $(".alert ._message_").html(
                                    "<strong>Success!</strong>&nbsp;Menu deleted Successfully."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);
                            } else if (delete_menu_response == 27) {
                                $(".alert").css("background", "#2196F3");
                                $(".alert ._message_").html(
                                    "<strong>Info!</strong>&nbsp;You can't delete Uncategorized menu."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);

                            } else {
                                $(this).removeAttr("disabled");
                                $(this).css("opacity", "1");
                                $(this).css("cursor", "pointer");

                                $(".alert").css("background", "#f44336")
                                $(".alert ._message_").html(
                                    "<strong>ERROR!</strong>&nbsp; There is an error. Please try later"
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);
                            }
                        }
                    });
                    //    request ajax to delete


                }

            }


        });
        // delete menu




        // close | hide alert
        $(".closebtn").on("click", function() {
            $(this).parent().css("opacity", "0");
            setTimeout(function() {
                    $(".alert").css("display", "none");
                },
                600);
        });


        var myTimeout;
        var hide_alert_timeout;

        function hide_alert_auto() {
            $(".alert").css("opacity", "0");
            hide_alert_timeout = setTimeout(hide_alert(), 600);
        }

        function hide_alert() {
            $(".alert").css("display", "none");
        }

        // close | hide alert

        // add new menu / Ajax
        $("#add_new_menu").on("click", function(e) {
            e.preventDefault();
            var menu_name = $("#menu_name_field").val();
            if (menu_name != "") {
                $("#menu_name_field").blur();
                $("#menu_name_field").css("border-color", "#c5c5c5");

                $.ajax({
                    url: "menu_backend/add_menu",
                    type: "post",
                    data: {
                        menu_name: menu_name
                    },
                    beforeSend: function() {
                        $("#add_new_menu").attr("disabled", "disabled");
                        $("#add_new_menu").css("opacity", "0.8");
                        $("#add_new_menu").css("cursor", "not-allowed");
                    },
                    success: function(add_menu_response) {
                        if (add_menu_response == 1) {
                            $("#menu_name_field").val("");
                            load_menu__();
                            $(".alert").css("background", "#04AA6D")
                            $(".alert ._message_").html(
                                "<strong>Success!</strong>&nbsp;New Menu Added Successfully."
                            );
                            $(".alert").css("display", "flex");
                            $(".alert").css("opacity", "1");
                            myTimeout = setTimeout(hide_alert_auto, 4000);
                        } else if (add_menu_response == "dup") {
                            $(".alert").css("background", "#f44336");
                            $(".alert ._message_").html(
                                "<strong>ERROR!</strong>&nbsp; This menu already exist."
                            );
                            $("#menu_name_field").focus();
                            $("#menu_name_field").css("border-color", "red");
                            $(".alert").css("display", "flex");
                            $(".alert").css("opacity", "1");
                            myTimeout = setTimeout(hide_alert_auto, 4000);
                        } else {
                            $(".alert").css("background", "#f44336");
                            $(".alert ._message_").html(
                                "<strong>ERROR!</strong>&nbsp; There is an error. Please try later"
                            );
                            $(".alert").css("display", "flex");
                            $(".alert").css("opacity", "1");
                            myTimeout = setTimeout(hide_alert_auto, 4000);
                            $("#menu_name_field").focus();
                            $("#menu_name_field").css("border-color", "red");
                        }
                        $("#add_new_menu").removeAttr("disabled");
                        $("#add_new_menu").css("opacity", "1");
                        $("#add_new_menu").css("cursor", "pointer");
                    }
                });


            } else {
                clearTimeout(hide_alert_timeout);
                clearTimeout(myTimeout);
                $(".alert").css("background", "#f44336");
                $(".alert ._message_").html("<strong>ERROR!</strong>&nbsp;Please fill the menu field.");
                $("#menu_name_field").focus();
                $("#menu_name_field").css("border-color", "red");
                $(".alert").css("display", "flex");
                $(".alert").css("opacity", "1");
                myTimeout = setTimeout(hide_alert_auto, 4000);
            }
        });

        // \____/ add new menu - Ajax

        // load menu using ajax
        function load_menu__() {
            $.ajax({
                url: "menu_backend/load_menu",
                type: "post",
                success: function(load_menu_response) {
                    $("#loaded_table").html(load_menu_response);
                }
            });
        }

        load_menu__();
        // load menu using ajax


    });
    </script>
</body>

</html>