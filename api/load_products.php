<?php
include '../controller/productController.php';
$product = new productController();
$products = $product->getProducts();
$productData = array(
    "products" => $products,
);
echo json_encode($productData);
