<?php 
include '../controller/tourbookingController.php';

$bookingid = $_POST['bookingid'];
$newStatus = $_POST['newstatus'];

$update = new tourbookingController();
$update->updateStatus($bookingid, $newStatus);

?>