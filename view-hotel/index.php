<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<body>
    <!-- <div class="navbar"> -->
    <header>
        <a href="home.php" class="logo"><img src="../images/logo.png" alt="Logo" height="50px" width="90px"
                style="margin-left:45px;padding-right:0px;"></a>
        <!-- <div style="font-size: 25px;line-height: 40px;color: rgba(37, 53, 81, 1);margin-top:10px;">Pack2Paradise</div> -->
        <div id="menu" class="fa fa-caret-down" style="color:black;"></div>
        <div class="header-right">
            <a href="home.php">Home</a>
            <a href="#">Tour Packages</a>
            <a href="#">Handicrafts</a>
            <a href="#">Accommodation</a>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
            <a href="../view-hotel/hotelLogin.php">Login</a>

        </div>
    </header>
    <!-- </div> -->



    <div class="text-box">
        <p class="text-1">MAKE YOURSELF AT HOME</p>
        <br><br>
        <p class="text-2">We are a small island with big hearts. Wherever you may find yourself in Sri Lanka, rest easy
            knowing that an open door is never too far away.</p>
        <br><br>
        <p class="text-3">BOOK TOUR PACKAGES NOW >></p>
    </div>

    <div class="lankan-img">
        <img src="../img/24545515_357 [Converted] 1.png" />
    </div>

    <div class="silverpot">
        <p>Recommended Crafts from Us</p>
        <img src="../img/silver_pot.png" />
    </div>

    <div class="elephant-statue">
        <img src="../img/elephant_statue.png" />
    </div>

    <div class="saree">
        <img src="../img/green_saree.png" />
    </div>

    <div class="elephant">
        <img src="../img/leaf_elephant.png" />
    </div>

    <div class="palmyrah">
        <img src="../img/plamyrah_products.png" />
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
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img
                src="../img/<?php echo $result['productImg'] ?>" /></a>
        <p>Batik Dress<br><br>View &nbsp; &nbsp; &nbsp; price</p>
    </div>

    <?php $result = mysqli_fetch_assoc($res2);?>

    <div class="bag">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img
                src="../img/<?php echo $result['productImg'] ?>" /> </a>
        <p>Batik Bag<br><br>View</p>
    </div>
    <?php $result = mysqli_fetch_assoc($res2);?>
    <div class="showl">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"> <img
                src="../img/<?php echo $result['productImg'] ?>" /> </a>
        <p>Batik Printed Scarf<br><br>View</p>
    </div>
    <?php $result = mysqli_fetch_assoc($res2);?>
    <div class="gold">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img
                src="../img/<?php echo $result['productImg'] ?>" /> </a>
        <p>Decorative Clay Pot<br><br>View</p>
    </div>
    <?php $result = mysqli_fetch_assoc($res2);?>
    <div class="gold-elephant">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img
                src="../img/<?php echo $result['productImg'] ?>" /></a>
        <p>Elephant<br><br>View</p>
    </div>
    <?php $result = mysqli_fetch_assoc($res2);?>
    <div class="clay-pot">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img
                src="../img/<?php echo $result['productImg'] ?>" /></a>
        <p>Clay Pots<br><br>View</p>
    </div>
    <?php $result = mysqli_fetch_assoc($res2);?>
    <div class="art">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img
                src="../img/<?php echo $result['productImg'] ?>" /></a>
        <p>Art Handicraft<br><br>View</p>
    </div>
    <?php $result = mysqli_fetch_assoc($res2);?>
    <div class="perahera">
        <a href="./order.php?product=<?php echo $result['productID'] ?>"><img
                src="../img/<?php echo $result['productImg'] ?>" /></a>
        <p>Perahera Art<br><br>View</p>
    </div>




</body>

</html>