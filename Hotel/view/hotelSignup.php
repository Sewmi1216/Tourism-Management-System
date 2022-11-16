<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotelRegistration.css?v=<?php echo time(); ?>">
</head>


<body>
    <?php include "header.php"?>
    <div class="heading" style="color:white;margin-left:70px;margin-top:15px;">HOTEL REGISTRATION</div>
    <div class="registerForm">
        <form action="../api/addhotelapi.php" method="post" enctype="multipart/form-data">
        <div class="subheading" style="color:white;margin-left:70px;margin-top:15px;">HOTEL NAME*</div>
        <input type="text" class="field" style="margin-left:63px;margin-top:12px;" name="hotelName" required/>
        <div class="subheading" style="color:white;margin-left:70px;margin-top:15px;">CONTACT PERSON DETAILS</div>

        <table>
            <tr class="row">
                <td>
                    <div class="content">NAME</div>
                </td>
                <td> <input type="text" class="subfield" name="mName" /></td>
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
                <td> <input type="text" class="subfield" name="mPhone" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">EMAIL ADDRESS</div>
                </td>
                <td> <input type="text" class="subfield" name="mEmail" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">NIC</div>
                </td>
                <td> <input type="text" class="subfield" name="mNic" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">USERNAME</div>
                </td>
                <td> <input type="text" class="subfield" name="username" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">PASSWORD</div>
                </td>
                <td> <input type="password" class="subfield" name="password" /></td>
            </tr>
        </table>

        <div class="subheading" style="color:white;margin-left:70px;margin-top:30px;">HOTEL DETAILS</div>

        <table>
            <tr class="row">
                <td>
                    <div class="content">ADDRESS</div>
                </td>
                <td> <input type="text" class="subfield" name="address" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">EMAIL ADDRESS</div>
                </td>
                <td> <input type="text" class="subfield" name="email" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">CONTACT NUMBER</div>
                </td>
                <td> <input type="text" class="subfield" name="phone" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">PROFILE IMAGE</div>
                </td>
                <td> <input type="file"
                        style="margin-top:5px;background: #cfcaff;  box-sizing: border-box;border: 5px solid rgba(0, 0, 0, 0.25);border-radius: 36px;"
                        name="proImg" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">BUSINESS CERTIFICATE</div>
                </td>
                <td> <input type="file"
                        style="margin-top:5px;background: #cfcaff;  box-sizing: border-box;border: 5px solid rgba(0, 0, 0, 0.25);border-radius: 36px;"
                        name="doc" /></td>
            </tr>
        </table>
        <input type="submit" class="btn" value="Sign Up" name="signup"/>
        </form>
        <p style="margin-left:500px;margin-top:-32px;">Already have an account <a href="login.php"
                style="text-decoration:none;color:white;">Login</a></p>


    </div>




</body>

</html>