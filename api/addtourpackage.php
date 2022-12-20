<?php
include '../controller/tourpackageController.php';

$name = $_POST['pckgname'];
$pckgid = $_POST['pckgid'];
$pckgprice = $_POST['pckgprice'];
$pckgdesc= $_POST['pckgdesc'];



$inputs = array($name,$pckgprice,$pckgdesc);

$tourpackagecon = new tourpackageController();
$tourpackagecon-> addtourpackage($inputs);

?>