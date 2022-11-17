<?php
include '../controller/entrepreneurController.php';

$username = $_POST['username'];
$password = $_POST['password'];
$entrepreneurcon = new entrepreneurController();
$entrepreneurcon->userLogin($username, $password);
?>
