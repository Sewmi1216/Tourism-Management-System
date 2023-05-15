<?php
include '../controller/hotelController.php';
include '../controller/userController.php';

if (isset($_POST['signup'])) {
    $hotelName = $_POST['hotelName'];
    $mName = $_POST['mName'];
    $mPhone = $_POST['mPhone'];
    $mEmail = $_POST['mEmail'];
    $mNic = $_POST['mNic'];
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
    $hotelconnection = new hotelController();
    $hotelconnection->addHotel($hotelName, $address, $email, $phone, $fileImgname, $hpassword, $mName, $mPhone, $mEmail, $mNic, $fileDocname);
   
    move_uploaded_file($ptempname, $pfolder);
    move_uploaded_file($dtempname, $pfolder);

}

if (isset($_POST['recover'])) {
    $email = $_POST['email'];
    $recover = new userController();
    $recover->recoverPwd($email);

    // echo "<script>
    //             window.location.href = '../view-hotel/recoverPwd.php';
    //     </script>";

}
if (isset($_POST['reset'])) {
    $password = $_POST['cpwd'];
    $email = $_POST['email'];

    $hpassword = md5($password);

    // $email = $_SESSION['email'];

    $reset = new userController();
    $reset->resetPwd($email,$hpassword);

}

if (isset($_GET['update'])) {
    $id = $_GET['id'];

    $name = $_GET['name'];
    $address = $_GET['address'];
    // $email = $_GET['email'];
    $phone = $_GET['phone'];
    // $username = $_GET['username'];
    // $password = $_GET['password'];
    // $hpassword = md5($password);
    $managerName = $_GET['managerName'];
    $managerPhone = $_GET['managerPhone'];
    $managerEmail = $_GET['managerEmail'];
    $managerNic = $_GET['managerNic'];

    $profile = new hotelController();
    $profile->updateProfile($id, $name, $address, $phone, $managerName, $managerPhone, $managerEmail, $managerNic);
    if($profile){
         echo "<script>alert('Profile updated successfully');
         window.location.href = '../view-hotel/profile.php';</script>";
         
    }
    else{
        echo "<script>alert('Profile update unsuccessful');
         window.location.href = '../view-hotel/profile.php';</script>";
    }
}
