<?php
require('../config.php');
require('../vendors/razorpay-php/Razorpay.php');
define('API_KEY', "rzp_live_4n0Eihnsd3CgNy");
define('SECRET_KEY', "l9nmcwM1UKW06H5lvWKPC3my");

session_start();

use Razorpay\Api\Api;

$api = new Api(API_KEY, SECRET_KEY);
$api->order->create(
    array(
        'receipt' => '1234567',
        'amount' => 100,
        'currency' => 'INR',
        'notes' => array(
            'description' => 'Payment status',
        )
    )
);
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

$data = array(
    "key"               => API_KEY,
    "amount"            => $amount,
    "currency"            => "INR",
    "name"              => "LookMyCook",
    "prefill"           => [
        "contact"           => "7428939324",
    ],
    "notes"             => [
        "address"           => "",
    ],
    "theme"             => [
        "color"             => "#f29a03"
    ],
    "order_id"          => $razorpayOrderId,
);


echo json_encode($data);

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