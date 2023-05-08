<?php
include '../controller/hotelController.php';

$reservationid = $_POST['reservationid'];
$newStatus = $_POST['newroomstatus'];

$update = new hotelController();
$update->updateRoomStatus($reservationid, $newStatus);

