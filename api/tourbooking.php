<?php
include "stripeconfig.php";
include '../controller/touristController.php';

$touristID = $_POST['tid'];
$packageId = $_POST['pid'];

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$guests = $_POST['traverler'];

$aDate = $_POST['adate'];
$dDate = $_POST['ddate'];
$vehicle = $_POST['vehicle'];

$token = $_POST["stripeToken"];
$contact_name = $_POST["name"];
$token_card_type = $_POST["stripeTokenType"];
$phone = $_POST["phone"];
// $email = $_POST["stripeEmail"];
$total_amount = $_POST["tot_amount"];

$charge = \Stripe\Charge::create([
    "amount" => str_replace(",", "", $total_amount) * 100,
    "currency" => 'usd',
    "description" => 'TourBooking',
    "source" => $token,
]);

$booking = new touristController();
$booking->insertTourBooking($name, $phone, $email, $total_amount, $aDate, $dDate, $guests, $touristID, $packageId,$vehicle);

if ($charge && $booking) {
    echo "
             <script>alert('Your tourbooking is successful');
        window.location.href = '../view-tourist/tourpackagelist.php';
        </script>";
}
