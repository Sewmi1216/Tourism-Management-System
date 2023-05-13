<?php
include '../controller/productController.php';
if (isset($_POST['save'])) {
    $categoryID = $_POST['categoryID'];
    $pName = $_POST['pName'];
   
    $avaquantity = $_POST['avaquantity'];
    $price = $_POST['price'];
    
    $id =$_POST['entID'];
    $productcon = new productController();
    $productcon->addproduct($pName,$avaquantity,$price,$categoryID,$id);
    if (!$productcon) {
        echo 'There was a error';
    } else {
        echo "
             <script>
        window.location.href = '../view-entrepreneur/product.php';
        </script>";
    }

}

if (isset($_POST['submitImg'])) {
    $productid = $_POST['pid'];

    $file = $_FILES['file']['name'];

    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../images/" . $filename;

    $productcon = new productController();
    $productcon->addproductImg($productid, $file);

    move_uploaded_file($tempname, $folder);
    if (!$productcon) {
        echo 'There was a error';
    } else {
        echo "
             <script>
             window.location.href = '../view-entrepreneur/addPhotos.php?id=$productid';

        </script>";


    }
}
if (isset($_POST['deleteimg'])) {
    $id = $_POST['id'];
    $imgname = $_POST['imgname'];
    $productid = $_POST['productid'];

    $tp = new productController();
    $tp->deleteImg($id, $productid);
    unlink("../images/" . $imgname);
     echo "
             <script>
             window.location.href = '../view-entrepreneur/addPhotos.php?id=$productid';
                  </script>";

}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $result = new productController();
    $result->deleteproduct($id);

}
if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];

    $product = new productController();
    $result = $product->viewproduct($id);
    $row = mysqli_fetch_object($result);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}


if (isset($_POST['update'])) {
    $categoryID = $_POST['categoryID'];
    $pName = $_POST['pName'];
   
    $avaquantity = $_POST['avaquantity'];
    $price = $_POST['price'];
    

    $result = new productController();
    $result->updateproduct($pName,$categoryID,$avaquantity,$price,$filename);
   
    

}
?>


