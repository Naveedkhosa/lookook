<?php 
include "../config.php"; 
$total_coupons = 0;
$_expired_codes = 0;
$_running_codes = 0;
$coupon_codes_expired_query = "SELECT COUNT(*) as total_expired_coupons FROM coupon_codes WHERE valid_till < CURRENT_DATE();";
if($coupon_codes_expired_query_result = mysqli_query($conn,$coupon_codes_expired_query)){
$_expired_codes = mysqli_fetch_assoc($coupon_codes_expired_query_result)['total_expired_coupons'];
}else{
$_expired_codes = 0;
}

$coupon_codes_query = "SELECT count(*) as total_coupons FROM `coupon_codes`;";
if($coupon_codes_query_result = mysqli_query($conn,$coupon_codes_query)){
if(mysqli_num_rows($coupon_codes_query_result) > 0){
    $total_coupons = mysqli_fetch_assoc($coupon_codes_query_result)['total_coupons'];
}
}

$_running_codes_query = "SELECT count(*) as running_coupons FROM `coupon_codes` WHERE valid_till >= CURRENT_DATE();;";
if($_running_codes_query_result = mysqli_query($conn,$_running_codes_query)){
if(mysqli_num_rows($_running_codes_query_result) > 0){
    $_running_codes = mysqli_fetch_assoc($_running_codes_query_result)['running_coupons'];
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon Codes | Look My Cook</title>

    <!-- css link -->

    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/alert_box.css">
    <link rel="stylesheet" href="css/model_box.css">
    <link rel="stylesheet" href="css/coupon.css">
    <link rel="stylesheet" href="../static/css/jquery-ui.min.css">

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
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count"><?php echo $_running_codes; ?></div>
                    <div class="_stat_count_name">Running Coupons</div>
                </div>
            </div>
        </div>
        <!-- stat box end -->
        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count"><?php echo $_expired_codes; ?></div>
                    <div class="_stat_count_name">Expired Coupons</div>
                </div>
            </div>
        </div>
        <!-- stat box end -->



        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count"><?php echo $total_coupons; ?></div>
                    <div class="_stat_count_name">All Coupons</div>
                </div>
            </div>
        </div>
        <!-- stat box end -->



    </div>

    <div class="_add_new_coupon_container">
        <button class="add_new_coupon" id="add_discount_coupon">Create Coupon</button>
    </div>
    <div class="_table_container_">
        <table class="_table_is" border="1">
            <thead>
                <tr>
                    <th>S.NO #</th>
                    <th>Valid Till</th>
                    <th>Coupon Code</th>
                    <th>% Discount</th>
                    <th>Discount Upto</th>
                    <th>Reusable</th>
                    <th>User Types</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="coupons_container">





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


    <!-- pop up for add new menu -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <form action="" class="_form_to_add_coupon">


                <div class="_form_field__">
                    <label for="coupon_code" class="__label">Coupon Code</label>
                    <input type="text" class="_input_field__" id="coupon_code">
                </div>


                <div class="_form_field__">
                    <label for="coupon_discount" class="__label">% Discount</label>
                    <input type="text" class="_input_field__" id="coupon_discount">
                </div>


                <div class="_form_field__">
                    <label for="discount_upto" class="__label">Discount Upto (INR)</label>
                    <input type="text" class="_input_field__" id="discount_upto">
                </div>


                <div class="_form_field__" id="reusable">
                    <label for="reusable_times" class="__label">Usability</label>
                    <div class="_radio_btns">

                        <input type="radio" name="reusable" id="one_time" checked value="1">
                        <label for="one_time">1 Time</label>

                        <input type="radio" name="reusable" id="two_time" value="2">
                        <label for="two_time">2 Times</label>

                        <input type="radio" name="reusable" id="Infinite" value="0">
                        <label for="Infinite">Infinite</label>

                    </div>
                </div>


                <div class="_form_field__">
                    <label class="__label">User Types</label>
                    <div class="_radio_btns" id="user_types">

                        <input type="radio" name="users_types" id="new_user" value="new">
                        <label for="new_user">New</label>

                        <input type="radio" checked name="users_types" id="all_users" value="all">
                        <label for="all_users">All</label>

                    </div>
                </div>


                <div class="_form_field__">
                    <label for="exp_date" class="__label">Expire Date</label>
                    <input type="text" class="_input_field__" id="exp_date" placeholder="d MM yy" readonly="true">
                </div>


                <div class="_form_field__">
                    <button type="submit" class="_input_submit__btn" id="_input_submit__btn_">Create Offer</button>
                </div>

            </form>

            <div class="_btn_close_pop_up" id="_btn_close_pop_up"><i class="fa-solid fa-xmark"></i></div>

        </div>

    </div>
    <!-- pop up for add new menu -->



    <?php include "dashboard_footer.php"; ?>

    <script src="../static/js/jquery-ui.min.js"></script>
    <script>
    $('body').on('propertychange input', '#coupon_discount', function() {
        var inputVal = $(this).val();
        if (isNaN(Number(inputVal)) || parseInt(inputVal) > 50 || parseInt(inputVal) < 1) {
            this.value = this.hasOwnProperty("oldValue") ? this.oldValue : '';
        } else {
            this.oldValue = inputVal;
        }
    });

    $('body').on('propertychange input', '#discount_upto', function() {
        var inputVal = $(this).val();
        if (isNaN(Number(inputVal)) || parseInt(inputVal) < 1) {
            this.value = this.hasOwnProperty("oldValue") ? this.oldValue : '';
        } else {
            this.oldValue = inputVal;
        }
    });

    // validate str 
    function has_white_space(str) {
        let pattern = /\s/g;
        if (str.match(pattern)) {
            return true;
        } else {
            return false;
        }
    }
    // validate str 

    // validate str 
    function is_upper_case(str) {
        let pattern2 = new RegExp("^[A-Z]+$");
        if (str.match(pattern2)) {
            return true;
        } else {
            return false;
        }
    }
    // validate str 

    // create new coupon
    $("#_input_submit__btn_").on("click", function(e) {
        e.preventDefault();
        clearTimeout(hide_alert_timeout);
        clearTimeout(myTimeout);

        var coupon_code = $("#coupon_code").val().toUpperCase();
        var coupon_discount = $("#coupon_discount").val();
        var discount_upto = $("#discount_upto").val();
        var exp_date = $("#exp_date").val();
        var user_types = $("#user_types input:checked").val();
        var reusable = $("#reusable input:checked").val();

        if (!has_white_space(coupon_code)) {
            $("#coupon_code").css("outline-color", "#0085FF");
            $("#coupon_code").blur();


            if (coupon_code !== "") {
                $("#coupon_code").css("outline-color", "#0085FF");
                $("#coupon_code").blur();

                if (is_upper_case(coupon_code)) {
                    $("#coupon_code").css("outline-color", "#0085FF");
                    $("#coupon_code").blur();


                    if (coupon_discount !== "") {
                        $("#coupon_discount").css("outline-color", "#0085FF");
                        $("#coupon_discount").blur();

                        if (discount_upto !== "") {
                            $("#discount_upto").css("outline-color", "#0085FF");
                            $("#discount_upto").blur();


                            if (exp_date !== "") {
                                $("#exp_date").css("outline-color", "#0085FF");
                                $("#exp_date").blur();

                                // add data

                                var coupon_data = {
                                    coupon_code: coupon_code,
                                    coupon_discount: coupon_discount,
                                    discount_upto: discount_upto,
                                    exp_date: exp_date,
                                    user_types: user_types,
                                    reusable: reusable
                                };

                                // send ajax request to add coupon
                                $.ajax({
                                    url: "coupon_backend/add_coupon",
                                    type: "post",
                                    data: coupon_data,
                                    beforeSend: function() {
                                        $(this).attr("disabled", "disabled");
                                        $(this).css("opacity", "0.8");
                                        $(this).css("cursor", "not-allowed");
                                        $(this).text("Creating...");
                                    },
                                    success: function(add_coupon_response) {
                                        if (add_coupon_response == 1) {
                                            load_coupons__();
                                            $(".alert").css("background", "#04AA6D");
                                            $(".alert ._message_").html(
                                                "<strong>Success!</strong>&nbsp;Discount Offer created Successfully."
                                            );
                                            $(".alert").css("display", "flex");
                                            $(".alert").css("opacity", "1");
                                            myTimeout = setTimeout(hide_alert_auto, 4000);

                                            $("#coupon_code").val("");
                                            $("#coupon_discount").val("");
                                            $("#discount_upto").val("");
                                            $("#exp_date").val("");
                                            $("#user_types input:checked").val("");
                                            $("#reusable input:checked").val("");

                                            $("#myModal").hide();
                                        } else if (add_coupon_response == 0) {

                                            $(".alert").css("background", "#f44336")
                                            $(".alert ._message_").html(
                                                "<strong>ERROR!</strong>&nbsp; There is an error. Please try later"
                                            );
                                            $(".alert").css("display", "flex");
                                            $(".alert").css("opacity", "1");
                                            myTimeout = setTimeout(hide_alert_auto, 4000);

                                        } else {
                                            alert(add_coupon_response);
                                        }
                                        $("#_input_submit__btn_").text("Create Offer");
                                        $(this).removeAttr("disabled");
                                        $(this).css("opacity", "1");
                                        $(this).css("cursor", "pointer");
                                    }
                                });
                                // send ajax request to add coupon
                                // add data


                            } else {
                                $("#exp_date").css("outline-color", "red");
                                $("#exp_date").focus();
                            }

                        } else {
                            $("#discount_upto").css("outline-color", "red");
                            $("#discount_upto").focus();

                        }

                    } else {
                        $("#coupon_discount").css("outline-color", "red");
                        $("#coupon_discount").focus();
                    }


                } else {

                    $("#coupon_code").css("outline-color", "red");
                    $("#coupon_code").focus();


                    $(".alert").css("background", "#f44336");
                    $(".alert ._message_").html(
                        "<strong>ERROR!</strong>&nbsp; Only Uppercase letters are allowed."
                    );
                    $(".alert").css("display", "flex");
                    $(".alert").css("opacity", "1");
                    myTimeout = setTimeout(hide_alert_auto, 4000);


                }

            } else {
                $("#coupon_code").css("outline-color", "red");
                $("#coupon_code").focus();

            }





        } else {
            $("#coupon_code").css("outline-color", "red");
            $("#coupon_code").focus();


            $(".alert").css("background", "#f44336");
            $(".alert ._message_").html(
                "<strong>ERROR!</strong>&nbsp; No space is allowed in Coupon code."
            );
            $(".alert").css("display", "flex");
            $(".alert").css("opacity", "1");
            myTimeout = setTimeout(hide_alert_auto, 4000);
        }






    });
    // create new coupon




    $(function() {
        $("#exp_date").datepicker({
            dateFormat: "d MM yy",
            minDate: new Date(),
            changeMonth: true,
            changeYear: true
        });
    });

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


    // hide show model box
    $("#myModal").css("display", "flex");
    $("#myModal").hide();

    $("#_btn_close_pop_up").click(function() {
        $("#myModal").hide();
    });
    // hide show model box







    // create new coupon code 
    $("#add_discount_coupon").click(function() {
        $("#myModal").show();
    });
    // create new coupon code 

    // delete coupon
    $(document).on("click", "._user_delete_btn", function() {
        clearTimeout(hide_alert_timeout);
        clearTimeout(myTimeout);


        if (confirm(
                "This coupon code will be deleted permanently. Do you want to continue?"
            )) {
            var _user_delete_coupon_id = $(this).attr("id");

            //    request ajax to delete
            $.ajax({
                url: "coupon_backend/delete_coupon",
                type: "post",
                data: {
                    _user_delete_coupon_id: _user_delete_coupon_id
                },
                beforeSend: function() {
                    $(this).attr("disabled", "disabled");
                    $(this).css("opacity", "0.8");
                    $(this).css("cursor", "not-allowed");
                },
                success: function(delete_coupon_response) {
                    if (delete_coupon_response == 1) {
                        load_coupons__();
                        $(".alert").css("background", "#04AA6D");
                        $(".alert ._message_").html(
                            "<strong>Success!</strong>&nbsp;Coupon deleted Successfully."
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
    });
    // delete menu





    // load coupons using ajax
    function load_coupons__() {
        $.ajax({
            url: "coupon_backend/load_coupon",
            type: "post",
            success: function(load_coupons_response) {
                $("#coupons_container").html(load_coupons_response);
            }
        });
    }

    load_coupons__();
    // load coupons using ajax
    </script>
</body>

</html>