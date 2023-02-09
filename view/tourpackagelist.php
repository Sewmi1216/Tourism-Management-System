<?php 
session_start();
include '../model/tourist.php';
$tourist = new tourist();
$res2 = $tourist->getallproducts();

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

    <!-- <div class="search">
        <input type="text" placeholder="Search by Location">
        <img src="../img/Union.png"/>
      </div> -->

      <!-- <div class="silverpot">
        <p>Recommended Crafts from Us</p>
        <img src="../images/forest.png"/>
      </div>

      <div class="elephant-statue">
        <img src="../images/img2.png"/>
      </div>

      <div class="saree">
        <img src="../images/img3.png"/>
      </div>

      <div class="elephant">
        <img src="../images/img4.png"/>
      </div>

      <div class="palmyrah">
        <img src="../images/img5.png"/>
      </div>
 -->



      <section class="packages" id="packages" style="padding-top = 40px">

<!-- <h1 class="heading">
    <span>p</span>
    <span>a</span>
    <span>c</span>
    <span>k</span>
    <span>a</span>
    <span>g</span>
    <span>e</span>
    <span>s</span>
</h1> -->

<div class="box-container">

    <div class="box">
        <img src="../images/kandy.png" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Middle Through </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="booktourpackage.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/anuradhapura.png" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Roam Anuradha </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="booktourpackage.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/polannaruwa.png" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Heritage Steer </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="booktourpackage.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/galle.png" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Galle Quest </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="booktourpackage.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/sinharaja.png" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Jungle Jaunt </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="booktourpackage.php" class="btn">book now</a>
        </div>
    </div>

    <div class="box">
    <img src="../images/colombo.png" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> Capital Ride </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> $90.00 <span>$120.00</span> </div>
            <a href="booktourpackage.php" class="btn">book now</a>
        </div>
    </div>
    <div class="box-container">

<div class="box">
    <img src="../images/kandy.png" alt="">
    <div class="content">
        <h3> <i class="fas fa-map-marker-alt"></i> Middle Through </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <div class="price"> $90.00 <span>$120.00</span> </div>
        <a href="booktourpackage.php" class="btn">book now</a>
    </div>
</div>

<div class="box">
<img src="../images/anuradhapura.png" alt="">
    <div class="content">
        <h3> <i class="fas fa-map-marker-alt"></i> Roam Anuradha </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <div class="price"> $90.00 <span>$120.00</span> </div>
        <a href="booktourpackage.php" class="btn">book now</a>
    </div>
</div>

<div class="box">
<img src="../images/polannaruwa.png" alt="">
    <div class="content">
        <h3> <i class="fas fa-map-marker-alt"></i> Heritage Steer </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <div class="price"> $90.00 <span>$120.00</span> </div>
        <a href="booktourpackage.php" class="btn">book now</a>
    </div>
</div>

<div class="box">
<img src="../images/galle.png" alt="">
    <div class="content">
        <h3> <i class="fas fa-map-marker-alt"></i> Galle Quest </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <div class="price"> $90.00 <span>$120.00</span> </div>
        <a href="booktourpackage.php" class="btn">book now</a>
    </div>
</div>

<div class="box">
<img src="../images/sinharaja.png" alt="">
    <div class="content">
        <h3> <i class="fas fa-map-marker-alt"></i> Jungle Jaunt </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <div class="price"> $90.00 <span>$120.00</span> </div>
        <a href="booktourpackage.php" class="btn">book now</a>
    </div>
</div>

<div class="box">
<img src="../images/colombo.png" alt="">
    <div class="content">
        <h3> <i class="fas fa-map-marker-alt"></i> Capital Ride </h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <div class="price"> $90.00 <span>$120.00</span> </div>
        <a href="booktourpackage.php" class="btn">book now</a>
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