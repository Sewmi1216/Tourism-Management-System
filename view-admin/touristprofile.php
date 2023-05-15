<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["adminID"])) {
    
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/user2.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">


    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

</head>

<body>
  

    <section class="home-section">

    <?php $id = $_GET["id"]; ?>
       
        <?php
require_once "../controller/touristController.php";
$profile = new touristController();
$results = $profile->viewProfile($id);
foreach ($results as $result) {
    ?>
        <div class="text"><b>Profile</b></div>
        <div class="wrapper">

            <div class="left" >
                <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='logo' height='150px' width='150px'
                    style='padding-right:0px;border-radius:50%;'>";?>

                <h3><?php echo $result['name'];?></h3>
                <p><?php echo $result['username'];?></p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>User Details</h3><br>
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
                 
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p><?php echo $result['name'];?></p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p><?php echo $result['nic'];?></p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['email'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['phone'];?></p>
                        </div>

                    </div>

                </div>
                <br>
                <button
                    onclick="document.location='profileupdate.php?id=<?php echo $result['userID']; ?>
                     &name=<?php echo $result['name']; ?> &address=<?php echo $result['address']; ?> &email=<?php echo $result['email']; ?> &phone=<?php echo $result['phone']; ?>
                     &username=<?php echo $result['username']; ?> &password=<?php echo $result['password']; ?> 
                    &managerName=<?php echo $result['managerName']; ?> &managerPhone=<?php echo $result['managerPhone']; ?>
                     &managerEmail=<?php echo $result['managerEmail']; ?> &managerNic=<?php echo $result['managerNic']; ?>'"
                    type="submit" name="update" class="button" href="">Edit Profile</button>


                <?php } ?>
            </div>
    </section>
</body>

</html>