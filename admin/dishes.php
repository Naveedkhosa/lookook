<?php 
include "../config.php"; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dishes | Look My Cook</title>

    <!-- css link -->


    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/dishes.css">
    <link rel="stylesheet" href="css/alert_box.css">
    <link rel="stylesheet" href="css/model_box.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <?php include "dashboard_header.php"; ?>


    <!-- CONTENT -->

    <div class="_appliance_add_btn">
        <a class="_add_appliance" id="add_appliance_btn" href='add-dish.php'>Add New Dish</a>
    </div>

    <div class="_container__" id="dishes_data_body">


    </div>




    <!-- CONTENT -->






    <!-- alert box -->
    <div class="alert">
        <div class="_message_"></div>
        <span class="closebtn">&times;</span>
    </div>
    <!-- alert box -->
    
      <!-- overlay -->
    <div class="over_lay"
        style="display:none;position: fixed; top: 0px;left: 0px;width: 100%;height: 100%;background: rgba(0,0,0,0.2);z-index: 100000;"
        id="overlay"></div>



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




        // #load dishes
        function __load_dishes() {
            $.ajax({
                url: 'dishes_backend/load_dishes',
                type: 'POST',
                success: function(loaded_data) {
                    $("#dishes_data_body").html(loaded_data);
                }
            });

        }
        __load_dishes();
        // #load dishes

        // #delete dishes 
        $(document).on("click", ".delete-dish", function() {
            var d_id = $(this).attr("data-dishId");
            $.ajax({
                url: 'dishes_backend/delete_dishes',
                type: 'POST',
                data: {
                    id: d_id
                },
                beforeSend:function(){
                    $("#overlay").css("display","flex");
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp == 1) {
                        $(".alert").css("background", "#04AA6D")
                        $(".alert ._message_").html(
                            "<strong>Success!</strong>&nbsp;Dish Deleted Successfully."
                        );
                        $(".alert").css("display", "flex");
                        $(".alert").css("opacity", "1");
                        myTimeout = setTimeout(hide_alert_auto, 4000);
                        __load_dishes();
                    } else {
                        $(".alert").css("background", "#f44336");
                        $(".alert ._message_").html(
                            "<strong>ERROR!</strong>&nbsp; Something went wrong. Please try again later"
                        );
                        $(".alert").css("display", "flex");
                        $(".alert").css("opacity", "1");
                        myTimeout = setTimeout(hide_alert_auto, 4000);
                    }
                    
                    $("#overlay").css("display","none");
                }
            });
        });
        // #delete dishes 


    });
    </script>
</body>

</html>