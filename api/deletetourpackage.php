
<?php
include '../controller/tourpackagecontroller.php';

$packagename = $_GET["id"];
$inputs = array($packagename);

$tourpackagecon = new tourpackageController();
$tourpackagecon-> deletePkg($inputs);

?>