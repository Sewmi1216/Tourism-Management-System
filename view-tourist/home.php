<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location: http://localhost/Tourism-Management-System/view-hotel/login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "header.php"?>
    <!-- home -->
    <section class="home" id="home">
        <div class="content">
            <h3>Taking you to the <br> best places</h3>
            <h2>No matter where you're going from, we take you there<br> We are professional planners for your vacation.
            </h2>
        </div>
    </section>


    <!-- tour packages -->
    <section class="popular" id="tour" style="padding: 2rem 9%;">
        <h1 class="heading" style="text-align:center;">Explore Sri Lankan tour packages</h1>
        <hr>
        <div class="container">
            <?php
require_once "../controller/touristController.php";
$tour = new touristController();
$results = $tour->viewAllTourPackages();
$counter = 0;
foreach ($results as $result) {
     if ($counter >= 3) {
            break; // Break the loop after displaying the first 3 tour packages
        }
    ?>
            <div class="box">
                <?php
require_once "../controller/tourpackagecontroller.php";
    $tp = new tourpackageController();
    $rows = $tp->viewAllImgs($result['packageID']);
   foreach ($rows as $index => $row) {
        
                if ($index == 0) { // Only display the first image
    ?>
                <?php echo "<img src='../images/" . $row['image'] . "'>"; ?>

                <?php }}?>

                <div class="content-container">
                    <h3 style="display: inline;"><?php echo $result['packageName'];?></h3>
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="tourpackage.php?pid=<?php echo $result['packageID']; ?>" class="btn">View</a>
                </div>
            </div>

            <?php $counter++;
}?>

        </div>
    </section>

    <!-- hotels -->
    <section class="popular" id="hotel" style="padding: 2rem 9%;">
        <h1 class="heading" style="text-align:center;">Explore Sri Lankan hotels</h1>
        <hr>

        <div class="container">
            <?php
require_once("../controller/touristController.php") ;
$hotel = new touristController();
$results = $hotel->viewAllHotels();
$count = 0;
           foreach ($results as $result) {
            if ($count >= 3) {
            break; // Break the loop after displaying the first 3 tour packages
        }
               ?>
            <div class="box">
                <?php echo "<img src='../images/" . $result['profileImg'] . "'>";?>

                <div class="content-container">
                    <h3 style="display: inline;"><?php echo $result['name'];?></h3>
                </div>
                <div style="display: flex; justify-content: center;">
                    <a href="hotelView.php?hid=<?php echo $result['hotelID']; ?>" class="btn">Select</a>
                </div>
            </div>
            <?php $count++;
}?>
        </div>
    </section>

    <!-- handicrafts -->
    <section class="popular" id="handi" style="padding: 2rem 9%;">
        <h1 class="heading" style="text-align:center;">Explore Sri Lankan handicrafts</h1>
        <hr>
        <div class="container">
            <?php
require_once("../controller/productController.php") ;
$hotel = new productController();
$results = $hotel->getProducts();
$cnt= 0;
           foreach ($results as $result) {
            if ($cnt >= 3) {
            break; // Break the loop after displaying the first 3 tour packages
        }
               ?>
            <div class="box">
                <img src="../images/bathik saree.jpg" alt="">
                <div class="content-container">
                    <h3 style="display: inline;"><?php echo $result['productName'];?> </h3>
                </div>
                <div style="display: flex; justify-content: center;">
                    <a href="craft.php?productid=<?php echo $result['productID']; ?>" class="btn">View</a>
                </div>
            </div>
             <?php $cnt++;
}?>

        </div>
    </section>



    <!-- about us -->
    <section class="about" id="about" style="padding: 2rem 9%;">
        <div class="container">
            <div class="image">
                <img src="../img/24545515_357 [Converted] 1.png" alt="">
            </div>
            <div class="content">
                <h1 class="heading">Pack2Paradise</h1>
                <hr>
                <p>
                    Welcome to Pack2Paradise, the most unique platform that connects the tourist with the Trip planners,
                    local entrepreneurs and the tourist guides.
                    <br>
                    <br>

                    Our vision is to connect the tourist with the small and medium scale Hotels, Small entrepreneurs and
                    to provide them a memorable vacation through providing the tour packages with great tourist guides.
                    <br>
                </p>
            </div>
        </div>
    </section>



    <section id="contact" style="padding-bottom: 20px">
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


    <script src="js/home.js"></script>
</body>

</html>