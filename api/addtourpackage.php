<?php
include '../controller/tourpackageController.php';

$name = $_POST['pckgname'];
// $pckgid = $_POST['pckgid'];
$pckgprice = $_POST['pckgprice'];
$pckgdesc= $_POST['pckgdesc'];
$participant_count	= $_POST['nooftourist'];


$inputs = array($name,$pckgprice,$pckgdesc,$participant_count);

$tourpackagecon = new tourpackageController();
$tourpackagecon-> addtourpackage($inputs);

?>