<?php
require '../api/viewtourpackage.php';
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}
if (isset($_GET['productid'])) {$pid = $_GET['productid'];}
// $rows = $_SESSION['c'];
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
    <link rel="stylesheet" href="../css/craft_list.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourist.css">
    <link rel="stylesheet" href="../css/hotel.css">
    <link rel="stylesheet" href="../css/tourpackage.css">

</head>

<body>
    <?php include "header.php"?>
    <h1 class="heading">
        <span>o</span>
        <span>r</span>
        <span>d</span>
        <span>e</span>
        <span>r</span>
        <span class="space"></span>
        <span>n</span>
        <span>o</span>
        <span>w</span>
    </h1>
    <?php
require_once "../controller/productController.php";
$tp = new productController();
$results = $tp->viewproduct($pid);
foreach ($results as $result) {
    ?>
    <section class="hotel1" id="hotel" style="padding: 1rem 9%;">
        <div class="containerimgs" style="width:720px;float:left;">
            <?php
require_once "../controller/productController.php";
    $tp = new productController();
    $rows = $tp->viewAllImgs($pid);
    foreach ($rows as $row) {
        ?>

            <div class="mySlides">
                <?php echo "<img src='../images/" . $row['image'] . "' class='tourimg'>"; ?>
            </div>
            <?php }?>

            <a class="prev" style="margin-left: 73px;top:30%;" onclick="plusSlides(-1)">❮</a>
            <a class="next" style="right: 715px;top:30%;" onclick="plusSlides(1)">❯</a>


            <div class="row" style="margin-left:10%;">
                <?php
require_once "../controller/productController.php";
    $tp = new productController();
    $rows = $tp->viewAllImgs($result['productID']);
    $index = 1;

    foreach ($rows as $row) {
        ?>
                <div class="column">
                    <?php echo "<img src='../images/" . $row['image'] . "' class='demo cursor' style='width:100%' onclick='currentSlide($index)'>"; ?>
                </div>
                <?php
$index++;

    }?>

            </div>
        </div>



        <div class="pkg1" style="padding:30px;margin-top:30px;">
            <form action="../api/addcart.php" method="get">
                <h2><?php echo $result['productName'] ?></h2>
                <h2><?php echo '$ ' . $result['price'] ?></h2>
                <input type="hidden" class="subfield" name="pid" value="<?php echo $result['productID']; ?>" />
                <div class="content">
                    Only <div style="color:red;display:inline;"><?php echo $result['quantity']; ?></div> available
                </div><br>
                Quantity &nbsp;
                <input type="number" class="subfield" style="width:50%;" name="qty" id="qty" min="1"
                    max="<?php echo $result['quantity'];?>" required />
                <div style="display: flex; justify-content: space-evenly;">
                    <button type="submit" class="addcart">Add to cart</button>
                </div>
            </form>
        </div>

    </section>

    <section id="contact" style="padding-bottom: 20px;bottom:0;margin-top:650px;">
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
    <script src="../view-hotel/js/home.js"></script>
    <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";

    }
    </script>
    <?php }?>
</body>

</html>



</html>