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
</head>

<body>
    <div class="navbar">
        
        <ul>
          <img src="../img/Travel and Tourism Logo 2.png" alt=" logo" style="width:80px;height:50px; margin-left: 22px; margin-top: 8px;" >

        <a class="home" href="#">HOME</a>
        <a class="package" href="#">TOUR PACKAGES</a>
        <a class="craft" href="#">HANDICRAFTS</a>
        <a class="hotel" href="#">ACCOMODATION</a>
        <a class="about" href="#">ABOUT</a>
        <a class="contact" href="#">CONTACT US</a>

    

          <div class="login-btn">
          <a class="login-text" href="../api/logout.php">LOG OUT</a>
          </div>
       
        </ul>
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
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['product_img'] ?>"/></a>
        <p>Batik Dress<br><br>View  &nbsp; &nbsp; &nbsp; price</p>
      </div>

      <?php $result = mysqli_fetch_assoc($res2); ?>

      <div class="bag">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['product_img'] ?>"/> </a>
        <p>Batik Bag<br><br>View</p>
      </div>
      <?php $result = mysqli_fetch_assoc($res2); ?>
      <div class="showl">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"> <img src="../img/<?php echo $result['product_img'] ?>"/> </a>
        <p>Batik Printed Scarf<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2); ?>
      <div class="gold">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['product_img'] ?>"/> </a>
        <p>Decorative Clay Pot<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2); ?>
      <div class="gold-elephant">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['product_img'] ?>"/></a>
        <p>Elephant<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2); ?>
      <div class="clay-pot">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['product_img'] ?>"/></a>
        <p>Clay Pots<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2); ?>
      <div class="art">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['product_img'] ?>"/></a>
        <p>Art Handicraft<br><br>View</p>
      </div>
<?php $result = mysqli_fetch_assoc($res2); ?>
      <div class="perahera">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img src="../img/<?php echo $result['product_img'] ?>"/></a>
        <p>Perahera Art<br><br>View</p>
      </div>


      
</body>
</html>