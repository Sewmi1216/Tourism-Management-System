
<?php
include '../controller/tourpackagecontroller.php';

$packagename = $_GET["package_id"];
$inputs = array($packagename);

$tourpackagecon = new tourpackageController();
$tourpackagecon-> deletePkg($inputs);

?>