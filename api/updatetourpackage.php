<?php
include '../controller/tourpackagecontroller.php';

$name = $_POST['pckgname'];
// $pckgid = $_POST['pckgid'];
$pckgprice = $_POST['pckgprice'];
$pckgdesc= $_POST['pckgdesc'];
$max_part	= $_POST['nooftourist'];
$id = $_POST['packageID'];

$inputs = array($name,$pckgprice,$pckgdesc,$max_part,$id);

$tourpackagecon = new tourpackagecontroller();
$tourpackagecon-> updatetourpackage($inputs);


?>