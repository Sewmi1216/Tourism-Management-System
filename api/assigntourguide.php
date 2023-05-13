<?php 
include '../controller/tourbookingController.php';

$bookingId = $_POST['bookingId'];
$newGuide = $_POST['newTourguide'];

$update = new tourbookingController();
$update->updateGuide($bookingId, $newGuide);

?>