<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
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
                <img src="../Images/Profile_guide.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;">
                <h3>P.L Perera</h3>
                <p>@pl123</p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Tour Guide Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p>perera@gmail.com</p>
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
                   
                    <div class="projects_data">
                        <div class="data">
                            <h4>Languages</h4>
                            <p>Sinahala,English,Tamil</p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p>986080961V</p>
                        </div>
                        <div class="data">
                            <h4>Availability</h4>
                            <p>Unavailable</p>
                        </div>
                    </div>

                </div>
                <br>
                <a href="Guide_proedit.php" class="button">Edit</a>


            </div>
</section>


</body>

</html>