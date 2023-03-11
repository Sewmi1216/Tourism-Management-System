<?php
include '../controller/hotelController.php';

$id= $_GET['hotel_id'];

// Http request hit this page first.
// If there are data in http request we get them using post or get array.
// We create an input array with the data we get from the request
// We create required controller object.
// We call the required function.

$inputs = array($id);
// print_r($inputs);
// die();

$tourguidecon = new hotelController();
$tourguidecon-> viewonemanager($inputs);
?>