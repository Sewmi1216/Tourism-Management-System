<?php 
require('../api/viewtourpackage.php');
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}
if (isset($_GET['pid'])) {$pid = $_GET['pid'];}
// $rows = $_SESSION['c'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tour Package</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/craft_list.css">

    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourist.css">
    <link rel="stylesheet" href="../css/hotel.css">
    <link rel="stylesheet" href="../css/tourpackage.css">
</head>

<body>
    <?php include "header.php"?>
    <?php
require_once("../controller/touristController.php") ;
$tp = new touristController();
$results = $tp->viewTourPkg($pid);
           foreach ($results as $result) {
               ?>
    <section class="hotel1" id="hotel" style="padding: 2rem 9%;">

        <div class="cont">
            <div class="search">
                <h1><?php echo $result['packageName'] ?></h1>
            </div>
        </div>
        <div class="containerimgs">
            <?php
require_once "../controller/tourpackagecontroller.php";
$tp = new tourpackageController();
$rows = $tp->viewAllImgs($result['packageID']);
foreach ($rows as $row) {
    ?>

            <div class="mySlides">
                <?php echo "<img src='../images/" . $row['image'] . "' class='tourimg'>";?>
            </div>
            <?php }?>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>


            <div class="row" style="margin-left:10%;">
                <?php
require_once "../controller/tourpackagecontroller.php";
$tp = new tourpackageController();
$rows = $tp->viewAllImgs($result['packageID']);
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

    </section>
    <section class="hotel2" id="hotel" style="padding: 2rem 9%;">
        <div class="container">

            <div class="pkg" style="padding:30px;">
                <div class="vl"></div>
                <p><?php echo $result['description'] ?></p>
            </div>

            <div class="pkg1" style="padding:30px;">
                <div class="new">
                    <div class="price">$ <?php echo $result['price'] ?></div>
                    <div style="color: darkgray;font-size: 20px;">per person</div>
                </div>
                <h1>Reserve Now !</h1>
            </div>
            <div class="pkg1" style="padding:30px;margin-top:30px;">
                <form action="../api/tourbooking.php" method="post">

                    <h2>Reservation</h2>
                    <input type="hidden" class="subfield" style="width:100%;" name="tid" value="<?php echo $id ?>" />
                    <input type="hidden" class="subfield" style="width:100%;" name="pid" value="<?php echo $pid ?>" />
                    <div class="content">Name*</div>
                    <input type="text" class="subfield" style="width:100%;" name="name" required/>

                    <div class="content">Email Address*</div>
                    <input type="text" class="subfield"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" style="width:100%;" name="email" required/>

                    <div class="content">Mobile Number*</div>
                    <input type="text" class="subfield" pattern="[0-9]{10}" style="width:100%;" name="phone" required/>

                    <div class="content">Number of travelers*</div>
                    <input type="number" class="subfield" style="width:100%;" min="0" name="traverler" required/>

                    <div class="content">Arrival Date*</div>
                    <input type="date" class="subfield" style="width:100%;" id="start" name="adate" required/>

                    <div class="content">Departure Date*</div>
                    <input type="date" class="subfield" style="width:100%;" id="end" name="ddate" required/>

                    <div class="content">Prefered Vehicle Type*</div>
                    <input type="text" class="subfield" style="width:100%;" name="vehicle" required/>

                    <div class="content">Total amount</div>
                    <input type="text" class="subfield" style="width:100%;" name="tot_amount" readonly/>

                    <div style="margin-top:20px;margin-left:120px;">
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_51MlRwNLkwnMeV4KrakhfHzMSWe8uOGMTgdxT6UBukJUP0AJB9memAAlcnkBEShf1HWwMH3wFaBV1XROZ7TQidM5y00OM0lgTax">
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php } ?>
    <section id="contact" style="padding-bottom: 20px;bottom:0;margin-top:1000px;">
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
    const price = <?php echo $result['price'] ?>;
    const inputTravelers = document.querySelector('input[name="traverler"]');
    const inputAmount = document.querySelector('input[name="tot_amount"]');

    inputTravelers.addEventListener('input', () => {
        const travelers = inputTravelers.value;
        const totalAmount = price * travelers;
        inputAmount.value = totalAmount;
    });
    </script>

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

 <script>
    $("#end").change(function() {
        var startDate = document.getElementById("start").value;
        var endDate = document.getElementById("end").value;

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alert("End date should be greater than Start date");
            document.getElementById("end").value = "";
        }
    });
    </script>
</body>

</html>



</html>