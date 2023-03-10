<?php
include '../controller/entrepreneurController.php';
if (isset($_POST['signup'])) {
    $businessName = $_POST['bName'];
    $eName = $_POST['eName'];
    $eNic = $_POST['eNic'];
    $ePhone = $_POST['ePhone'];
    $eEmail = $_POST['eEmail'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $epassword = md5($password);
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fileImg = $_FILES['proImg']['name'];
    $fileDoc = $_FILES['doc']['name'];

    $ptempname = $_FILES["proImg"]["tmp_name"];
    $dtempname = $_FILES["doc"]["tmp_name"];

    $ptempname = $_FILES["proImg"]["tmp_name"];
    $dtempname = $_FILES["doc"]["tmp_name"];

    $folderImg = "../Images/" . $fileImg;
    $folderDoc = "../Images/doc" . $fileDoc;

    $entrepreneurcon = new entrepreneurController();
    $entrepreneurcon->addentrepreneur($businessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc);
    move_uploaded_file($ptempname, $pfolder);
    move_uploaded_file($dtempname, $dfolder);
}
if (isset($_POST['update'])) {
   
    $businessName = $_POST['bName'];
    $eName = $_POST['eName'];
    $eNic = $_POST['eNic'];
    $ePhone = $_POST['ePhone'];
    $eEmail = $_POST['eEmail'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $epassword = md5($password);
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fileImg = $_FILES['proImg']['name'];
    $fileDoc = $_FILES['doc']['name'];

    $ptempname = $_FILES["proImg"]["tmp_name"];
    $dtempname = $_FILES["doc"]["tmp_name"];

    $ptempname = $_FILES["proImg"]["tmp_name"];
    $dtempname = $_FILES["doc"]["tmp_name"];

    $folderImg = "../Images/" . $fileImg;
    $folderDoc = "../Images/doc" . $fileDoc;

    $entrepreneurcon = new entrepreneurController();
    $entrepreneurcon->updateentrepreneur($businessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc);
    move_uploaded_file($ptempname, $pfolder);
    move_uploaded_file($dtempname, $dfolder);

}
