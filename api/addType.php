<?php


include_once '../controller/roomTypeController.php';

if (isset($_POST['save'])) {
    $pkgName = $_POST['pName'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    // $st = $_POST['status'];
    $status = $_POST['status'];
    // if ($st) {
    //     if ($st == "Available") {
    //         $status = 1;
    //     } else {
    //         $status = 0;
    //     }
    // }
    $file = $_FILES['file']['name'];

    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../images/" . $filename;

    $pkgcon = new roomTypeController();
    $pkgcon->addRoomType($pkgName, $price, $desc, $filename, $status);
    move_uploaded_file($tempname, $folder);

}
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $pkgName = $_POST['pName'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    // $st = $_POST['status'];
    $status = $_POST['status'];
    // if ($st) {
    //     if ($st == "Available") {
    //         $status = 1;
    //     } else {
    //         $status = 0;
    //     }
    // }
    $file = $_FILES['file']['name'];

    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../images/" . $filename;

    $pk = new roomTypeController();
    $pk->updateType($id, $pkgName, $price, $desc, $filename, $status);
    move_uploaded_file($tempname, $folder);

}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $pk = new roomTypeController();
    $pk->deleteType($id);

}

if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];

    // Connecting with database
    // $connection = mysqli_connect("localhost", "root", "", "pack2paradise");

    // Getting specific customer's detail
    //$sql = "SELECT * FROM customers WHERE customerNumber='$id'";
    // $sql = "SELECT * from roomtype where roomTypeId = '$id'";

    // $result = mysqli_query($connection, $sql);
    // $row = mysqli_fetch_object($result);

    $type = new roomTypeController();
    $result = $type->viewType($id);
    $row = mysqli_fetch_object($result);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}

