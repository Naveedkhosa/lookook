<?php
include "../config.php";
set_time_limit(0);
$result = array(
    "success"=>false,
    "msg"=>"Contact number is required to receive OTP"
);

function generateNumericOTP($n)
{

    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand() % (strlen($generator))), 1);
    }
    // Return result
    return $result;
}

function stringEncryption($action, $string)
{
    $output = false;

    $encrypt_method = 'AES-256-CBC'; // Default
    $secret_key = 'k_skhan#ali4541!'; // Change the key!
    $secret_iv = '!IV@_$2'; // Change the init vector!

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

if (isset($_POST['cn'])) {
    $cn = $_POST['cn'];
    $otp_length = 6;
    $otp = generateNumericOTP($otp_length);

    // $cURLConnection = curl_init();
    // $url_is = 'http://softsms.in/app/smsapi/index.php?key=6427ee1964213&type=text&contacts=' . $cn . '&senderid=LKCOOK&peid=1201166400223088666&templateid=1207167930631870689&msg=' . $otp . '+is+your+OTP+to+login+to+Look+My+Cook.+Valid+for+5+Minutes.+Do+not+share+it+with+anyone.+SMS+Service';

    // curl_setopt($cURLConnection, CURLOPT_URL, $url_is);
    // curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $phoneList = "not_empty";
    // $phoneList = curl_exec($cURLConnection);
    // curl_close($cURLConnection);


    // $jsonArrayResponse = json_decode($phoneList);

  

    $encrypted_otp = stringEncryption('encrypt', $otp);

    //   $decrypted = stringEncryption('decrypt', $encrypted);


    $check_if_exist = "SELECT * FROM otp WHERE contact='{$cn}' AND otp_status ='never_used' AND NOW() < DATE_ADD(otp_created, INTERVAL 5 DAY_MINUTE);";

    if (!empty($phoneList)) {
        if ($check_result = mysqli_query($conn, $check_if_exist)) {
            if (mysqli_num_rows($check_result) == 1) {
                $otp_id = mysqli_fetch_assoc($check_result)['otp_id'];
                $update_otp = "UPDATE otp SET otp_status='resended' WHERE otp_id={$otp_id};";
                mysqli_query($conn, $update_otp);
            }
            $otp_insert = "INSERT INTO `otp`(`otp_code`, `contact`, `otp_created`, `otp_status`) VALUES ('{$encrypted_otp}','{$cn}',NOW(),'never_used');";

            if (mysqli_query($conn, $otp_insert)) {
                $result['msg'] ="OTP sent successfully. ".$otp;
                $result['timer'] = 60;
                $result['success'] = true;
            } else {
                $result['msg'] ="Something went wrong, Please try again later";
                $result['success'] = false;
            }

        } else {
            $result['msg'] ="Something went wrong, Please try again later";
            $result['success'] = false;
        }
    } else {
       $result['msg'] ="Something went wrong, Please try again later";
       $result['success'] = false;
    }

    die(json_encode($result));

} else {
    die(json_encode($result));
}
