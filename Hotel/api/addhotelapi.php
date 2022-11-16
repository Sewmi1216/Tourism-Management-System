<?php
include '../controller/hotelController.php';
if (isset($_POST['signup'])) {
    $hotelName = $_POST['hotelName'];
    $mName = $_POST['mName'];
    $mPhone = $_POST['mPhone'];
    $mEmail = $_POST['mEmail'];
    $mNic = $_POST['mNic'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fileImg = $_FILES['proImg']['name'];
    $fileDoc = $_FILES['doc']['name'];

    $ptempname = $_FILES["proImg"]["tmp_name"];
    $dtempname = $_FILES["doc"]["tmp_name"];

    $folderImg = "../images/" . $fileImg;
    $folderDoc = "../images/doc" . $fileDoc;

    $hotelcon = new hotelController();
    $hotelcon->addHotel($hotelName, $address, $email, $phone, $fileImg, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc);
}
