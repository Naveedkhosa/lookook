<?php
require('../config.php');
require('../vendors/razorpay-php/Razorpay.php');
define('API_KEY', "rzp_live_4n0Eihnsd3CgNy");
define('SECRET_KEY', "l9nmcwM1UKW06H5lvWKPC3my");

use Razorpay\Api\Api;
$api = new Api(API_KEY, SECRET_KEY);

$resp = $api->utility->verifyPaymentSignature(
    array('razorpay_order_id' => $_SESSION['razorpay_order_id'],
     'razorpay_payment_id' => $_POST['razorpay_payment_id'],
      'razorpay_signature' => $_POST['razorpay_signature'])
);


print_r($resp);
