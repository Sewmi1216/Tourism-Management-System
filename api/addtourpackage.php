<?php
include '../controller/tourpackageController.php';

$name = $_POST['pckgname'];
// $pckgid = $_POST['pckgid'];
$pckgprice = $_POST['pckgprice'];
$pckgdesc= $_POST['pckgdesc'];
$no_of_days = $_POST['days'];
$max_part	= $_POST['nooftourist'];


$inputs = array($name,$pckgprice,$pckgdesc,$participant_count,$no_of_days);

$tourpackagecon = new tourpackageController();
$tourpackagecon-> addtourpackage($inputs);

?>