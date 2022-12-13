<?php
include '../controller/admincontroller.php';

$username = $_POST['username'];
$password = $_POST['password'];
$admincon = new adminController();
$admincon->userLogin($username, $password);

?>
