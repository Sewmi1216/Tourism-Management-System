<?php

include '../controller/touristController.php';

$productID = $_GET['product'];
$quantity = $_POST['quantity'];
$touristcon = new touristController();
if(isset($_POST['cart'])){
    $touristcon->addcart($quantity, $productID, $_SESSION['touristID']);
    print_r($_POST);
}

?>