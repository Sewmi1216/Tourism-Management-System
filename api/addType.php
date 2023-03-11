<?php
include_once '../controller/roomTypeController.php';

if (isset($_POST['save'])) {
    $pkgName = $_POST['pName'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $status = $_POST['status'];

    $pkgcon = new roomTypeController();
    $pkgcon->addRoomType($pkgName, $price, $desc, $status);
    if (!$pkgcon) {
        echo 'There was a error';
    } else {
        echo "
             <script>
        window.location.href = '../view-hotel/roomType.php';
        </script>";
    }

    //  move_uploaded_file($tempname, $folder);
}

if (isset($_POST['submitImg'])) {
    $typeid = $_POST['id'];

    $file = $_FILES['file']['name'];

    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../images/" . $filename;

    $typecon = new roomTypeController();
    $typecon->addRoomTypeImg($typeid, $file);

    move_uploaded_file($tempname, $folder);
    if (!$typecon) {
        echo 'There was a error';
    } else {
        echo "
             <script>
             window.location.href = '../view-hotel/addPhotos.php?id=$typeid';

        </script>";


    }
}
if (isset($_POST['deleteimg'])) {
    $id = $_POST['id'];
    $imgname = $_POST['imgname'];
    $typeid = $_POST['typeid'];

    $tp = new roomTypeController();
    $tp->deleteImg($id, $typeid);
    unlink("../images/" . $imgname);

}

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $pkgName = $_POST['pName'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];

    $pk = new roomTypeController();
    $pk->updateType($id, $pkgName, $price, $desc, $status);

}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $pk = new roomTypeController();
    $pk->deleteType($id);
}

if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];

    $type = new roomTypeController();
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

