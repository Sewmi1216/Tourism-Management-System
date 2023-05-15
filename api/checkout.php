<?php
include "stripeconfig.php";
include '../controller/touristController.php';

// if (isset($_POST['reserve'])) {
//     $touristID = $_POST['tid'];
//     $hotelId = $_POST['hid'];
//     $roomno = $_POST['roomno'];

//     $total_amount = $_POST['totalamount'];
//     $guestName = $_POST['guestName'];
//     $guestPhone = $_POST['guestPhone'];
//     $guestEmail = $_POST['guestEmail'];

//     // $bookingDateTime='2023-03-13 23:12:11.000000';
//     // $bookingDateTime=$_POST[]
//     // $total_amount = 1500;
//     $checkInDate = $_POST['checkInDate'];
//     $checkOutDate = $_POST['checkOutDate'];
//     $reserve = new touristController();
//     //insertReservation($email, $guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId)
//     $reserve->insertReservation($guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId);
//     if (!$reserve) {
//         echo 'There was a error';
//     } else {
//         echo "
//              <script>alert('Your reservation is placed.Can pay at the hotel');
//         window.location.href = '../view-tourist/hotelView.php';
//         </script>";
//     }
// }

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
$reserve->insertReservation($email, $guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId);

if ($charge) {
    echo "
             <script>alert('Your reservation is successful');
        window.location.href = '../view-tourist/accommodation.php';
        </script>";
}else{
    echo "
             <script>alert('Your reservation is unsuccessful');
        window.location.href = '../view-tourist/accommodation.php';
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
