<?php 
require('../api/viewonetourpackage.php');
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
    
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img_nature_wide.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img_snow_wide.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img_mountains_wide.jpg" style="width:100%">
  
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

        <?php

foreach($rows as $row) 

echo '<table>


   

</div>

<table class=data>
  
  <tr>
    <td>Package Name</td>
    <td>'.$row['packageName'].'</td>
    
  </tr>
  <tr>
    <td>Package ID</td>
    <td>'.$row['packageID'].'</td>
    
  </tr>
  <tr>
    <td>Description</td>
    <td> '.$row['description'].'</td>
    
  </tr>
  <tr>
    <td>Price</td>
    <td>'.$row['price'].'</td>
    
  </tr>
  <tr>
  <td>No of participants</td>
  <td>'.$row['max_part'].'</td>
  
</tr>
  </tr>
</table>
</div>
</section>
' ?>

</body>

</html>