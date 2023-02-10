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
  <link rel="stylesheet" href="../css/tourist-tourpackage.css">
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
      <section class="packages" id="packages" style="padding-top = 40px">




      <div class="box-container">

    <div class="box">
        <img src="../images/hotelpackage/hotel1.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Hotel Rodeway Inn</h3>
            <p></p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel2.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Hotel Belmond</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel3.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i>The Hoxton</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="#" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel4.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Hotel Mandarin </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel5.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Seven Seasons Hotels</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel6.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> The Springs</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel7.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i>Coast Hotels</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel8.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Malibu </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel9.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i>Hotel Oceanic</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="#" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel10.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Hotel Sea-Moon</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel11.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Hotel Blue Lagoon</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel12.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Royal Orbit</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel13.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> The Noliton</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel14.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Hotel Sunnyfish </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel15.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i>Green Garden Hotel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="#" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel16.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Livin Hub </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel17.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Hotel Comfy</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/hotelpackage/hotel18.jpg" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Central Loop</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="reservehotel.php" class="btn">book now</a>
        </div>
    </div>
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


    <script src="../view-hotel/js/home.js"></script>
      
</body>
</html>



</html>