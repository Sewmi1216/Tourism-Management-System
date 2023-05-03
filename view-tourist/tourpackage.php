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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/craft_list.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
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
            <div class="mySlides">
                <img src="../images/bg2.jpg" class="tourimg">
            </div>
            <div class="mySlides">
                <img src="../images/bg4.jpg" class="tourimg">
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            <div class="row" style="margin-left:10%;">
                <div class="column">
                    <img class="demo cursor" src="../images/bg2.jpg" style="width:100%" onclick="currentSlide(1)"
                        alt="The Woods">
                </div>
                <div class="column">
                    <img class="demo cursor" src="../images/bg4.jpg" style="width:100%" onclick="currentSlide(2)"
                        alt="The Woods">
                </div>
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
                    <input type="text" class="subfield" style="width:100%;" name="name" />

                    <div class="content">Email Address*</div>
                    <input type="text" class="subfield" style="width:100%;" name="email" />

                    <div class="content">Mobile Number*</div>
                    <input type="text" class="subfield" style="width:100%;" name="phone" />

                    <div class="content">Number of travelers*</div>
                    <input type="number" class="subfield" style="width:100%;" name="traverler" />

                    <div class="content">Arrival Date*</div>
                    <input type="date" class="subfield" style="width:100%;" name="adate" />

                    <div class="content">Departure Date*</div>
                    <input type="date" class="subfield" style="width:100%;" name="ddate" />

                    <div class="content">Total amount</div>
                    <input type="text" class="subfield" style="width:100%;" name="tot_amount" />

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
    <?php include "footer.php"?>

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
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
    </script>

</body>

</html>



</html>