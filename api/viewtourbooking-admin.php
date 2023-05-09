<?php
include '../controller/tourbookingController.php';

$reservation_id= $_GET['reservation_id'];
$tourist_id = $_GET['touristId'];
$package_id = $_GET['packageID'];

// Http request hit this page first.
// If there are data in http request we get them using post or get array.
// We create an input array with the data we get from the request
// We create required controller object.
// We call the required function.

$inputs= array($reservation_id, $tourist_id, $package_id);

// print_r($inputs);
// die();

$tourbookingcon = new tourbookingController();
$tourbookingcon-> viewtourreservationdetails($inputs);


// if (isset($_POST['delete'])) 
// {
//     $inputs = $_POST['id'];
//     $rem_entrepreneur = new entrepreneurController();
//     $rem_entrepreneur ->removeentrepreneur($inputs);
// }
?>