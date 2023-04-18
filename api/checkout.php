<?php
include "stripeconfig.php";
include '../controller/touristController.php';

$touristID = $_POST['tid'];
$hotelId = $_POST['hid'];
$roomno = $_POST['roomno'];

$total_amount = $_POST['totalamount'];
$guestName = $_POST['guestName'];
$guestPhone = $_POST['guestPhone'];
$guestEmail = $_POST['guestEmail'];

$checkInDate = $_POST['checkInDate'];
$checkOutDate = $_POST['checkOutDate'];



$token = $_POST["stripeToken"];
$contact_name = $_POST["guestName"];
$token_card_type = $_POST["stripeTokenType"];
$phone = $_POST["guestPhone"];
$email = $_POST["stripeEmail"];
$amount = $_POST["totalamount"];
$desc = $_POST["roomno"];
$charge = \Stripe\Charge::create([
    "amount" => str_replace(",", "", $amount) * 100,
    "currency" => 'usd',
    "description" => $desc,
    "source" => $token,
]);



// if (!$reserve) {
//     echo 'There was a error';
// } else {
//     echo "
//              <script>alert('Your reservation is successful');
//         window.location.href = '../view/accommodation.php';
//         </script>";
// }
$reserve = new touristController();
$reserve->insertReservation($guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId);

if ($charge) {
    echo "
             <script>alert('Your reservation is successful');
        window.location.href = '../view/accommodation.php';
        </script>";
}

// if (isset($_POST['pay'])) {
//     $touristID = $_POST['tid'];
// $hotelId = $_POST['hid'];
// $roomno = $_POST['roomno'];

// $total_amount = $_POST['totalamount'];
// $guestName = $_POST['guestName'];
// $guestPhone = $_POST['guestPhone'];
// $guestEmail = $_POST['guestEmail'];

// $checkInDate = $_POST['checkInDate'];
// $checkOutDate = $_POST['checkOutDate'];

// $reserve = new touristController();
// $reserve->insertReservationatSite($guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId);

// if ($reserve) {
//     echo "
//              <script>alert('Your reservation is successful.Can pay at hotel');
//         window.location.href = '../view/accommodation.php';
//         </script>";
// }

// }
