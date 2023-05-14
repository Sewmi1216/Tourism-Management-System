
<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
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
        <?php
require_once "../controller/entrepreneurController.php";
$profile = new entrepreneurController();
$results = $profile->viewProfile($id);
foreach ($results as $result) {
    ?>
        <div class="text">Profile</div>
        <div class="wrapper">

            <div class="left">
                <!-- <img src="../Images/Profile.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;"> -->
                    <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='logo' height='150px' width='150px'
                    style='padding-right:0px;border-radius:50%;'>";?>
                <h3><?php echo $result['businessName'];?></h3>
              
            </div>
            <div class="right">

                <div class="info">
                    <h3>Bussiness Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['email'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['phone'];?></p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p><?php echo $result['address'];?></p>
                        </div>



                    </div>

                </div>
                <div class="projects">
                    <h3>Contact Person Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p><?php echo $result['entrepreneurName'];?></p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p><?php echo $result['entrepreneurNic'];?></p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['entrepreneurEmail'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['entrepreneurPhone'];?></p>
                        </div>



                    </div>

                </div>
                <br>
                
                <!-- <button
                    onclick="document.location='proedit.php?id=<?php echo $result['entID']; ?> &name=<?php echo $result['name']; ?> &address=<?php echo $result['address']; ?> &email=<?php echo $result['email']; ?> &phone=<?php echo $result['phone']; ?> &username=<?php echo $result['username']; ?> &password=<?php echo $result['password']; ?> &managerName=<?php echo $result['Name']; ?> &managerPhone=<?php echo $result['managerPhone']; ?> &managerEmail=<?php echo $result['managerEmail']; ?> &managerNic=<?php echo $result['managerNic']; ?>'"
                    type="submit" name="update" class="button" href="">Edit Profile</button> -->
                    <button
                    onclick="document.location='proedit.php?id=<?php echo $result['entID']; ?> &businessName=<?php echo $result['businessName']; ?> &address=<?php echo $result['address']; ?> &email=<?php echo $result['email']; ?> &phone=<?php echo $result['phone']; ?>  &password=<?php echo $result['password']; ?> &entrepreneurName=<?php echo $result['entrepreneurName']; ?> &entrepreneurPhone=<?php echo $result['entrepreneurPhone']; ?> &entrepreneurEmail=<?php echo $result['entrepreneurEmail']; ?> &entrepreneurNic=<?php echo $result['entrepreneurNic']; ?>'"
                    type="submit" name="update" class="button" href="">Edit Profile</button>

                    <?php } ?>
            </div>
</section>


</body>

</html>