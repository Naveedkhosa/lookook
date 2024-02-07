<?php
include "../config.php";
include "../inc/global_functions.php";
set_time_limit(0);

$result = array(
    "success" => false,
    "msg" => "Something went wrong please try again"
);

function stringEncryption($action, $string)
{
    $output = false;

    $encrypt_method = 'AES-256-CBC';                // Default
    $secret_key = 'k_skhan#ali4541!';               // Change the key!
    $secret_iv = '!IV@_$2';  // Change the init vector!

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

if (isset($_POST['contact']) && isset($_POST['otp'])) {

    $contact = $_POST['contact'];
    $otp = $_POST['otp'];
    $encrypted_otp = stringEncryption('encrypt', $otp);
    $check_if_ = "SELECT * FROM otp WHERE contact='{$contact}' AND otp_status ='never_used' AND NOW() < DATE_ADD(otp_created, INTERVAL 5 DAY_MINUTE) AND otp_code='{$encrypted_otp}';";

    if ($check_if_result = mysqli_query($conn, $check_if_)) {
        if (mysqli_num_rows($check_if_result) > 0) {
            $check_if_result_row = mysqli_fetch_assoc($check_if_result);
            $update_otp = "UPDATE otp SET otp_status = 'used' WHERE otp_id = {$check_if_result_row['otp_id']};";

            mysqli_query($conn, $update_otp);

            $check_user = "SELECT `user_id` FROM `users` WHERE `user_original_number` = {$contact};";
            if ($check_user_result = mysqli_query($conn, $check_user)) {
                if (mysqli_num_rows($check_user_result) > 0) {
                    $row_result = mysqli_fetch_assoc($check_user_result);
                    // sign in
                    $_SESSION['logged_user_id'] = $row_result['user_id'];
                    if (isset($_SESSION['logged_user_id'])) {
                        $result['success'] = true;
                        $result['msg'] = "Logged in successfully.";
                    }
                } else {
                    // sign up
                    
                    // if being referred
                    if (isset($_SESSION['refer']) && $_SESSION['refer'] != NULL) {
                        $referee_earn =  getUserOption("referee_earn");
                        $add_new_user = "INSERT INTO `users`(`user_original_number`,`joined_on`,`wallet_balance`,`referred_by`) VALUES ({$contact},NOW(),{$referee_earn},{$_SESSION['refer']})";
                    } else {
                        $signup_reward =  getUserOption("signup_reward");
                        $add_new_user = "INSERT INTO `users`(`user_original_number`,`joined_on`,`wallet_balance`) VALUES ({$contact},NOW(),{$signup_reward})";
                    }

                    if (mysqli_query($conn, $add_new_user)) {
                        $inserted_id = mysqli_insert_id($conn);
                        $refer_code = uniqid() . $inserted_id;

                        $referCodeUpdate = "UPDATE users SET refer_code='{$refer_code}' WHERE user_id={$inserted_id}";

                        if (mysqli_query($conn, $referCodeUpdate)) {

                            $_SESSION['logged_user_id'] = $inserted_id;

                            if (isset($_SESSION['logged_user_id'])) {
                                $result['success'] = true;
                                $result['msg'] = "Logged in successfully. Thank you for creating account with us";
                            }
                        }
                    }
                }
            } else {
                die(json_encode($result));
            }
        } else {
            $result['success'] = false;
            $result['msg'] = "Either your OTP has expired or it does not match";
        }
    }

    die(json_encode($result));
} else {
    die(json_encode($result));
}
