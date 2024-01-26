<?php 
include "../config.php"; 

$gst_tax = 0;
$gst_tax_id = 0;
$taxes_query_ = "SELECT * FROM `tax` WHERE tax_name ='GST';";
if($taxes_query_result = mysqli_query($conn,$taxes_query_)){
if(mysqli_num_rows($taxes_query_result) > 0){
   $row = mysqli_fetch_assoc($taxes_query_result);

   $gst_tax = $row['tax_percentage'];
   $gst_tax_id = $row['tax_id'];

}
}else{
    die("Some issue has occured.Please report.");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Setting| Look My Cook</title>

    <!-- css link -->


    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/taxes.css">
    <link rel="stylesheet" href="css/alert_box.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <?php include "dashboard_header.php"; ?>

    <div class="_tax_container">
        <label>GST</label>
        <div class="_input">
            <div class="percentage">%</div>
            <input type="text" class="_input_tax" id="gst__" value="<?php echo $gst_tax; ?>">
            <button id="update_tax" data-t__="<?php echo $gst_tax_id; ?>">Update</button>
        </div>
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




        $(document).on("click", "#update_tax", function() {

            clearTimeout(hide_alert_timeout);
            clearTimeout(myTimeout);

            var gst___ = $("#gst__").val();
            var ____ = $(this).data("t__");

            if (gst___ >= 0 && !isNaN(Number(gst___)) && gst___ <= 100 && gst___ !== "") {

                $("#gst__").parent().css("border", "1px solid #123668");
                $("#gst__").blur();

                $.ajax({
                    url: "tax_backend/update_tax",
                    type: "post",
                    data: {
                        ____: ____,
                        gst___: gst___
                    },
                    success: function(response_tax) {
                        if (response_tax == 1) {

                            $(".alert").css("background", "#04AA6D");
                            $(".alert ._message_").html(
                                "<strong>Success!</strong>&nbsp;Tax updated Successfully."
                            );
                            $(".alert").css("display", "flex");
                            $(".alert").css("opacity", "1");
                            myTimeout = setTimeout(hide_alert_auto, 4000);


                        } else if (response_tax == 0) {
                            $(".alert").css("background", "#f44336")
                            $(".alert ._message_").html(
                                "<strong>ERROR!</strong>&nbsp; There is an error. Please try later"
                            );
                            $(".alert").css("display", "flex");
                            $(".alert").css("opacity", "1");
                            myTimeout = setTimeout(hide_alert_auto, 4000);
                        } else {
                            alert(response_tax);
                        }
                    }
                });

            } else {
                $("#gst__").parent().css("border", "1px solid red");
                $("#gst__").focus();
            }




        });
    });

    // update tax
    </script>
</body>

</html>