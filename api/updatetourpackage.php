<?php
include '../controller/tourpackageController.php';

$name = $_POST['pckgname'];
 $pckgid = $_POST['packageID'];
$pckgprice = $_POST['pckgprice'];
$pckgdesc= $_POST['pckgdesc'];
$noofparticipant = $_POST['noofparticipant'];



$inputs = array($name,$pckgprice,$pckgdesc,$noofparticipant, $pckgid);
// print_r($inputs); 
// die();

$tourpackagecon = new tourpackageController();
$tourpackagecon-> updatetourpackage($inputs);


?>