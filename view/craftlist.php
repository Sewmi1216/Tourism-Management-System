<?php 
session_start();
include '../model/tourist.php';
$tourist = new tourist();
$res2 = $tourist->getallproducts();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Craft List</title>
  <link rel="stylesheet" href="../css/craft_list.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <link rel="stylesheet" href="../css/hindex.css">
</head>

<body>
<div class="nav" id="topnav">
        <a href="home.php" class="logo"><img src="../images/logo.png" alt="Logo" height="50px" width="90px"
                style="padding-left:10px;"></a>
        <div style="padding-top:15px;" class="middle">
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            <a href="../view-hotel/hotelLogin.php">Log out</a>
            <a href="#contact">Contact Us</a>
            <a href="#about">About</a>
            <a href="hotellist.php">Accommodation</a>
            <a href="craftlist.php">Handicrafts</a>
            <a href="tourpackagelist.php">Tour Packages</a>
            <a href="home2.php">Home</a>
        </div>
    </div>

    <div class="search">
        <input type="text" placeholder="Search by Location">
        <img src="../img/Union.png"/>
      </div>


      <div class="text-box">
        <p class="text-1">MAKE YOURSELF AT HOME</p>
        <br><br>
        <p class="text-2">We are a small island with big hearts. Wherever you may find yourself in Sri Lanka, rest easy knowing that an open door is never too far away.</p>
        <br><br>
        <p class="text-3">BOOK TOUR PACKAGES NOW >></p>
      </div>

      <div class="lankan-img">
        <img src="../img/24545515_357 [Converted] 1.png"/>
      </div>

      <div class="silverpot">
        <p>Recommended Crafts from Us</p>
        <img src="../img/silver_pot.png"/>
      </div>

      <div class="elephant-statue">
        <img src="../img/elephant_statue.png"/>
      </div>

      <div class="saree">
        <img src="../img/green_saree.png"/>
      </div>

      <div class="elephant">
        <img src="../img/leaf_elephant.png"/>
      </div>

      <div class="palmyrah">
        <img src="../img/plamyrah_products.png"/>
      </div>

      <div class="mid-text">
        <p>New Products</p>
      </div>









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
      
</body>
</html>



</html>