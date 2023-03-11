<?php
include '../controller/roomController.php';

if (isset($_POST['add'])) {
    $typeId = $_POST['typeId'];
    $id= $_POST['hotelId'];
    $typeId = $_POST['typeId'];
    $roomNo = $_POST['roomNo'];
    $beds = $_POST['beds'];
    $status = $_POST['status'];

    $roomcon = new roomController();
    $roomcon->addRoom($roomNo, $beds, $status, $typeId,$id);

    echo "window.location.href = '../view-hotel/room.php';
        </script>";

}
?>