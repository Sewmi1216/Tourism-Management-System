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

//if (isset($_POST['input'])) {
//     $input = $_POST['input'];
//    $hotelpkgsearch = new hotelPkgController();
// $res = $hotelpkgsearch->search($input);

//}
