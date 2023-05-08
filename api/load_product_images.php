<?php
include '../controller/productController.php';
// $product = new productController();
// $id = $_POST["id"];
// $products = $product->getProductImgs();
// $productData = array(
//     "products" => $products,
// );

//echo json_encode($productData);

if (isset($_POST['productID'])) {
    $productID = $_POST['productID'];

    // Create an instance of the productController
    $tp = new productController();

    // Fetch the images for the given productID
    $rows = $tp->viewAllProImgs($productID);

    // Extract the image names into an array
    $images = [];
    foreach ($rows as $row) {
        $images[] = $row['image'];
    }

    // Return the images as a JSON response
    echo json_encode(['images' => $images]);
}
