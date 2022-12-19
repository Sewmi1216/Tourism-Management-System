<?php
include '../controller/tourguideController.php';

$name = $_POST['guidename'];
$nic = $_POST['nic'];
$username= $_POST['guideusername'];
$email= $_POST['guideemail'];
$address= $_POST['guideaddress'];
$phonenum= $_POST['guidephone'];
$guidepassword= $_POST['guidepassword'];
$guidepassword2  = $_POST['guidepassword2'];


$inputs = array($name,$nic,$username,$email,$address,$phonenum,$guidepassword,$guidepassword2 );

$tourguidecon = new tourguideController();
$tourguidecon-> addtourguide($inputs);

?>