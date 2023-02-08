<?php 
require('../api/viewtourpackage.php');
$rows = $_SESSION['c'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/packagedescription.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/tourpackage.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&display=swap" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&family=Montserrat:wght@500&display=swap');
</style>

</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
    


    <div class="content">
    <h1 style="color: white; font-family: Montserrat; margin-left: 118px; margin-top: 50px; font-weight: bold;" >JAFFNA LOUNGE</h1>

<div>
<div class="nalloor" >
    <img src="../images/available packages/jaffna1.png"/>
</div>

<div class="jaffna">
    <img src="../images/available packages/jaffna2.png"/>
  </div>
</div>

<table class=data>
  
  <tr>
    <td>Package Name</td>
    <td>Jaffna Lounge</td>
    
  </tr>
  <tr>
    <td>Package ID</td>
    <td>012J</td>
    
  </tr>
  <tr>
    <td>Description</td>
    <td> Welcome to our beautiful island! We hope you are in the safe hands of our representatives. 
    Now it’s time to begin your dream tour Srilanka Vacation Package. Jaffna is known as the home to diverse treasures, located high into the hills with a cooler atmosphere, 
    with the eyes of dozens of monkeys on our backs paving the way to the ultimate travel destination of Srilanka. 
    After arrival, you will be taken on a tour around the Kandy lake by Sri Lanka Holiday Package to witness and enjoy the cool breeze and afterward, 
    you will experience a mind-blowing experience with the elephants at the Pinnawala Elephant Orphanage. What’s an evening in Srilanka without enjoying a cultural dance?
   Oh yey! We heard you! After a tiring day, 
    you will be able to witness the rich culture of Srilanka through a colorful, professional cultural dance in-cooperated with the feisty drums giving you goosebumps till the end of the performances.</td>
    
  </tr>
  <tr>
    <td>Price</td>
    <td>Rs 120,000</td>
    
  </tr>
  
  </tr>
</table>
</div>
</section>


</body>

</html>