<?php

include '../controller/touristController.php';

// if (isset($_POST['submit'])) {

//     if (!empty($_SESSION['cart'])) {
//         foreach ($_POST['submit'] as $key) {

//             unset($_SESSION['cart'][$key]);
//         }
//         echo "<script>alert('Your Cart has been Updated');</script>";
//         echo "<script type='text/javascript'> document.location ='../view-tourist/carts.php'; </script>";
//     }
// }

// $id = ($_GET['pid']);
$id = intval($_GET['pid']);
$qty = ($_GET['qty']);
session_start();

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
} else {
    $product = new touristController();
    $query_p = $product->viewproduct($id);
    if (mysqli_num_rows($query_p) != 0) {
        $row_p = mysqli_fetch_array($query_p);
        $_SESSION['cart'][$row_p['productID']] = array("quantity" => $qty, "price" => $row_p['price']);
        // echo "<pre>";
        // print_r($row_p);
        // echo "</pre>";

    } else {
        $message = "Product ID is invalid";
    }
}
echo "<script>alert('Product has been added to the cart')</script>";
echo "<script type='text/javascript'> document.location ='../view-tourist/cart.php'; </script>";
//     echo "<pre>";
// print_r($query_p);
// echo "</pre>";

?>
