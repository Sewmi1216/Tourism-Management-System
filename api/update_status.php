<?php 
include '../controller/hotelController.php';

$reservationid = $_POST['reservationid'];
$newStatus = $_POST['newstatus'];

$update = new hotelController();
$update->updateStatus($reservationid, $newStatus);
