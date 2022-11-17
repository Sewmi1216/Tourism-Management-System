<?php
include '../controller/productController.php';
if (isset($_POST['addproduct'])) {
    $pName = $_POST['pName'];
    $Category = $_POST['pCategory'];
    $avaquantity = $_POST['avaquantity'];
    $price = $_POST['price'];
    $fileImg = $_FILES['Img']['name'];

    $ptempname = $_FILES["Img"]["tmp_name"];
   
    $folderImg = "../Images/" . $fileImg;
    

    $productcon = new productController();
    $productcon->addproduct($pName, $pCategory,$avaquantity, $price,$fileImg);
}
?>
