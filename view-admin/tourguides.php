<?php 
require('../api/viewguide.php');
$rows = $_SESSION['c'];
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/tourpackage.css">
    <title>Tour Guides</title>
</head>
<body>
    <div class="content">

        <div class="booked-packages">
          <div class="add">  
            <h3>TOUR GUIDES</h3> 
            <a href="addtouristguide.php">ADD NEW GUIDE</a>
        </div>
            <?php
            foreach($rows as $row) {
            echo '<div class="booked-packages-list">
                <div class="booked-packages-card">
                    <img src="../images/available packages/package1.png" alt="images">
                    <span class="details">
                    <tr>
                        <td>  <h5>'.$row['name'].'</h5></td>
                        <span class="btn">
                        <button type="button" class="editbtn">EDIT</button>
                        <button type="button" class="deletebtn">DELETE</button></span>
                    </tr>
                    </span>
                </div>
              </div>';
            }?>
        </div>
    </div>
</body>
</html>