<?php
include '../controller/tourbookingController.php';

$name = $_POST['guestname'];
// $pckgid = $_POST['pckgid'];
$pckgprice = $_POST['emailaddress'];
$pckgdesc= $_POST['mobilenumber'];
$participant_count	= $_POST['noofpartiicipants'];
$participant_count	= $_POST['arrivaldate'];

$inputs = array($name,$pckgprice,$pckgdesc,$participant_count);

$tourpackagecon = new tourpackageController();
$tourpackagecon-> addtourpackage($inputs);

?>