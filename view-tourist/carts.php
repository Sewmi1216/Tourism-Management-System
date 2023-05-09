<?php
require '../api/viewtourpackage.php';
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
        echo "<script>alert('Your Cart has been Updated');</script>";
        echo "<script type='text/javascript'> document.location ='../view-tourist/carts.php'; </script>";

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
        echo "<script>alert('Your Cart hasbeen Updated');</script>";
    }
}


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
            <form method="post">

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
                    <div class="total-price" style="width:140px;color:blue;font-weight: bold;"><span>Total price</span>
                    </div>
                </div>
                <?php
if (!empty($_SESSION['cart'])) {

 $pdtid=array();
 require_once "../controller/touristController.php";
$cart = new touristController();
$products = $cart->viewCartItems($_SESSION['cart']);
$totalprice=0;
			$totalqunty=0;
			if(!empty($products)){
			while($row = mysqli_fetch_array($products)){
				$quantity = $_SESSION['cart'][$row['productID']]['quantity'];
                $subtotal = $row['price']* $quantity;
                $totalprice += $subtotal;
                $_SESSION['qnty'] = $totalqunty += $quantity;
                array_push($pdtid, $row['productID']);
?>

                <!-- Product #1 -->
                <div class="item">
                    <div class="description">
                        <!-- <button type="button" name="submit" value="<?php echo $row['productID']?>"
                            style="margin-left:10px;border:none;">
                            <a href="carts.php?remove=<?php echo $row['productID']?>">
                                <i class="fa-solid fa-xmark" style="font-size:18px;color:black;"></i>
                            </a>
                        </button> -->
                        <input type="checkbox" name="remove[]" value="<?php echo htmlentities($row['productID']);?>"/>
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
                        <!-- <button class="plus-btn" type="button" name="button">
                        <i class="fa-solid fa-plus" style="font-size:18px;color:black;"></i>
                    </button> -->
                        <!-- <input type="text" name="name" value="<?php echo $qty; ?>"> -->
                        <input type="text" id="qty"
                            value="<?php echo $_SESSION['cart'][$row['productID']]['quantity']?>"
                            name="quantity-<?=$row['productID']?>">
                        <!-- <button class="minus-btn" type="button" name="button">
                        <i class="fa-solid fa-minus" style="font-size:18px;color:black;"></i>
                    </button> -->
                    </div>


                    <div class="total-price" id="price"><?php echo $row['price']; ?></div>
                    <div class="total-price" id="subtotal"><?php echo '$ '.$subtotal.'.00';?>
                    </div>
                    
                </div>
                
                <?php
        }
 } 
$_SESSION['pid']=$pdtid;?>
<input type="submit" name="submit" value="Update shopping cart">
<?php 

     } else {
    echo "You have no products added in your Shopping Cart";
}?>

            </form>
        </div>
        </setion>


        <?php include "footer.php"?>


        // <script>
        //       $(document).ready(function() {
        //     // Calculate subtotal when the quantity changes
        //     $('#qty').on('input', function() {
        //         var quantity = parseFloat($(this).val());
        //         var price = parseFloat($('#price').text());
        //         var subtotal = quantity * price;

        //         // Display the subtotal value
        //         $('#subtotal').text(subtotal.toFixed(2)); // Assuming you want to display the value with two decimal places
        //     });

        //     // Calculate and display the initial subtotal
        //     var initialQuantity = parseFloat($('#qty').val());
        //     var initialPrice = parseFloat($('#price').text());
        //     var initialSubtotal = initialQuantity * initialPrice;
        //     $('#subtotal').text(initialSubtotal.toFixed(2));
        // });
        //     
        </script>
        <script src="js/cart.js"></script>
        <script src="../view-hotel/js/home.js"></script>


</body>

</html>