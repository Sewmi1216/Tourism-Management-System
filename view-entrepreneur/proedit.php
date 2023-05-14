<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
    header("location:Login.php");
}

$id = $_GET['id'];

$businessName = $_GET['businessName'];
$address = $_GET['address'];
$email = $_GET['email'];
$phone = $_GET['phone'];

$password = $_GET['password'];
$entrepreneurName = $_GET['entrepreneurName'];
$entrepreneurPhone = $_GET['entrepreneurPhone'];
$entrepreneurEmail = $_GET['entrepreneurEmail'];
$entrepreneurNic = $_GET['entrepreneurNic'];


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/pkg.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="registerForm">
            <form method="get" action="../api/addentreapi.php" enctype="multipart/form-data">
                <div class="heading" style="margin-top:0px;">Update Entrepreneur Profile</div>
                <div class="subheading" style="margin-top:15px;">Business Name*</div>
                <input type="text" class="field" style=";margin-top:12px;" name="name" value="<?php echo $businessName;?>" />
                <div class="subheading" style="margin-top:15px;">Contact Person Details</div>
                <input type="hidden" class="subfield" name="id" value="<?php echo $id;?>"/>
                <table>
                    <tr>
                        <td>
                            <div class="content">Name</div>
                            <input type="text" class="subfield" id="entrepreneurName" name="eName" value="<?php echo $entrepreneurName;?>"/>
                        </td>
                        <td>
                            <div class="content">Contact Number</div>
                            <input type="text" class="subfield" name="entrepreneurPhone" value="<?php echo $entrepreneurPhone;?>" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="content">Email Address</div>
                            <input type="text" class="subfield" name="entrepreneurEmail"
                                value="<?php echo $entrepreneurEmail;?>" required />
                        </td>
                        <td>
                            <div class="content">NIC</div>
                            <input type="text" class="subfield" id="nic" name="entrepreneurNic" value="<?php echo $entrepreneurNic;?>"
                                required />
                        </td>
                    </tr>
                    <tr>
                        
                        <td>
                            <div class="content">Password</div>
                            <input type="password" class="subfield" name="password" id="password"
                                value="<?php echo $password;?>" required />
                            <div id="msg" style="color:red;"></div>
                        </td>
                    </tr>

                </table>
                <div class="subheading" style="margin-top:15px;">Business Details</div>

                <table>
                    <tr>
                        <td>
                            <div class="content">Address</div>
                            <input type="text" class="subfield" name="address" value="<?php echo $address;?>" />
                        </td>
                        <td>
                            <div class="content">Email address</div>
                            <input type="text" class="subfield" name="email"
                                 value="<?php echo $email;?>" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="content">Contact Number</div>
                            <input type="text" class="subfield" name="phone" value="<?php echo $phone;?>" required />
                        </td>
                        <!-- <td>
                            <div class="content">Profile Image</div><input type="file" style="padding-bottom:25px;"
                                class="subfield" name="proImg" />
                        </td> -->
                    </tr>
                    <!-- <tr>
                        <td>
                            <div class="content">Business Certificate</div>
                            <input type="file" class="subfield" name="doc" style="padding-bottom:25px;" />
                        </td>
                    </tr> -->
                </table>
                <input type="submit" class="btnRegister" value="Update Profile" name="update" />
            </form>
        </div>

    </section>
</body>

</html>