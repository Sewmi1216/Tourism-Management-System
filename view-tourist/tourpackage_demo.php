<?php
require '../api/viewtourpackage.php';
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
    <link rel="stylesheet" href="../css/craft_list.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourist-tourpackage.css">
</head>

<body>
    <?php include "header.php"?>
    <section class="hotel1" id="hotel" style="padding: 2rem 9%;">
        <!-- <?php
require_once "../controller/touristController.php";
$tp = new touristController();
$rows = $tp->viewAllTourImgs($pid);
foreach ($rows as $key => $row) {?> -->

        <div class="containerimgs"></div>
        <div class="mySlides">
            <img src="../images/bg2.jpg" class="tourimg">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div class="row" style="margin-left:10%;">
            <div class="column">
                <img class="demo cursor" src="../images/bg2.jpg" style="width:100%" onclick="currentSlide(1)"
                    alt="The Woods">
            </div>

        </div>



        <!-- <?php echo "<img src='../images/" . $result['profileImg'] . "' style='width:80rem;height:50rem;'>"; ?> -->

        <!-- <?php }?> -->

        </div>
    </section>


    <section class="popular" id="hotel" style="padding: 2rem 9%;">


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