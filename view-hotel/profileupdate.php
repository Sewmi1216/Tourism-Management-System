<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:hotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
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
            <form method="post" action="../api/addhotel.php" enctype="multipart/form-data">
                <div class="heading" style="margin-top:0px;">Update Hotel Profile</div>
                <div class="subheading" style="margin-top:15px;">Hotel Name*</div>
                <input type="text" class="field" style=";margin-top:12px;" name="hotelName" />
                <div class="subheading" style="margin-top:15px;">Contact Person Details</div>

                <table>
                    <tr>
                        <td>
                            <div class="content">Name</div>
                            <input type="text" class="subfield" name="mName" />
                        </td>
                        <td>
                            <div class="content">Contact Number</div>
                            <input type="text" class="subfield" name="mPhone" pattern="[0-9]{10}" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="content">Email Address</div>
                            <input type="text" class="subfield" name="mEmail"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
                        </td>
                        <td>
                            <div class="content">NIC</div>
                            <input type="text" class="subfield" id="nic" name="mNic" pattern="[0-9]{9}[Vv0-9]{1,3}"
                                required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="content">Username</div>
                            <input type="text" class="subfield" name="username" required />
                        </td>
                        <td>
                            <div class="content">Password</div>
                            <input type="password" class="subfield" name="password" id="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                            <div id="msg" style="color:red;"></div>
                        </td>
                    </tr>

                </table>
                <div class="subheading" style="margin-top:15px;">Hotel Details</div>

                <table>
                    <tr>
                        <td>
                            <div class="content">Address</div>
                            <input type="text" class="subfield" name="address" />
                        </td>
                        <td>
                            <div class="content">Email address</div>
                            <input type="text" class="subfield" name="email"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="content">Contact Number</div>
                            <input type="text" class="subfield" name="phone" pattern="[0-9]{10}" required />
                        </td>
                        <td>
                            <div class="content">Profile Image</div><input type="file" style="padding-bottom:25px;"
                                class="subfield" name="proImg" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="content">Business Certificate</div>
                            <input type="file" class="subfield" name="doc" style="padding-bottom:25px;" />
                        </td>
                    </tr>
                </table>
                <input type="submit" class="btnRegister" value="Update Profile" name="signup" />
            </form>
        </div>
        <!-- chat box -->
        <?php include_once "chat.php"?>
    </section>
</body>

</html>