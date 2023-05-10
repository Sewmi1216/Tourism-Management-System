<?php
include '../controller/touristController.php';

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $mno = $_POST['mno'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $apassword = md5($password);
    $address = $_POST['address'];
    $country = $_POST['country'];
    $dob = $_POST['dob'];
    // $username =$_POST['email'];
    
    
    
    $fileImg = $_FILES['proImg']['name'];
    
    $fileImgname = $_FILES['proImg']['name'];
    
    $ptempname = $_FILES["proImg"]["tmp_name"];
    
    $pfolder = "../images/" . $fileImgname;
    
    // $img =$_POST['proImg'];
    // echo 'print';
    
    $inputs = array($name,$address,$email,$mno,$fileImgname,$password,$dob,$country);
    $touristcon = new touristController();
    $touristcon->userSignup($inputs);
    move_uploaded_file($ptempname, $pfolder);
    
    


}
?>