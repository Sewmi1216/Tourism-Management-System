<?php
include '../controller/tourguideController.php';

$id= $_GET['tourguideID'];

// Http request hit this page first.
// If there are data in http request we get them using post or get array.
// We create an input array with the data we get from the request
// We create required controller object.
// We call the required function.

$inputs = array($id);
// print_r($inputs);
// die();

$tourguidecon = new tourguideController();
$tourguidecon-> viewoneguide($inputs);
?>