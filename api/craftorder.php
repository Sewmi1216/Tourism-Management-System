<?php
include "stripeconfig.php";
include '../controller/orderController.php';
include '../controller/touristController.php';


session_start();
$touristID = $_POST['tid'];
// $productId = $_POST['pid'];
$total = $_POST['total'];

$cname = $_POST['cname'];
$cphone = $_POST['cphone'];
$caddress = $_POST['caddress'];

$quantities = array();
foreach ($_POST as $key => $value) {
    if (strpos($key, 'hiddenQty') === 0) {
        $productID = substr($key, strlen('hiddenQty'));
        $quantity = $_POST[$key];
        $quantities[$productID] = $quantity;
    }
}

// $quantity = $_POST['hiddenQty'];
// echo '<script>';
// echo 'console.log(' . json_encode($quantities) . ');';
// echo '</script>';

$pdd = $_SESSION['pid'];
$value = array_combine($pdd, $quantities);

// foreach ($value as $proId => $val) {
//     $order = new orderController();
//     $order->insertCraftOrder($touristID, $proId, $val, $cname, $cphone, $caddress);
// }
$craftOrder = new orderController();
$orderItems = [];

foreach ($value as $proId => $val) {
    $orderItems[] = [
        'productId' => $proId,
        'quantity' => $val,
    ];
}

$craftOrder->insertCraftOrder($touristID, $orderItems, $cname, $cphone, $caddress);

if ($craftOrder) {
    echo "<script>alert('Your order is successful');
        </script>";
}

// $token = $_POST["stripeToken"];
// $token_card_type = $_POST["stripeTokenType"];

// $charge = \Stripe\Charge::create([
//     "amount" => str_replace(",", "", $total) * 100,
//     "currency" => 'usd',
//     "description" => 'CraftOrder',
//     "source" => $token,
// ]);
// if ($charge) {
//    $payment = new touristController();
// $order->insertOrderPayment($total);
unset($_SESSION['cart']);

// if ($order) {
//     echo "
//              <script>alert('Your order is placed successfully');
//               window.location.href = '../view-tourist/cart.php';
//         </script>";
// }
// }

// $booking = new touristController();
// $booking->insertTourBooking($name, $phone, $email, $total_amount, $aDate, $dDate, $guests, $touristID, $packageId);

// if ($charge && $booking) {
//     echo "
//              <script>alert('Your tourbooking is successful');
//         window.location.href = '../view-tourist/tourpackagelist.php';
//         </script>";
// }
