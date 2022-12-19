<?php 
require('../api/viewtourpackage.php');
$rows = $_SESSION['c'];
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/tourpackage.css">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&display=swap" rel="stylesheet">

    <title>Tour packages</title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&family=Montserrat:wght@500&display=swap');
</style>
</head>
<body>


        <?php require "dashboardHeader.php"?>
        <?php require "nav.php"?>



    <div class="content">

        <div class="booked-packages">
          <div class="add">  
            <h3>TOUR PACKAGES</h3> 
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
                        <a href="editpackage.php?package_id='.$row['package_id'].'"> <button type="button" class="editbtn"> EDIT </button></a> 
                        <button type="button" class="deletebtn">DELETE</button>
                        </span>
                    </tr>
                    </span>
                </div>
              </div>';
            }?>
        </div>
    </div>
</body>
</html>