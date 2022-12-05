<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/profile.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="heading" style="color:black;margin-left:70px;margin-top:15px;">Edit Profile</div>
    <div class="registerForm">
        <form method="post" action="../api/addentreapi.php" enctype="multipart/form-data">
        <div class="subheading" style="color:black;margin-left:70px;margin-top:15px;">BUSSINESS NAME*</div>
        <input type="text" class="field" style="margin-left:63px;margin-top:12px;" name="bussinessName"/>
        <div class="subheading" style="color:black;margin-left:70px;margin-top:15px;">CONTACT PERSON DETAILS</div>

        <table>
            <tr class="row">
                <td>
                    <div class="content">NAME</div>
                </td>
                <td><input type="text" class="subfield" name="eName" /></td>
            </tr>
            <!-- <tr class="row">
                <td>
                    <div class="content">POSITION</div>
                </td>
                <td><input type="text" class="subfield" name="username" /></td>
            </tr> -->
            <tr class="row">
                <td>
                    <div class="content">CONTACT NUMBER</div>
                </td>
                <td><input type="text" class="subfield" name="ePhone" pattern="[0-9]{10}" required /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">EMAIL ADDRESS</div>
                </td>
                <td> <input type="text" class="subfield" name="eEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">NIC</div>
                </td>
                <td><input type="text" class="subfield" id="nic" name="eNic" pattern="[0-9]{9}[Vv0-9]{1,3}" required/>
            </td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">USERNAME</div>
                </td>
                <td> <input type="text" class="subfield" name="username" required/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">PASSWORD</div>
                </td>
                <td> <input type="password" class="subfield" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/>
            <div id="msg" style="color:red;"></div></td>
            </tr>
        </table>

        <div class="subheading" style="color:black;margin-left:70px;margin-top:30px;">BUSSINESS DETAILS</div>

        <table>
            <tr class="row">
                <td>
                    <div class="content">ADDRESS</div>
                </td>
                <td> <input type="text" class="subfield" name="address" style="margin-left:-70px"/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">EMAIL ADDRESS</div>
                </td>
                <td> <input type="text" class="subfield" name="email" style="margin-left:-70px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">CONTACT NUMBER</div>
                </td>
                <td> <input type="text" class="subfield" name="phone"style="margin-left:-70px" pattern="[0-9]{10}" required/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">PROFILE IMAGE</div>
                </td>
                <td> <input type="file"
                        style="margin-top:5px;margin-left:-70px; box-sizing: border-box;"
                        name="proImg" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">BUSINESS CERTIFICATE</div>
                </td>
                <td> <input type="file"
                        style="margin-top:5px;margin-left:-70px;background:white;  box-sizing: border-box;"
                        name="doc" /></td>
            </tr>
        </table>
        <table>
        <tr class="rwa">
        <td><input type="submit" class="btn" value="UPDATE" name="signup"/></td>
        <td><input type="submit" class="btn" value="CANCEL" name="signup" /></td>
        </tr>
        </table>
        </form>
        

    </div>

        
                        

               
</section>


</body>

</html>