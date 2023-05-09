<?php
include '../controller/touristController.php';
include '../controller/hotelController.php';

// $reservationid = $_POST['reservationid'];
// $newStatus = $_POST['newstatus'];

// $update = new hotelController();
// $update->updateStatus($reservationid, $newStatus);

if (isset($_POST['search'])) {
    $id = $_POST['hotel'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $person = $_POST['person'];
    $room = $_POST['room'];

    $search = new touristController();
    $result = $search->availability($id, $checkin, $checkout, $person, $room); }

if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $rid = $_POST["id"];

    $type = new touristController();
    $result = $type->viewReservation($rid);

    $row = mysqli_fetch_object($result);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}