<?php
include '../controller/hotelController.php';

$username = $_POST['username'];
$password = $_POST['password'];
$hotelcon = new hotelController();
$hotelcon->userLogin($username, $password);
?>
