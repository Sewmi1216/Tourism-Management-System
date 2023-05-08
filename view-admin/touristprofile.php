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

        <div class="text">Profile</div>
        
        <div class="wrapper">
            <div class="left"> 

            <?php
require_once "../controller/touristController.php";
$profile = new touristController();
$results = $profile->viewProfile($id);
foreach ($results as $result) {
    ?>            
                <img src="../Images/download.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;">
                <h3><?php echo $result['username'];?></h3>
               
            </div>
            <div class="right">

                <div class="info">
                    <h3>Tourist Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['name'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['name'];?></p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p><?php echo $result['name'];?></p>
                        </div>



                    </div>

                </div>
                <div class="projects">
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p><?php echo $result['name'];?></p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p><?php echo $result['name'];?></p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['name'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['name'];?></p>
                        </div>



                    </div>

                </div>
                <br>  
                <a href="editmanager.php" class="button">Update profile</a>
                <a href="editmanager.php" class="button">Delete profile</a>

            </div>
            <?php } ?>
    </section>
</body>

</html>