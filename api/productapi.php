<?php
include '../controller/productController.php';
if (isset($_POST['save'])) {
    $pName = $_POST['pName'];
    $pCategory = $_POST['pCategory'];
    $avaquantity = $_POST['avaquantity'];
    $price = $_POST['price'];
    $fileImg = $_FILES['fileImg']['name'];

    $filename = $_FILES["fileImg"]["name"];

    $tempname = $_FILES["fileImg"]["tmp_name"];
   
    $folder = "../images/" . $filename;
    
    $productcon = new productController();
    $productcon->addproduct($pName, $pCategory,$avaquantity, $price,$filename);
    move_uploaded_file($tempname, $folder);
}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $result = new productController();
    $result->deleteproduct($id);

}
?>
