<?php
include '../controller/touristController.php';

$name = $_POST['name'];
$mno = $_POST['mno'];
$email = $_POST['email'];
$password = $_POST['psw'];
$apassword = md5($password);
$address = $_POST['address'];
$country = $_POST['country'];
$dob = $_POST['dob'];

$inputs = array($name,$mno,$email,$apassword,$address,$country,$dob);
$touristcon = new touristController();
$touristcon->userSignup($inputs);

?>