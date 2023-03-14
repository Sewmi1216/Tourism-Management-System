<?php
include '../controller/profileController.php';


if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];

    $profile = new profileController();
    $result = $profile->viewprofile($id);
    $row = mysqli_fetch_object($result);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}


// if (isset($_POST['update'])) {
//     $eid = $_POST['id'];
//     $pName = $_POST['pName'];
//     $pCategory = $_POST['pCategory'];
//     $avaquantity = $_POST['avaquantity'];
//     $price = $_POST['price'];
//     $fileImg = $_FILES['fileImg']['name'];

//     $filename = $_FILES["fileImg"]["name"];

//     $tempname = $_FILES["fileImg"]["tmp_name"];
   
//     $folder = "../images/" . $filename;

//     $result = new productController();
//     $result->updateproduct($eid,$pName,$pCategory,$avaquantity,$price,$filename);
//     move_uploaded_file($tempname, $folder);
    

// }
?>


