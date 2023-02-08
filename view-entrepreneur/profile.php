
<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:Login.php");
}
?>
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
                <img src="../Images/Profile.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;">
                <h3>Sharmi Crafts</h3>
                <p>@udari123</p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Bussiness Details</h3>
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
                            <p>Udari Wijamuni</p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p>986080961V</p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p>udari@gmail.com</p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p>011-4556345</p>
                        </div>



                    </div>

                </div>
                <br>
                
                <a href="proedit.php" class="button">Edit</a>


            </div>
</section>


</body>

</html>