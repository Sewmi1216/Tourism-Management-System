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
  <div class="slide"><img src="../images/koneshwaram.jpg" alt="k"></div>
  <div class="slide"><img src="../images/marblebeach.jpg" alt="k"></div>
  <div class="slide"><img src="../images/deer.jpeg" alt="k"></div>
  <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
  <a class="next" onclick="changeSlide(1)">&#10095;</a>
</div>


        <?php

foreach($rows as $row) 

echo '<table>

<div>  </div>

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

<script>
var slideIndex = 0;
var slides = document.getElementsByClassName("slide");

function changeSlide(n) {
  slideIndex += n;
  if (slideIndex >= slides.length) {
    slideIndex = 0;
  } else if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  }
  showSlide(slideIndex);
}

function showSlide(n) {
  for (var i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active");
  }
  slides[n].classList.add("active");
}

showSlide(slideIndex);

</script>


</body>

</html>