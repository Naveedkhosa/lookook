<?php
require('config.php'); // payment config
require('../config.php'); // database config
require('../vendors/razorpay-php/Razorpay.php');

session_start();
use Razorpay\Api\Api;
$api = new Api(TEST_API_KEY, TEST_SECRET_KEY);
$amount = 10;
$api->order->create(
    array(
        'amount' => $amount*100,
        'currency' => 'INR',
    )
);
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

$data = array(
    "key"               => TEST_API_KEY,
    "amount"            => $amount,
    "currency"            => "INR",
    "name"              => "LookMyCook",
    "image" => "https://lookmycook.com/favicon-32x32.png",
    "prefill"           => [
        "contact"           => $logged_in_user_number,
    ],
    "notes"             => [
        "address"           => "",
    ],
    "theme"             => [],
    "order_id"          => $razorpayOrderId,
);

$data = json_encode($data);

?>

<button id="rzp-button1" class="btn btn-primary">Pay with Razorpay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>
<script>
    var options = <?php echo $json_data ?>;
    options.handler = function(response) {
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };
    options.theme.image_padding = false;
    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
        },
        escape: true,
        backdropclose: false
    };
    var rzp = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e) {
        rzp.open();
        e.preventDefault();
    }
</script>