<?php
require('../api/managerprofile.php');
$rows = $_SESSION['c'];


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
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

        <div class="text">Hotel Manager - Pending Approval</div>
        
        <div class="wrapper">
            <div class="left"> 

            
            <?php 
        foreach($rows as $row) 
        echo '
            
                <img src="../Images/download.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;">
                <h3>'.$row['managerName'].'</h3>
                <p>'.$row['username'].'</p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Hotel Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p>'.$row['name'].'</p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p>'.$row['phone'].'</p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p>'.$row['username'].'</p>
                        </div>



                    </div>

                </div>
                <div class="projects">
                    <h3>Contact Person Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p>'.$row['managerName'].'</p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p>'.$row['managerNic'].'</p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p>'.$row['managerEmail'].'</p>
                        </div>
                      
<br>

                        <div class="data">
                        <h4>Phone</h4>
                        <p>'.$row['managerPhone'].'</p>
                        </div>

                    </div>

                </div> '; ?>
                <br>  
                
            </div>

                
        
    </section>
</body>

</html>