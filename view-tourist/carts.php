<?php
require '../api/viewtourpackage.php';
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}
if (isset($_GET['qty'])) {$qty = $_GET['qty'];}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tour Package</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourpackage.css">

</head>

<body>
    <?php include "header.php"?>
    <h1 class="heading">
        <span>s</span>
        <span>h</span>
        <span>o</span>
        <span>p</span>
        <span>p</span>
        <span>i</span>
        <span>n</span>
        <span>g</span>
        <span class="space"></span>
        <span>c</span>
        <span>a</span>
        <span>r</span>
        <span>t</span>
    </h1>

    <section class="hotel1" id="hotel" style="">
        <div class="shopping-cart">
            <?php
if (!empty($_SESSION['cart'])) {

    ?>
    
            <div class="item">
                <div class="description" style="color:blue;  font-weight: bold;">
                    <span>Common Projects</span>
                </div>

                <div class="image"
                    style="font-weight: bold;color:blue;padding-top: 10px;width: 220px;margin-right:20px;">
                    <span>Image</span>
                </div>

                <div class="description" style="color:blue;font-weight: bold;">
                    <span>Product Description</span>
                </div>

                <div class="quantity" style="color:blue;font-weight: bold;">
                    <span>Quantity</span>
                </div>

                <div class="total-price" style="width:140px;color:blue;font-weight: bold;"><span>Price</span></div>
            </div>
            <?php
// $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
if (isset($_SESSION['cart'])) {
    $products_in_cart = $_SESSION['cart'];
} else {
    $products_in_cart = array();
}

    $products = array();
    $subtotal = 0.00;

    if ($products_in_cart) {
        require_once "../controller/touristController.php";
        $cart = new touristController();
        $products = $cart->viewCartItems($products_in_cart);
//         echo "<pre>";
// print_r($products);
// echo "</pre>";

        // if (is_array($products_in_cart) || is_object($products_in_cart)) {
            foreach ($products as $product) {
            // $subtotal += (float) $product['price'] * (int) $products_in_cart[$product['ProductID']];?>
            <!-- Product #1 -->
            <div class="item">
                <div class="description">
                    <button type="button" name="button" style="margin-left:10px;border:none;">
                        <i class="fa-solid fa-xmark" style="font-size:18px;color:black;"></i>
                    </button>
                </div>

                <div class="image">

                    <!-- <img src="../images/<?php echo $product['image']; ?>" style="height:90px;width:90px;" /> -->
                </div>

                <div class="description">
                    <span><?php echo $product['productName']; ?></span>
                </div>

                <div class="quantity">
                    <button class="plus-btn" type="button" name="button">
                        <i class="fa-solid fa-plus" style="font-size:18px;color:black;"></i>
                    </button>
                    <!-- <input type="text" name="name" value="<?php echo $qty; ?>"> -->
                    <input type="text" value="<?php $products_in_cart[$product['productID']]?>"
                        name="quantity-<?=$product['productID']?>">
                    <button class="minus-btn" type="button" name="button">
                        <i class="fa-solid fa-minus" style="font-size:18px;color:black;"></i>
                    </button>
                </div>

                <div class="total-price"><?php echo $product['price']; ?></div>
            </div>



            <?php
        }
//  } else {
//     echo 'Handle the case when is not an array or object';
// }



}else{
    echo 'no cart products';
}
     } else {
    echo "Your shopping Cart is empty";
}?>
        </div>
        </setion>


        <?php include "footer.php"?>


        <script src="js/cart.js"></script>
        <script src="../view-hotel/js/home.js"></script>


</body>

</html>