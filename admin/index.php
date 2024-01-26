<?php 
include "../config.php";
if(isset($_SESSION['admin_id'])){
    header("Location:dashboard");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin | lookmycook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/sign_in.css">
</head>

<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="index" autocomplete="off">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" id="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="psw" required>

            <!-- <div class="psw"><a href="#">Forgot password?</a></div> -->

            <button type="submit" id="login_btn">Login</button>
        </form>
    </div>



    <!-- partial -->


    <script src="../static/js/jquery.js"></script>
    <script>
    $(document).ready(function() {
        $("#login_btn").click(function(e) {
            e.preventDefault();

            var email = $("#email").val();
            var password = $("#psw").val();

            if (email == "") {
                $("#email").css("outline-color", "red");
                $("#email").focus();
            } else {
                $("#email").css("outline-color", "#c5c5c5");
                $("#email").blur();

                if (password == "") {
                    $("#psw").css("outline-color", "red");
                    $("#psw").focus();
                } else {
                    $("#psw").css("outline-color", "#c5c5c5");
                    $("#psw").blur();

                    $.ajax({
                        url: "admin_login/login",
                        type: "post",
                        data: {
                            email: email,
                            password: password
                        },
                        beforeSend: function() {
                            $("#login_btn").attr("disabled", "disabled");
                            $("#login_btn").css("cursor", "not-allowed");
                            $("#login_btn").html("Authenticating..");
                        },
                        success: function(response) {
                            $("#login_btn").removeAttr("disabled");
                            $("#login_btn").css("cursor", "pointer");
                            $("#login_btn").text("Login");

                            if (response == 0) {
                                $("#email").focus();
                                alert(
                                    "Your email or password is incorrect. Please try again"
                                );
                            } else if (response == 1) {
                                window.location.href="dashboard";
                            } else {
                                alert(
                                   response
                                );
                            }

                        }

                    });

                }
            }

        });


    });
    </script>

</body>

</html>