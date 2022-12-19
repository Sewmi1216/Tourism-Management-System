<?php

include '../controller/touristController.php';

$username = $_POST['username'];
$password = $_POST['password'];
$touristcon = new touristController();
$touristcon->userLogin($username, $password);


include '../controller/entrepreneurController.php';

$username = $_POST['username'];
$password = $_POST['password'];
$entrepreneurcon = new entrepreneurController();
$entrepreneurcon->userLogin($username, $password);

?>
