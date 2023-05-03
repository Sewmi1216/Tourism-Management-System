
<?php
include '../controller/tourpackagecontroller.php';

$id = $_GET["packageID"];

$tourpackagecon = new tourpackageController();
$tourpackagecon-> deletePkg($id);

?>