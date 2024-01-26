<?php
include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings | Look My Cook</title>

    <!-- css link -->


    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bookings.css">
    <link rel="stylesheet" href="css/alert_box.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .resister{
                position: fixed;
                top: 0px;
                left: 0px;
                background: rgba(0,0,0,0.2);
                width: 100%;
                height: 100%;
                z-index: 1003;
                display: none;
            }
        </style>

</head>

<body>


    <?php include "dashboard_header.php"; ?>


   <div class="resister"></div>

    <!-- CONTENT -->
    <div class="filter">
        <input type="search"  id="search_booking" placeholder="Search Booking">
        <select id="filter">
            <option value="all">Filter</option>
            <option value="current">Confirmed</option>
            <option value="pending">Pending</option>
            <option value="cancelled">Cancelled</option>
            <option value="completed">Completed</option>
            <option value="cart">Cart</option>
            <option value="failed">Failed</option>
        </select>
    </div>

    <div class="bookings"></div>
    <!-- CONTENT -->



    <!-- alert box -->
    <div class="alert">
        <div class="_message_"></div>
        <span class="closebtn">&times;</span>
    </div>
    <!-- alert box -->


    <?php include "dashboard_footer.php"; ?>
    <script>
    $(document).ready(function() {

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




    });


    // @load bookings
    function _load_bookings(booking_type1,search_item) {
        $.ajax({
            url: "booking_handling/load_bookings",
            type: "post",
            data: {
                booking_type: booking_type1,
                search_item:search_item
            },
            success: function(resp) {
                
                    $(".bookings").html(resp);
                
            }
        });
    }

    _load_bookings("all",$("#search_booking").val());

    $("#filter").on("change", function() {
        _load_bookings($(this).val(),$("#search_booking").val());
    });
    // @load bookings

    // @delete booking
    $(document).on("click", "._delete_booking", function() {
        var b_id_d = $(this).attr("data-bid");
        if (confirm("Are you sure, The booking will be deleted permanently.")) {
            $.ajax({
                url: "booking_handling/delete_booking",
                type: "post",
                data: {
                    b_id: b_id_d
                },
                beforeSend: function() {
                  $(".resister").css("display","flex");
                },
                success: function(deleteResp) {
                    $(".resister").css("display","none");
                    if (deleteResp == 1) {
                        alert("Booking has been deleted successfully.");
                        _load_bookings($("#filter").val(),$("#search_booking").val());
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                }

            });
        }
    });
    // @delete booking

    // @complete booking
    $(document).on("click", "._complete_booking", function() {
        var b_id_c = $(this).attr("data-bid");
        if (confirm("Are you sure that booking has been served Successfully")) {
            $.ajax({
                url: "booking_handling/complete_booking",
                type: "post",
                data: {
                    b_id: b_id_c
                },
                beforeSend: function() {
                    $(".resister").css("display","flex");
                },
                success: function(completeResp) {
                    $(".resister").css("display","none");
                    if (completeResp == 1) {
                        alert("Booking has been completed successfully.");
                        _load_bookings($("#filter").val(),$("#search_booking").val());
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                }

            });
        }
    });
    // @complete booking

    $("#search_booking").on("keyup",function() {
        var search_terms = $(this).val();
        var type_is = $("#filter").val();

        _load_bookings(type_is,search_terms);
    });

    // @cancel booking
    $(document).on("click", "._cancel_booking", function() {
        var b_id_cancel = $(this).attr("data-bid");
        if (confirm("Are you sure to cancel the booking?")) {
            alert("booking has been cancelled successfully");
        }
    });
    // @cancel booking
    </script>
</body>

</html>