<?php
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}
if (isset($_POST['remove'])) {

    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['remove'] as $key) {

            unset($_SESSION['cart'][$key]);
        }
        // echo "<script>alert('Your Cart has been Updated');</script>";
        echo "<script type='text/javascript'> document.location ='../view-tourist/cart.php'; </script>";

    }
}
if (isset($_POST['submit'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;

            }
        }
        echo "<script>alert('Your Cart has been Updated');</script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tour Package</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourpackage.css">
    <link rel="stylesheet" href="../css/hotel.css">

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

    <section class="hotel1" id="hotel" style="margin-bottom: 50px;">
        <div class="shopping-cart containerimgs">
            <form method="post">

                <div class="item">
                    <div class="description" style="color:blue;  font-weight: bold;">
                        <span>Remove</span>
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
                    <div class="total-price" style="width:140px;color:blue;font-weight: bold;"><span>Total price</span>
                    </div>
                </div>
                <?php
if (!empty($_SESSION['cart'])) {

    $pdtid = array();
    require_once "../controller/touristController.php";
    $cart = new touristController();
    $products = $cart->viewCartItems($_SESSION['cart']);
    $totalprice = 0;
    $grossTotal = 0;

    $totalqunty = 0;
    if (!empty($products)) {
        while ($row = mysqli_fetch_array($products)) {
            $quantity = $_SESSION['cart'][$row['productID']]['quantity'];
            $subtotal = $row['price'] * $quantity;
            $totalprice += $subtotal;
            $grossTotal += $subtotal;
            $_SESSION['qnty'] = $totalqunty += $quantity;
            array_push($pdtid, $row['productID']);
            ?>

                <!-- Product #1 -->
                <div class="item">
                    <div class="description">
                        <input type="checkbox" name="remove[]" value="<?php echo htmlentities($row['productID']); ?>" />
                    </div>

                    <div class="image">
                        <?php
require_once "../controller/productController.php";
            $tp = new productController();
            $results = $tp->viewAllImgs($row['productID']);
            foreach ($results as $res) {?>

                        <img src="../images/<?php echo $res['image']; ?>" style="height:90px;width:90px;" />

                        <?php
break;
            }?>
                    </div>

                    <div class="description">
                        <span><?php echo $row['productName']; ?></span>
                    </div>

                    <div class="quantity">
                        <input type="number" id="qty"
                            value="<?php echo $_SESSION['cart'][$row['productID']]['quantity'] ?>"
                            name="quantity<?php echo $row['productID']; ?>" readonly>
                    </div>


                    <div class="total-price" id="price"><?php echo $row['price']; ?></div>
                    <div class="total-price" id="subtotal"><?php echo '$ ' . $subtotal . '.00'; ?>
                    </div>

                </div>

                <?php
}
    }
    $_SESSION['pid'] = $pdtid;
// echo "<pre>";
// print_r($pdtid);
// echo "</pre>";
    ?>

                <?php

} else {?>
                <div style="text-align:center;">You have no products added in your Shopping Cart</div>
                <?php
}?>


                <div class="buttons">
                    <a href="craftlist.php" style="margin-right:10px;">Continue Shopping</a>
                    <input type="submit" value="Update" name="submit">
                </div>
            </form>
        </div>


        </setion>
        <form action="../api/craftorder.php" method="post" id="secondForm">
            <div class="pkg1"
                style="float:left;padding:30px;margin-top:30px;margin-bottom:20px;margin-left:150px;width:740px;height:auto;">
                <div class="subtotal">
                    <input type="hidden" name="subtotalInput" id="subtotalInput" value="" readonly>

                    <input type="hidden" value="<?php echo $_SESSION["email"]; ?>" class="subfield" name="email"
                        style="width:60%" /></br>
                    <input type="hidden" value="<?php echo $id; ?>" class="subfield" name="tid"
                        style="width:60%" /></br>
                    <input type="hidden" value="<?php if (isset($subtotal)) {echo $grossTotal;}?>" name="total" /></br>
                    <span class="text" style="font-size:23px;font-weight:bold;">Order Details
                        &nbsp;&nbsp;&nbsp;</span>
                    <?php
if (!empty($_SESSION['cart'])) {
    $cart = new touristController();
    $products = $cart->viewCartItems($_SESSION['cart']);
    if (!empty($products)) {
        while ($row = mysqli_fetch_array($products)) {
            $quantity = $_SESSION['cart'][$row['productID']]['quantity'];
            ?>
                    <input type="hidden" id="hiddenQty<?php echo $row['productID']; ?>"
                        name="hiddenQty<?php echo $row['productID']; ?>" value="<?php echo $quantity; ?>">
                    <?php
}
    }
}
?>
                    <hr>
                    <span class="text" style="font-size:18px;font-weight:bold;">Customer Name
                        &nbsp;&nbsp;&nbsp;</span>
                    <input type="text" name="cname" class="subfield" id="cname" style="width:60%"
                        required /></br>
                    <span class="text" style="font-size:18px;font-weight:bold;">Customer Phone
                        &nbsp;&nbsp;</span>
                    <input type="text" name="cphone" pattern="[0-9]{10}" id="cphone" class="subfield" style="width:60%"
                         required /></br>
                    <span class="text" style="font-size:18px;font-weight:bold;">Billing Address
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="text" name="caddress" id="caddress" class="subfield" style="width:60%"
                        required />
                </div>
            </div>
            <div class="pkg1" style="padding:30px;margin-top:30px;margin-right:150px;">
                <div class="subtotal">
                    <span class="text" style="font-size:20px;color:red;font-weight:bold;">GRAND TOTAL
                        &nbsp;&nbsp;&nbsp;</span>
                    <span class="price">
                        <?php if (isset($subtotal)) {echo '$ ' . $grossTotal . '.00';}?>
                    </span>
                    <div style="margin-top:35px;margin-left:100px;">
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            style="background: #004581"
                            data-key="pk_test_51MlRwNLkwnMeV4KrakhfHzMSWe8uOGMTgdxT6UBukJUP0AJB9memAAlcnkBEShf1HWwMH3wFaBV1XROZ7TQidM5y00OM0lgTax">
                        </script>
                    </div>
                </div>
            </div>
        </form>
        <section id="contact" style="padding-bottom: 20px;bottom:0;margin-top:700px;">
            <div style="text-align:center; padding: 10px;">
                <h2 class="" style="color: #70706c;font-size:30px;">CONTACT US</h2>
                <div style="color: #babab3;font-size: 17px;padding-top: 50px">
                    <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Telephone</div>
                    <div>+94 -11- 2581245/ 7</div>

                    <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Fax</div>
                    <div>+94-11-2237239</div>

                    <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Email</div>
                    <div>info@pack2paradise.lk</div>
                </div>
            </div>
        </section>
        <script>
        <?php
if (!empty($products)) {
    while ($row = mysqli_fetch_array($products)) {
        ?>
        const qtyInput<?php echo $row['productID']; ?> = document.getElementById('qty<?php echo $row['productID']; ?>');
        const hiddenQtyInput<?php echo $row['productID']; ?> = document.getElementById(
            'hiddenQty<?php echo $row['productID']; ?>');

        qtyInput<?php echo $row['productID']; ?>.addEventListener('change', function() {
            hiddenQtyInput<?php echo $row['productID']; ?>.value = qtyInput<?php echo $row['productID']; ?>
                .value;
        });
        <?php
}
}
?>
        </script>
        <script>
        var subtotal = document.getElementById('subtotal').innerText;
        subtotal = subtotal.replace('$ ', '').replace('.00', '');
        document.getElementById('subtotalInput').value = subtotal;
        </script>
        <script src="js/cart.js"></script>
        <script src="../view-hotel/js/home.js"></script>
        <script>
        function checkInput() {
            var inputValue = document.getElementById("cname").value;
            var inputValue = document.getElementById("cphone").value;
            var inputValue = document.getElementById("caddress").value;

            if (inputValue === "") {
                alert("Input field is empty!");
            }
        }
        </script>

</body>

</html>