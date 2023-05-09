<?php
include '../controller/tourpackageController.php';

$name = $_POST['pckgname'];
// $pckgid = $_POST['pckgid'];
$pckgprice = $_POST['pckgprice'];
$pckgdesc= $_POST['pckgdesc'];
$no_of_days = $_POST['days'];
$max_part	= $_POST['nooftourist'];
$id = $_POST['packageID'];

$inputs = array($name,$pckgprice,$pckgdesc,$max_part,$no_of_days,$id);

// print_r($inputs);
// die();

$tourpackagecon = new tourpackageController();
$tourpackagecon-> updatetourpackage($inputs);


?>