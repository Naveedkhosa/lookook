<?php include "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services fee| Look My Cook</title>

    <!-- css link -->


    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/taxes.css">
    <link rel="stylesheet" href="css/alert_box.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff;
    }

    h1 {
        font-size: 18px !important;
        color: gray;
        margin: 10px 0px !important;
        background: #f2f2f2;
        padding: 10px;
    }

    .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px 10px;
        background-color: #fff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        white-space: nowrap;
    }

    th,
    td {
        padding: 10px;
        text-align: start;
        border-top: 1px solid #c3c3c3;
    }

    tr th {
        border: none;
        font-size: 14px !important;
    }

    tr td,
    tr td input {
        color: #444;
    }

    tr td:nth-child(2),
    tr th:nth-child(2) {
        text-align: center;
        width: 100px;
    }



    input[type="number"] {
        width: 80px;
        border: none;
        text-align: center;
        font-size: 16px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }


    button[type="submit"] {
        display: block;
        padding: 8px 16px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
    }

    button[type="submit"]:hover {
        background-color: #3e8e41;

    }

    .container .chrages_heading {
        color: #4CAF50;
        font-size: 22px;
        font-weight: bold;
        margin: 20px 0px;

    }

    ._fee_container {
        display: flex;
        align-items: center;
    }

    ._fee_container input[type='number'] {
        width: calc(100% - 80px);
        padding: 7px 10px;
        border: none;
        outline: none;
        border: 1px solid #c5c5c5;
        border-radius: 3px 0px 0px 3px;
        text-align: start;
        font-size: 14px;
    }

    ._fee_container ._btn_update {
        width: 80px;
        padding: 7px 0px;
        background: green;
        border-radius: 0px 3px 3px 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
    }
    
   
    </style>

</head>

<body>


    <?php include "dashboard_header.php"; ?>
    
    
    

    <!-- #waiter fee -->
    <div class="container">
        <h1 class="chrages_heading">Waiter Fee</h1>
        <div class="_fee_container">
            <input type="number" name="waiter_fee" id="waiter_fee" placeholder="Waiter Service Fee" min="0">
            <div class="_btn_update" id="waiter_btn_update">Update</div>
        </div>
    </div>
    <!-- #waiter fee -->

    <!-- #cleaner fee -->
    <div class="container">
        <h1 class="chrages_heading">Cleaner Fee</h1>
        <div class="_fee_container">
            <input type="number" name="cleaner_fee" id="cleaner_fee" placeholder="Cleaner Service Fee" min="0">
            <div class="_btn_update" id="cleaner_btn_update">Update</div>
        </div>
    </div>
    <!-- #cleaner fee -->


    <div class="container">
        <!-- #chef fee -->
        <h1 class="chrages_heading">Chef Fee</h1>
        <form action="update_prices.php" method="post">

            <table>
                <thead>
                    <tr>
                        <th>Group Size Range</th>
                        <th>Pricing (INR)</th>
                    </tr>
                </thead>
                <tbody id="chef_charges_container">

                </tbody>
            </table>
        </form>
        <!-- #chef fee -->

        <!-- #Bartender fee -->
        <h1 class="chrages_heading"> Bartender Fee</h1>
        <form action="update_prices.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Group Size Range</th>
                        <th>Pricing (INR)</th>
                    </tr>
                </thead>
                <tbody id="bartender_fee_container">

                </tbody>
            </table>

        </form>
        <!-- #Bartender fee -->

    </div>

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


        // @load functions /



        function load_waiter_charges() {
            $.ajax({
                url: "charges_handling/waiter_fee",
                type: "post",
                data: {
                    s_id: 4
                },
                success: function(waiter_resp) {
                    if (waiter_resp != 0) {
                        $("#waiter_fee").val(waiter_resp);
                        $("#waiter_fee").attr("data-sid", 4);
                    }
                }
            });
        }

        function load_cleaner_charges() {
            $.ajax({
                url: "charges_handling/cleaner_fee",
                type: "post",
                data: {
                    s_id: 3
                },
                success: function(cleaner_resp) {
                    if (cleaner_resp != 0) {
                        $("#cleaner_fee").val(cleaner_resp);
                        $("#cleaner_fee").attr("data-sid", 3);
                    }
                }
            });
        }



        function load_chef_charges() {
            $.ajax({
                url: "charges_handling/chef_fee",
                type: "post",
                data: {
                    chef_charges: "chef_charges",
                    s_id: 1
                },
                success: function(chef_resp) {
                    $("#chef_charges_container").html(chef_resp);
                }
            });
        }

        function load_bartender_charges() {
            $.ajax({
                url: "charges_handling/bartender_fee",
                type: "post",
                data: {
                    chef_charges: "chef_charges",
                    s_id: 2
                },
                success: function(chef_resp) {
                    $("#bartender_fee_container").html(chef_resp);
                }
            });
        }

        load_waiter_charges();
        load_cleaner_charges();
        load_chef_charges();
        load_bartender_charges();

        // @load functions /

        // @update waiter + cleaner fees 
        $("#waiter_btn_update").on("click", function() {
            var w_fee = $("#waiter_fee").val();
            var w_id = $("#waiter_fee").attr("data-sid");

            if (w_fee >= 0) {
                $("#waiter_fee").css("border", "1px solid #c5c5c5");
                $("#waiter_fee").blur();

                // @ajax request
                $.ajax({
                    url: "charges_handling/update_cleaner_fee",
                    type: "post",
                    data: {
                        fee:w_fee,
                        id:w_id,
                    },
                    beforeSend: function() {
                        $(this).text("Updating...");
                    },
                    success: function(update_resp) {
                        if (update_resp == 1) {
                            alert("Prices updated successfully");
                            load_waiter_charges();
                        } else {
                            alert(update_resp);
                        }
                        $(this).text("Update");
                    }
                });
                // @ajax request


            } else {
                $("#waiter_fee").css("border", "1px solid red");
                $("#waiter_fee").focus();
            }

        });


        $("#cleaner_btn_update").on("click", function() {
            var c_fee = $("#cleaner_fee").val();
            var c_id = $("#cleaner_fee").attr("data-sid");

            if (c_fee >= 0) {
                $("#cleaner_fee").css("border", "1px solid #c5c5c5");
                $("#cleaner_fee").blur();

                // @ajax request
                $.ajax({
                    url: "charges_handling/update_cleaner_fee",
                    type: "post",
                    data: {
                        fee:c_fee,
                        id:c_id,
                    },
                    beforeSend: function() {
                        $(this).text("Updating...");
                    },
                    success: function(update_resp) {
                        if (update_resp == 1) {
                            alert("Prices updated successfully");
                            load_cleaner_charges();
                        } else {
                            alert(update_resp);
                        }
                        $(this).text("Update");
                    }
                });
                // @ajax request

            } else {
                $("#cleaner_fee").css("border", "1px solid red");
                $("#cleaner_fee").focus();
            }

        });
        // @update waiter + cleaner fees 



        // @update update_chef_fee
        $(document).on("click", "#update_chef_fee", function(e) {
            e.preventDefault();
            var keys = "";
            var values = "";
            var elem = $(".chef_fees");
            var st = true;
            elem.each(function(elm) {
                var key = $(this).attr("data-sid");
                var vall = parseInt($(this).children("td").children("input[type='number']")
                    .val());
                if (vall >= 0) {
                    $(this).children("td").children("input[type='number']").css("border",
                        "1px solid #c5c5c5");
                    keys += key + ",";
                    values += vall + ",";
                } else {
                    $(this).children("td").children("input[type='number']").css("border",
                        "1px solid red");
                    $(this).children("td").children("input[type='number']").focus();
                    st = false;
                    return;
                }

            });

            if (st == true) {
                $.ajax({
                    url: "charges_handling/update_chef_fee",
                    type: "post",
                    data: {
                        keys: keys,
                        values: values
                    },
                    beforeSend: function() {
                        $(this).text("Updating prices");
                    },
                    success: function(update_resp) {
                        if (update_resp == 1) {
                            alert("Prices updated successfully");
                            load_chef_charges();
                        } else {
                            alert(update_resp);
                        }
                        $(this).text("Update prices");
                    }
                });
            }

        });
        // @update update_chef_fee


        // @update update_bartedner_fee
        $(document).on("click", "#update_bartender_fee", function(e) {
            e.preventDefault();
            var keys1 = "";
            var values1 = "";
            var elem1 = $(".bartender_fees");
            var st1 = true;
            elem1.each(function(elm) {
                var key1 = $(this).attr("data-sid");
                var vall1 = parseInt($(this).children("td").children("input[type='number']")
                    .val());
                if (vall1 >= 0) {
                    $(this).children("td").children("input[type='number']").css("border",
                        "1px solid #c5c5c5");
                    keys1 += key1 + ",";
                    values1 += vall1 + ",";
                } else {
                    $(this).children("td").children("input[type='number']").css("border",
                        "1px solid red");
                    $(this).children("td").children("input[type='number']").focus();
                    st1 = false;
                    return;
                }

            });

            if (st1 == true) {
                $.ajax({
                    url: "charges_handling/update_bartender_fee",
                    type: "post",
                    data: {
                        keys: keys1,
                        values: values1
                    },
                    beforeSend: function() {
                        $(this).text("Updating prices");
                    },
                    success: function(update_resp) {
                        if (update_resp == 1) {
                            alert("Prices updated successfully");
                            load_bartender_charges();
                        } else {
                            alert(update_resp);
                        }
                        $(this).text("Update prices");
                    }
                });
            }

        });
        // @update update_bartedner_fee

    });
    </script>
</body>

</html>