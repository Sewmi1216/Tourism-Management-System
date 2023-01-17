<?php
session_start();
include '../model/tourist.php';
$tourist = new tourist();
$res2 = $tourist->getallproducts();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Pack2Paradise</title>
  <link rel="stylesheet" href="../css/craft_list.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <style>

header {
  overflow: hidden;
  background-color: #004581;
}
a{
    margin-left:20px;
}
header a {
  float: left;
  color: rgb(255, 255, 255);
  text-align: center;
  padding: 5px;
  text-decoration: none;
  font-size: 15px;
  line-height: 25px;
  border-radius: 4px;
  font-family: sans-serif;
  font-weight: bold;
}

header a.logo {
  font-size: 25px;
  font-weight: bold;
}

/* header a:hover {
  background-color: #ddd;
  color: black;
} */

header a.active {
  background-color: rgb(255, 255, 255);
  color: white;
}

.header-right {
  float: right;
  margin-top: 16px;
  padding-right: 30px;
}
  </style>
</head>

<body>
    <div class="navbar">
<header>
    <a href="home.php" class="logo"><img src="../images/logo.png" alt="Logo" height="50px" width="90px"
            style="margin-left:45px;padding-right:0px;"></a>
    <!-- <div style="font-size: 25px;line-height: 40px;color: rgba(37, 53, 81, 1);margin-top:10px;">Pack2Paradise</div> -->
    <div class="header-right">
        <a href="home.php">HOME</a>
        <a href="#">TOUR PACKAGES</a>
        <a href="#">HANDICRAFTS</a>
        <a href="#">ACCOMODATION</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTACT US</a>
        <a href="../view-hotel/hotelLogin.php">LOGIN</a>
         
    </div>
</header>
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

      <div class="navbar-2">
        <a class="all" href="#">All Products</a>
        <a class="dress" href="#">Black Dresses</a>
        <a class="ornament" href="#">Ornaments</a>
        <a class="drawing" href="#">Drawings</a>
      </div>
  <?php
$result = mysqli_fetch_assoc($res2);

?>
      <div class="gown">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['productImg'] ?>"/></a>
        <p>Batik Dress<br><br>View  &nbsp; &nbsp; &nbsp; price</p>
      </div>

      <?php $result = mysqli_fetch_assoc($res2);?>

      <div class="bag">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['productImg'] ?>"/> </a>
        <p>Batik Bag<br><br>View</p>
      </div>
      <?php $result = mysqli_fetch_assoc($res2);?>
      <div class="showl">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"> <img src="../img/<?php echo $result['productImg'] ?>"/> </a>
        <p>Batik Printed Scarf<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2);?>
      <div class="gold">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['productImg'] ?>"/> </a>
        <p>Decorative Clay Pot<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2);?>
      <div class="gold-elephant">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['productImg'] ?>"/></a>
        <p>Elephant<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2);?>
      <div class="clay-pot">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['productImg'] ?>"/></a>
        <p>Clay Pots<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2);?>
      <div class="art">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['productImg'] ?>"/></a>
        <p>Art Handicraft<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2);?>
      <div class="perahera">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['productImg'] ?>"/></a>
        <p>Perahera Art<br><br>View</p>
      </div>
      



</body>
</html>