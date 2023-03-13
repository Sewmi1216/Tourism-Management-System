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
    
        <?php

foreach($rows as $row) 

echo '<table>


    <div class="content">
    <h1 style="color: white; font-family: Montserrat; margin-left: 118px; margin-top: 50px; font-weight: bold;" >'.$row['packageName'].'</h1>

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
  <td>'.$row['participant_count'].'</td>
  
</tr>
  </tr>
</table>
</div>
</section>
' ?>

</body>

</html>