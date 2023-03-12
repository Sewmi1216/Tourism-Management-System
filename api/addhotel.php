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
    $hpassword = md5($password);
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fileImg = $_FILES['proImg']['name'];
    $fileDoc = $_FILES['doc']['name'];

    $fileImgname = $_FILES['proImg']['name'];
    $fileDocname = $_FILES['doc']['name'];

    $ptempname = $_FILES["proImg"]["tmp_name"];
    $dtempname = $_FILES["doc"]["tmp_name"];

    $pfolder = "../images/" . $fileImgname;
    //$id = 'T' . time();
    // $id ='T'. date('his');

    $id = rand(time(), 100000000);
    $hotelconnection = new hotelController();
    $hotelconnection->addHotel($id, $hotelName, $address, $email, $phone, $fileImgname, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDocname);
    move_uploaded_file($ptempname, $pfolder);
    move_uploaded_file($dtempname, $dfolder);

}

if (isset($_POST['recover'])) {
    $email = $_POST['email'];
    $recover = new hotelController();
    $recover->recoverPwd($email);

    echo "<script>
                window.location.href = '../view-hotel/recoverPwd.php';
        </script>";

}
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $managerName = $_POST['managerName'];
    $managerPhone = $_POST['managerPhone'];
    $managerEmail = $_POST['managerEmail'];
    $managerNic = $_POST['managerNic'];

    $profile = new hotelController();
    $profile->updateProfile($id, $name, $address, $email, $phone, $username, $password, $managerName, $managerPhone, $managerEmail, $managerNic);

}
