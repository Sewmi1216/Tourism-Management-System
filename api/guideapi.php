<?php
include '../controller/guideController.php';
if (isset($_POST['signup'])) {
    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nic = $_POST['nic'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $availability = $_POST['availability'];
    $language = $_POST['language'];
    $vehicle = $_POST['vehicle'];
    $type = $_POST['type'];
    $passenger = $_POST['passengers'];
    $epassword = md5($password);
    $fileImg = $_FILES['proImg']['name'];
    $fileDoc = $_FILES['doc']['name'];

    $ptempname = $_FILES["proImg"]["tmp_name"];
    $dtempname = $_FILES["doc"]["tmp_name"];
    $ptempname = $_FILES["proImg"]["tmp_name"];
    $dtempname = $_FILES["doc"]["tmp_name"];

    $folderImg = "../Images/" . $fileImg;
    $folderDoc = "../Images/doc" . $fileDoc;

    $guidecon = new guideController();
    $guidecon->addguide($name,$address, $email,$phone,$nic, $fileImg, $username, $password, $availability,$language,$fileDoc,$vehicle,$type,$passenger);
    move_uploaded_file($ptempname, $pfolder);
    move_uploaded_file($dtempname, $dfolder);
}

// if (isset($_POST["get_data"])) {
//     // Get the ID of customer user has selected
//     $id = $_POST["id"];

//     $profile = new entrepreneurController();
//     $result = $profile->viewentrepreneur($id);
//     $row = mysqli_fetch_object($result);

//     // Important to echo the record in JSON format
//     echo json_encode($row);

//     // Important to stop further executing the script on AJAX by following line
//     exit();
// }

