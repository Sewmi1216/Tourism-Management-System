<?php
include '../controller/roomController.php';

if (isset($_POST['add'])) {
    $hotelPkgId = $_POST['hotelPkgId'];
    $roomNo = $_POST['roomNo'];
    $beds = $_POST['beds'];
    $status = $_POST['status'];

    $roomcon = new roomController();
    $roomcon->addRoom($roomNo, $type, $beds, $status, $hotelPkgId);

    echo "window.location.href = '../view-hotel/room.php';
        </script>";

}
?>