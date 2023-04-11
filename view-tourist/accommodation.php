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
        <!-- <form action="">
            <div class="searchSec" style="margin-top:20px;">
                <table>
                    <tr>
                        <th>
                            <div class="text">Destination</div>
                        </th>
                        <th>
                            <div>Check-In</div>
                        </th>
                        <th>
                            <div>Check-Out</div>
                        </th>
                        <th>
                            <div>No.of rooms</div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-container">
                                <input class="input-field" type="text" placeholder="Destination" name="search">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="date" placeholder="check-In" name="search">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="date" placeholder="check-Out" name="search">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="number" placeholder="No.of rooms" name="search"
                                    onfocus="showMessage(true)" onblur="showMessage(false)">

                            </div>

                        </td>
                    </tr>

                </table>

                <button type="submit" class="btns" style="margin-left: 1rem;margin-top:20px;"><a href="roomType.php"
                        style="color:white;text-decoration:none;">Search</a></button>

            </div>
            <p id="dem" style="display:none;">***One room can accommodate only 2 people</p>
        </form> -->


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
                    <h2><?php echo $result['address'];?></h2>
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
    <script>
    function showMessage(show) {
        var messageElement = document.getElementById("dem");
        if (show) {
            messageElement.style.display = "block"; // or "inline"
        } else {
            messageElement.style.display = "none";
        }
    }
    </script>
</body>

</html>