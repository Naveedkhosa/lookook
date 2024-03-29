<?php
include "config.php";
include "inc/global_functions.php";
if (isset($_SESSION['logged_user_id'])) {
    header("Location:home");
}
$signup_reward =  getUserOption("signup_reward");
$referee_earn =  getUserOption("referee_earn");
if (isset($_GET['refer'])) {
    $refer_code = $_GET['refer'];
    $sql = "SELECT * FROM users WHERE refer_code = '{$refer_code}'";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['refer'] =  $row['user_id'];
        } else {
            $_SESSION['refer'] = NULL;
        }
    } else {
        $_SESSION['refer'] = NULL;
    }
} else {
    $_SESSION['refer'] = NULL;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Signup / Login | Look My Cook</title>
    <link rel="stylesheet" href="components/css/style.css" />
    <link rel="stylesheet" href="components/css/style_pop_up.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="components/css/footer.css">

    <!-- alertify js -->
    <link rel="stylesheet" href="libs/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="libs/alertifyjs/css/themes/default.css">
</head>

<body>

<div class="login_body">
    
    <button class="back-button bg" onclick="history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512" fill="#fff">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
        </svg>
        Signup | Login
    </button>
     <div class="logi_content">
           
    <div class="_from_container_">
        <div class="_form_">
        <div class="_form_title" style="display: flex; flex-direction: column;">
                   <div class="logo">
                    Signup | Login
                  </div>
                  <div class="logo" style="font-size: 16px; font-weight: bold; margin-top: 7px;">
                    GET &nbsp; <b class="malta"> &#8377; 250 </b> &nbsp; FREE CASH ON SIGNUP
                  </div>
              </div>
            <div class="_form_content">

                        <div class="_form_field">
                            <div class="label_field">
                                <label>Mobile Number</label>
                            </div>
                            <input type="test" maxlength="10" name="contacts" required="" id="contacts" placeholder="10 digit number">
                            <div class="_change_number"><span id="change_num">change Number ?</span></div>

                        </div>

                <div class="_form_field">
                    <label>OTP</label>
                    <div class="_input_container">
                        <input type="text" name="number" id="otp" placeholder="xxxxxx" maxlength="6">
                        <div class="_timer" id="_timer">0</div>
                    </div>
                    <div class="_send_otp_btn">
                        <div id="responseMsg"></div>
                        <button class="_otp_btn" id="_otp_btn_again" style="visibility: hidden;">
                            Send Again
                        </button>
                    </div>
                </div>
               <?php
                echo '<input type="hidden" id="location" value="';
                if(isset($_GET['location'])) {
                    echo htmlspecialchars($_GET['location']);
                }
                echo '" />';
               ?>
             <br>

                <button type="submit" id="_proceed_btn" class="_proceed_btn">
                    Sign In | Sign Up
                </button>
                <div class="_agree_box">
                <p>
                  By continuing, you agree to  <a target="_blank" href="terms-and-conditions">Terms of Service & Privacy Policy</a>
                </p>
            </div>
            </div>

        </div>
    </div>
    <!-- sign section end here  -->
    </div>

    <!-- bottom nav include -->
    <?php include "inc/bottom_nav.php"; ?>

                <!-- include scripts -->
                <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
                <script src="static/js/jquery.js"></script>
                <script src="libs/alertifyjs/alertify.min.js"></script>
                <script src="static/js/login.js"></script>
</body>
</html>