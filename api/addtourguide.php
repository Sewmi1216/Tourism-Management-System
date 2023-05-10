<?php
include '../controller/tourguideController.php';
if (isset($_POST['signup'])) {
    $guidename = $_POST['guidename'];
    $guidenic = $_POST['guidenic'];
    $guideemail = $_POST['guideemail'];
    $hguideemail = md5($guideemail);
    $guideaddress = $_POST['guideaddress'];
    $guidephone = $_POST['guidephone'];
    $guidepassword = $_POST['guidepassword'];
    $guidepassword2 = $_POST['guidepassword2'];
    
}

$inputs = array($guidename,$guidenic,$hguideemail, $guideaddress, $guidephone, $guidepassword);

$tourpguidecon = new tourguideController();
$tourguidecon-> addtourguide($inputs);

?>