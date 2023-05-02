<?php
include '../controller/tourpackageController.php';

$name = $_POST['pckgname'];
// $pckgid = $_POST['pckgid'];
$pckgprice = $_POST['pckgprice'];
$pckgdesc= $_POST['pckgdesc'];
$no_of_days = $_POST['days'];
$max_part	= $_POST['nooftourist'];


$inputs = array($name,$pckgprice,$pckgdesc,$max_part,$no_of_days);

$tourpackagecon = new tourpackageController();
$tourpackagecon-> addtourpackage($inputs);



if (isset($_POST['submitImg'])) {
    $typeid = $_POST['id'];

    $file = $_FILES['file']['name'];

    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../images/" . $filename;

    $typecon = new tourpackageController();
    $typecon->tourpackageimg($typeid, $file);

    move_uploaded_file($tempname, $folder);
    if (!$typecon) {
        echo 'There was a error';
    } else {
        echo "
             <script>
             window.location.href = '../view-admin/addPhotos.php?id=$package_id';

        </script>";


    }
}
if (isset($_POST['deleteimg'])) {
    $id = $_POST['id'];
    $imgname = $_POST['imgname'];
    $typeid = $_POST['typeid'];

    $tp = new tourpackageController();
    $tp->deleteImg($id, $typeid);
    unlink("../images/" . $imgname);
     echo "
             <script>
             window.location.href = '../view-admin/addPhotos.php?id=$typeid';
                  </script>";

}

if (isset($_POST['update'])) {
    $name = $_POST['pckgname'];
    // $pckgid = $_POST['pckgid'];
    $pckgprice = $_POST['pckgprice'];
    $pckgdesc= $_POST['pckgdesc'];
    $no_of_days = $_POST['days'];
    $max_part	= $_POST['nooftourist'];
    
    
    $inputs = array($name,$pckgprice,$pckgdesc,$max_part,$no_of_days);

    $pk = new tourpackageController();
    $pk->updatetourpackage($id, $pkgName, $desc);

}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $pk = new tourpackageController();
    $pk->deleteType($id);
}

if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];

    $type = new tourpackageController();
    $result = $type->viewType($id);
    $row = mysqli_fetch_object($result);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}
if (isset($_POST["get_payments"])) {
    // Get the ID of customer user has selected
    $reservationId = $_POST["reservationId"];

    $cash = new hotelController();
    $result2 = $cash->get_payments($cash);
    $row = mysqli_fetch_object($result2);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}


?>