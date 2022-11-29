<?php
include '../controller/hotelPkgController.php';

if (isset($_POST['save'])) {
    $pkgName = $_POST['pName'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];
    $file = $_FILES['file']['name'];

    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../images/" . $filename;

    $pkgcon = new hotelPkgController();
    $pkgcon->addHotelPkg($pkgName, $price, $desc, $filename, $status);
    move_uploaded_file($tempname, $folder);

}
