<?php
include '../controller/tourpackageController.php';

$tourpackagecon = new tourpackageController();
$rows=$tourpackagecon-> viewAllPkgs();

?>