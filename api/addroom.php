<?php
include '../controller/roomController.php';

if (isset($_POST['add'])) {
    $typeId = $_POST['typeId'];
    $id= $_POST['hotelId'];
    $typeId = $_POST['typeId'];
    $roomNo = $_POST['roomNo'];
    // $beds = $_POST['beds'];
    // $price = $_POST['price'];
    $view = $_POST['view'];

    $roomcon = new roomController();
    $roomcon->addRoom($roomNo, $view, $typeId,$id);

    echo "window.location.href = '../view-hotel/room.php';
        </script>";

}

if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];

    $type = new roomController();
    $result = $type->viewRoom($id);
    $row = mysqli_fetch_object($result);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}
if (isset($_POST['update'])) {

    $roomno = $_POST['roomNo'];
    $typeId = $_POST['typeId'];
    // $beds = $_POST['beds'];
    // $price = $_POST['price'];
    $view = $_POST['view'];
   // print $typeId;

    $rm = new roomController();
    $rm->updateRoom($roomno, $typeId, $view);

}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $pk = new roomController();
    $pk->deleteRoom($id);
}



?>