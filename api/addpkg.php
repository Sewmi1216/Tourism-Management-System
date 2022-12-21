<?php
include_once('../controller/hotelPkgController.php') ;

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

    $pkgcon = new hotelPkgController();
    $pkgcon->addHotelPkg($pkgName, $price, $desc, $filename, $status);
    move_uploaded_file($tempname, $folder);

}
//if (isset($_POST['input'])) {
//     $input = $_POST['input'];
//    $hotelpkgsearch = new hotelPkgController();
// $res = $hotelpkgsearch->search($input);

//}

