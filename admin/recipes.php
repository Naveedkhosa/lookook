<?php 
include "../config.php"; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes | Look My Cook</title>

    <!-- css link -->


    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/appliances.css">
    <link rel="stylesheet" href="css/alert_box.css">
    <link rel="stylesheet" href="css/model_box.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <?php include "dashboard_header.php"; ?>



    <!-- content -->

    <div class="_appliance_add_btn">
        <div class="_add_appliance" id="add_appliance_btn">Add New Recipe</div>
    </div>
    <div class="container_cards" id="Appliances_data_body">






    </div>

    <!-- content -->



    <!-- CONTENT -->



    <!-- pop up for add new menu -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="container">
                <form id="form__" enctype="multipart/form-data">
                    <label for="appliance_name">Recipe Name:</label>
                    <input type="text" id="recipe_name" name="recipe_name" required>

                   

                    <button type="submit" name="submit" id="upload_appliance_data">Add</button>
                </form>
            </div>

            <div class="_btn_close_pop_up" id="_btn_close_pop_up"><i class="fa-solid fa-xmark"></i></div>
        </div>

    </div>
    <!-- pop up for add new menu -->


    <!-- alert box -->
    <div class="alert">
        <div class="_message_"></div>
        <span class="closebtn">&times;</span>
    </div>
    <!-- alert box -->


    <?php include "dashboard_footer.php"; ?>

    <script>
    // update tax

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


        // hide - show popup/model box

        $("#myModal").css("display", "flex");
        $("#myModal").hide();

        $("#_btn_close_pop_up").click(function() {
            $("#myModal").hide();
        });
        // hide - show popup/model box

        $("#add_appliance_btn").click(function() {
            $("#myModal").show();
        });


        // load appliances
        function __load_appliances() {
            $.ajax({
                url: 'recipe_backend/load_recipes',
                type: 'POST',
                success: function(loaded_data) {
                    $("#Appliances_data_body").html(loaded_data);
                }
            });

        }
        __load_appliances();
        // load appliances


        $('#form__').submit(function(event) {
            event.preventDefault();



            // var imgname = $('#recipe_image').val();
            // var size = $('#recipe_image')[0].files[0].size;

            // var ext = imgname.substr((imgname.lastIndexOf('.') + 1));


            

                    $.ajax({
                        type: 'POST',
                        url: 'recipe_backend/upload_recipes',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(res) {
                            if (res == 1) {
                                $(".alert").css("background", "#04AA6D");
                                $(".alert ._message_").html(
                                    "<strong>Success!</strong>&nbsp;Recipe added Successfully."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);

                            
                                $('#appliance_name').val("");

                                $("#myModal").hide();
                                __load_appliances();

                            } else if (res == 0) {

                                $(".alert").css("background", "#f44336")
                                $(".alert ._message_").html(
                                    "<strong>ERROR!</strong>&nbsp;There is an error. Please try later."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);

                            } else if (res == "dup") {
                                $(".alert").css("background", "#f44336")
                                $(".alert ._message_").html(
                                    "<strong>ERROR!</strong>&nbsp;Recipe with this name already exist"
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);
                                $('#appliance_name').focus();
                            } else {
                                alert(res);
                            }
                        }
                    });


                


        });



        // @delete appliance
        $(document).on("click", "._delete_btn", function() {
            var id = $(this).attr("data-id");
            clearTimeout(myTimeout);
            clearTimeout(hide_alert_timeout);


            $.ajax({
                type: 'POST',
                url: 'recipe_backend/delete_recipe',
                data: {
                    id: id
                },
                success: function(resp) {
                    if (resp == 1) {
                        $(".alert").css("background", "#04AA6D");
                        $(".alert ._message_").html(
                            "<strong>Success!</strong>&nbsp;Appliance deleted Successfully."
                        );
                        $(".alert").css("display", "flex");
                        $(".alert").css("opacity", "1");
                        myTimeout = setTimeout(hide_alert_auto, 4000);
                        __load_appliances();
                    } else {
                        // $(".alert").css("background", "#f44336")
                        // $(".alert ._message_").html(
                        //     "<strong>ERROR!</strong>&nbsp;Something went wrong, please try again later' ."
                        // );
                        // $(".alert").css("display", "flex");
                        // $(".alert").css("opacity", "1");
                        // myTimeout = setTimeout(hide_alert_auto, 4000);
                        alert(resp);
                    }
                }
            });

        });
        // @delete appliance

    });
    </script>
</body>

</html>