<?php
include '../controller/productController.php';
if (isset($_POST['save'])) {
    $pName = $_POST['pName'];
    $pCategory = $_POST['pCategory'];
    $avaquantity = $_POST['avaquantity'];
    $price = $_POST['price'];
    $fileImg = $_FILES['fileImg']['name'];

    $ptempname = $_FILES["fileImg"]["tmp_name"];
   
    $folderImg = "../Images/" . $fileImg;
    

    $productcon = new productController();
    $productcon->addproduct($pName, $pCategory,$avaquantity, $price,$fileImg);
    move_uploaded_file($tempname, $folder);
}
?>
