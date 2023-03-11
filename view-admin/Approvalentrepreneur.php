<?php
require('../api/managerprofile.php');
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

        <div class="text">Entrepreneur - Pending Approval</div>
        
        <div class="wrapper">
            <div class="left"> 

            
                <img src="../Images/download2.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;">
                <h3>'.$row['username'].'</h3>
                <p>'.$row['username'].'</p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Business Details</h3>
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



                    </div>

                </div>
                <div class="projects">
                    <h3>Entrepreneur Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p>'.$row['name'].'</p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p>'.$row['nic'].'</p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p>'.$row['Email'].'</p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p>'.$row['phone'].'</p>
                        </div>



                    </div>

                </div>
                <br>  
                <a href="#" class="button">Approve</a>
                <a href="#" class="button">Decline</a>

            </div>
        
    </section>
</body>

</html>