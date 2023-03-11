<?php


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
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
                <img src="../Images/download.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;">
                <h3>Grand Monarch</h3>
                <p>@GMOCH</p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Hotel Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p>sharmi@gmail.com</p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p>011-4556345</p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p>Thibirigasyaya,Colombo 07</p>
                        </div>



                    </div>

                </div>
                <div class="projects">
                    <h3>Contact Person Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p>G.M.Perera</p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p>986080961V</p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p>perera@gmail.com</p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p>011-4556345</p>
                        </div>



                    </div>

                </div>
                <br>
                <a href="profileupdate.php" class="button">Update profile</a>


            </div>
    </section>
</body>

</html>