
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
    <link rel="stylesheet" href="../css/profilenew.css?v=<?php echo time(); ?>">
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
        
        <div class="container">
        <div class="profile">

            <div class="left">
            <?php

$conn = mysqli_connect('localhost','root','','pack2paradise') or die('connection failed');

?>
                <!-- <img src="../Images/Profile.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;"> -->
                    <?php
         $select = mysqli_query($conn, "SELECT * FROM `entrepreneur` WHERE entID = '$id'") or die('query failed');
         
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['profileImg'] == ''){
            echo '<img src="../images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['profileImg'].'">';
         }
      ?>    
                <h3><?php echo $fetch['businessName'];?></h3>
                
            </div>
            <div class="left">

                <div class="info">
                    <h3>Bussiness Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $fetch['email'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $fetch['phone'];?></p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p><?php echo $fetch['address'];?></p>
                        </div>



                    </div>

                </div>
                <div class="right">
                <div class="projects">
                    <h3>Contact Person Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p><?php echo $fetch['entrepreneurName'];?></p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p><?php echo $fetch['entrepreneurNic'];?></p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $fetch['entrepreneurEmail'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $fetch['entrepreneurPhone'];?></p>
                        </div>

                    </div>

                    </div>

                </div>
                <br>
                
                <!-- <button
                    onclick="document.location='proedit.php?id=<?php echo $fetch['entID']; ?> &name=<?php echo $fetch['name']; ?> &address=<?php echo $fetch['address']; ?> &email=<?php echo $fetch['email']; ?> &phone=<?php echo $fetch['phone']; ?> &username=<?php echo $fetch['username']; ?> &password=<?php echo $fetch['password']; ?> &managerName=<?php echo $fetch['managerName']; ?> &managerPhone=<?php echo $fetch['managerPhone']; ?> &managerEmail=<?php echo $fetch['managerEmail']; ?> &managerNic=<?php echo $fetch['managerNic']; ?>'"
                    type="submit" name="update" class="button" href="">Edit Profile</button> -->
                    <button
                    onclick="document.location='update_profile.php?id=<?php echo $fetch['entID']; ?> &businessName=<?php echo $fetch['businessName']; ?> &address=<?php echo $fetch['address']; ?> &email=<?php echo $fetch['email']; ?> &phone=<?php echo $fetch['phone']; ?> &username=<?php echo $fetch['username']; ?> &password=<?php echo $fetch['password']; ?> &entrepreneurName=<?php echo $fetch['entrepreneurName']; ?> &entrepreneurPhone=<?php echo $fetch['entrepreneurPhone']; ?> &entrepreneurEmail=<?php echo $fetch['entrepreneurEmail']; ?> &entrepreneurNic=<?php echo $fetch['entrepreneurNic']; ?>'"
                    type="submit" name="update" class="btn" href="">Edit Profile</button>

                    
            </div>
</section>


</body>

</html>