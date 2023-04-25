<?php
require('../api/tourguideprofile.php');
$rows = $_SESSION['c'];


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/managerprofile.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    

    <?php include "nav.php"?>
   


    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="text">Tour Guide Profile</div>
        
        <div class="wrapper">
            <div class="left"> 

            <?php 
        foreach($rows as $row) 
        echo '            
                <img src="../Images/download.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;">
                <h3>'.$row['name'].'</h3>
                <p>'.$row['username'].'</p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Tour Guide Detsils</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p>'.$row['email'].'</p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p>'.$row['phone'].'</p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p>'.$row['address'].'</p>
                        </div>
                        <div class="data">
                        <h4>NIC</h4>
                        <p>'.$row['nic'].'</p>
                    </div>
<br>
                        <div class="data">
                        <h4>Availability</h4>
                        <p>'.$row['availability'].'</p>
                        </div>
                    </div>

                </div>
                <div class="projects">
                    <h3>Vehicle Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Vehicle Type</h4>
                            <p>Van</p>
                        </div>
                        <div class="data">
                            <h4>Vehicle Number</h4>
                            <p>VH- 1758</p>
                        </div>
                        <div class="data">
                            <h4>No of Passegers that can be carried</h4>
                            <p>10</p>
                        </div>
                       
'  ?>


                    </div>

                </div>
                <br>  
                <a href="edittouristguide.php?tourguideID='<?php echo $row['tourguideID']; ?>'" class="button"> Update profile</a>
                <a href="#" class="button">Delete profile</a>

            </div>
        
    </section>
</body>

</html>