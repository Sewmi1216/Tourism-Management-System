<?php
require '../api/viewtourpackage.php';
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourist.css">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <style>
    html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-padding-top: 6rem;
        scroll-behavior: smooth;
    }
    </style>
</head>

<body>
    <?php include "header.php"?>


    <section class="popular" id="hotel" style="padding: 2rem 9%;">
        <div class="cont">
            <div class="search">
                <h1>All Hotels</h1>
                <input type="text" name="" id="find" onfocus="this.placeholder=''" placeholder="search location...." onkeyup="search()">
            </div>
        </div>

        <div class="container">
            <?php
require_once("../controller/touristController.php") ;
$hotel = new touristController();
$results = $hotel->viewAllHotels();
           foreach ($results as $result) {
               ?>
            <div class="box">
                <?php echo "<img src='../images/" . $result['profileImg'] . "'>"; ?>

                <div class="content-container">
                    <h3 style="display: inline;"><?php echo $result['name'];?></h3>
                    <br>
                    <h2><i class="fa-solid fa-location-dot"></i> &nbsp;&nbsp;<?php echo $result['address'];?></h2>
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="hotelView.php?id=<?php echo $result['hotelID']; ?>" class="btn">Select</a>
                </div>
            </div>
            <?php }?>
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
    <script type="text/javascript">
    // function showMessage(show) {
    //     var messageElement = document.getElementById("dem");
    //     if (show) {
    //         messageElement.style.display = "block"; // or "inline"
    //     } else {
    //         messageElement.style.display = "none";
    //     }
    // }
    function search() {
        let filter = document.getElementById('find').value.toUpperCase();
        let hotel = document.querySelectorAll('.box');
        let tag = document.getElementsByTagName('h2');

        for (var i = 0; i <= tag.length; i++) {
            let x = hotel[i].getElementsByTagName('h2')[0];
            let value = x.innerHTML || x.innerText || x.textContent;

            if (value.toUpperCase().indexOf(filter) > -1) {
                hotel[i].style.display = "";
            } else {
                hotel[i].style.display = "none";
            }
        }
    }
    </script>
</body>

</html>