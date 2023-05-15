<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location: http://localhost/Tourism-Management-System/view-hotel/login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/profiles.css">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>


    <div class="wrapper">
        <div class="main_content">
            <div class="info">
                <?php 
require_once "../controller/touristController.php";
            $tp = new touristController();
            $results = $tp->viewProfile($id);
            foreach ($results as $result) {?>
                <div class="polygons">
                    <div class="square">
                        <br /><br /><br /><br /><br /><br />
                        <table class="tbl-square">
                            <tr>
                                <td class="type1">Name :</td>
                                <td class="type2"><?php echo $result['name']; ?></td>
                            </tr>
                            <tr>
                                <td class="type1">Address :</td>
                                <td class="type2"><?php echo $result['address']; ?></td>
                            </tr>
                            <tr>
                                <td class="type1">Email Address :</td>
                                <td class="type2"><?php echo $result['email']; ?></td>
                            </tr>
                            <tr>
                                <td class="type1">NIC/Passport Number :</td>
                                <td class="type2"><?php echo $result['nic_passportNo']; ?></td>
                            </tr>
                            <tr>
                                <td class="type1">Contact Numer :</td>
                                <td class="type2"><?php echo '0'.$result['phone']; ?></td>
                            </tr>
                            <tr>
                                <td class="type1">Date of Birth :</td>
                                <td class="type2"><?php echo $result['dob']; ?></td>
                            </tr>
                            <tr>
                                <td class="type1">Country :</td>
                                <td class="type2"><?php echo $result['country']; ?></td>
                            </tr>

                        </table>
                        <a href="editProfile.php?id=<?php echo $result['userID']; ?> &name=<?php echo $result['name']; ?> &address=<?php echo $result['address']; ?> &email=<?php echo $result['email']; ?> &phone=<?php echo $result['phone']; ?> &dob=<?php echo $result['dob']; ?> &country=<?php echo $result['country']; ?> &nic_passportNo=<?php echo $result['nic_passportNo']; ?>"><button class="btn-editP" style="margin-top:20px;margin-left:50px;margin-bottom:50px;"><i
                                class="fa-solid fa-pen-to-square"></i> &nbsp; Edit Profile</button></a>
                    </div>
                    
                    <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='user' class='circle'>"; ?></a>

                    <div id="overlap"></div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>


    <div style="margin-top:10px;">
        <?php include "footer.php"?>
    </div>
</body>

</html>