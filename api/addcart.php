<?php

include '../controller/touristController.php';

//     $id = ($_GET['pid']);
//     $qty = ($_GET['qty']);

//     if (isset($_SESSION['cart'][$id])) {
//         $_SESSION['cart'][$id]['quantity']++;
//     } else {
//         $product = new productController();

//         $query_p = $product->viewproduct($id);
//         if (mysqli_num_rows($query_p) != 0) {
//             $row_p = mysqli_fetch_array($query_p);
//             $_SESSION['cart'][$row_p['productID']] = array("quantity" => $qty, "price" => $row_p['price']);

//         } else {
//             $message = "Product ID is invalid";
//         }
//     }
//     echo "<script>alert('Product has been added to the cart')</script>";
//     echo "<script type='text/javascript'> document.location ='../view-tourist/carts.php'; </script>";
?>
<?php
// If the user clicked the add to cart button on the product page we can check for the form data

// Set the post variables so we easily identify them, also make sure they are integer
$product_id = (int)$_GET['pid'];
$quantity = (int)$_GET['qty'];

$product = new touristController();

$result = $product->viewProduct($product_id);
if (mysqli_num_rows($result) != 0) {
    session_start();
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            // Product exists in cart so just update the quanity
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            // Product is not in cart so add it
            $_SESSION['cart'][$product_id] = $quantity;
        }
    } else {
        // There are no products in cart, this will add the first product to cart
        $_SESSION['cart'] = array($product_id => $quantity);
    }

    echo "<script>alert('Product has been added to the cart')</script>";
    echo "<script type='text/javascript'> document.location ='../view-tourist/carts.php'; </script>";

}
