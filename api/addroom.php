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
    $id = $_POST['id'];

    $pkgName = $_POST['pName'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];

    $pk = new roomTypeController();
    $pk->updateType($id, $pkgName, $price, $desc, $status);

}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $pk = new roomTypeController();
    $pk->deleteType($id);
}



?>