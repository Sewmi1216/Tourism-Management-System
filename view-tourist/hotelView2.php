<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourist.css">

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
    <div class="nav" id="topnav">
        <a href="home.php" class="logo"><img src="../images/logo.png" alt="Logo" height="50px" width="90px"
                style="padding-left:10px;"></a>
        <div style="padding-top:15px;" class="middle">
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            <a href="../view-hotel/hotelLogin.php">Login</a>
            <a href="#contact">Contact Us</a>
            <a href="#about">About</a>
            <a href="../view/accommodation.php">Accommodation</a>
            <a href="../craftlist.php">Handicrafts</a>
            <a href="#tour">Tour Packages</a>
            <a href="../view-hotel/home.php">Home</a>
        </div>
    </div>


    <section class="hotel1" id="hotel" style="padding: 2rem 9%;">
        <div class="container">

            <?php
require_once("../controller/touristController.php") ;
$hotel = new touristController();
$results = $hotel->viewHotel($id);
           foreach ($results as $result) {
               ?>
            <div class="box">
                <table>
                    <tr>
                        <td>
                            <?php echo "<img src='../images/" . $result['profileImg'] . "' style='width:80rem;height:50rem;'>"; ?>
                        </td>

                        <td style="padding:100px;">
                            <div>
                                <h3 style="display: inline;"><?php echo $result['name'];?></h3>
                                <br>
                                <h2><?php echo $result['address'];?></h2>
                                <br>
                                <h2><?php echo $result['email'];?></h2>
                                <br>
                                <h2><?php echo $result['phone'];?></h2>
                                <br>
                                <h2><?php echo $result['address'];?></h2>
                            </div>
                        </td>
                    </tr>
            </div>
            <?php }?>
            </table>
        </div>
    </section>


    <section class="popular" id="hotel" style="padding: 2rem 9%;">
        <form action="">
            <div class="searchSec" style="margin-top:20px;">
                <table>
                    <tr>
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
        </form>


        <div class="container" style="margin-top:30px;">
            <?php
require_once("../controller/roomTypeController.php") ;
$room = new roomTypeController();
$results = $room->viewAllTypes($id);
           foreach ($results as $result) {
               ?>
            <div class="box">



                <div class="slideshow-container">
                    <?php
require_once("../controller/roomTypeController.php") ;
$tp = new roomTypeController();
$rows = $tp->viewAllImgs( $result['roomTypeId']);
           foreach ($rows as $row) {
               ?>
                    <div class="mySlides fade">
                        <?php echo "<img src='../images/" . $row['image'] . "' style='width:100%'>";?>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    <?php } ?>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;"><?php echo $result['typeName'];?></h3>
                    <br>
                    <h2><?php echo $result['description'];?></h2>
                    <br>
                    <h2><?php echo $result['price'];?></h2>
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="reserve.php?typeid=<?php echo $result['roomTypeId'];?>&hotelID=<?php echo $result['hotelID'];?>&price=<?php echo $result['price'];?>"
                        class="btn">Reserve</a>
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
            messageElement.style.display = "block";
        } else {
            messageElement.style.display = "none";
        }
    }

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
</body>

</html>