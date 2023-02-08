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

<div class="booked-packages">
  <div class="add">  
    <div class="text">TOUR PACKAGES</div>
    <a href="addpackage.php"> <b> ADD PACKAGES </b></a>
</div>
    <?php
    foreach($rows as $row) {
    echo '<div class="booked-packages-list">
        <div class="booked-packages-card">
            <img src="../images/available packages/package1.png" alt="images">
            <span class="details">
            <tr>
                <td>  '.$row['package_name'].'</td>
                <td>  '.$row['package_id'].'</td>

                <span class="btn">
                <a href="packagedescription.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                <a href="editpackage2.php?package_id='.$row['package_id'].'"> <button type="button" class="editbtn"> EDIT </button></a> 
                <button type="button" class="deletebtn">DELETE</button>
                </span>
            </tr>
            </span>
        </div>
      </div>';
    }?>
</div>
</div>
</section>


</body>

</html>