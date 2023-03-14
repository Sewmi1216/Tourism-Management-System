<?php
include '../controller/tourpackageController.php';

$id= $_GET['package_id'];

// Http request hit this page first.
// If there are data in http request we get them using post or get array.
// We create an input array with the data we get from the request
// We create required controller object.
// We call the required function.

$inputs = array($id);


$tourpackagecon = new tourpackageController();
$tourpackagecon-> viewPkg($inputs);


?>