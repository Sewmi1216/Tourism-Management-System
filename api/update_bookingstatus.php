<?php 
include '../controller/tourbookingController.php';

$bookingId = $_POST['bookingId'];
$newStatus = $_POST['newStatus'];

$update = new tourbookingController();
$update->updateStatus($bookingId, $newStatus);

?>