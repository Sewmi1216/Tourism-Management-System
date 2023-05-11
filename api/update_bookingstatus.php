<?php 
include '../controller/tourbookingController.php';

$bookingId = $_POST['bookingid'];
$newStatus = $_POST['newstatus'];

$update = new tourbookingController();
$update->updateStatus($bookingId, $newStatus);

?>