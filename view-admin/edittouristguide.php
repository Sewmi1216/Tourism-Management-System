<?php 
require('../api/viewhotelmanager.php');
$rows = $_SESSION['c'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&display=swap" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&family=Montserrat:wght@500&display=swap');
</style>

</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        
        <div class="registerForm">
        <form method="post" action="../api/addentreapi.php" enctype="multipart/form-data">
            <div class="heading" style="margin-top:0px;">Edit Tour Guide Information</div>
            <hr>
            <div class="subheading" style="margin-top:15px;">Contact Person Details</div>

            <table>
                <tr>
                    <td>
                        <div class="content">Name</div>
                        <input type="text" class="subfield" name="eName" />
                    </td>
                    <td>
                        <div class="content">Contact Number</div>
                        <input type="text" class="subfield" name="ePhone" pattern="[0-9]{10}" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Email Address</div>
                        <input type="text" class="subfield" name="eEmail"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
                    </td>
                    <td>
                        <div class="content">NIC</div>
                        <input type="text" class="subfield" id="nic" name="eNic" pattern="[0-9]{9}[Vv0-9]{1,3}"
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

                <tr>
                    <td>
                        <div class="content">Languages</div>
                        <input type="text" class="subfield" name="address" />
                    </td>
                    <td>
                        <div class="content">Availability</div>
                        <input type="text" class="subfield" name="email"
                            required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Profile Image</div><input type="file" style="padding-bottom:25px;"
                            class="subfield" name="proImg" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Legal Document</div>
                        <input type="file" class="subfield" name="doc" style="padding-bottom:25px;" />
                    </td>
                </tr>
</table>

                <div class="subheading" style="margin-top:15px;">Vehicle Details</div>

            <table>
                <tr>
                    <td>
                        <div class="content">Vehicle Number</div>
                        <input type="text" class="subfield" name="eName" />
                    </td>
                    <td>
                        <div class="content">Vehicle Type</div>
                        <input type="text" class="subfield" name="ePhone" pattern="[0-9]{10}" required />
                    </td>
                    
                </tr>
                <tr>
                <td>
                        <div class="content">Number of passengers that can be carried</div>
                        <input type="text" class="subfield" name="ePhone" pattern="[0-9]{10}" required />
                    </td>
</tr>
            </table>
            <input type="submit" class="btnRegister" value="UPDATE" name="Sign UpE" />
         
        </form>


    </div>

    <script>
    var nic = document.getElementById("nic");

    nic.addEventListener('input', () => {
        nic.setCustomValidity('');
        nic.checkValidity();
    });

    nic.addEventListener('invalid', () => {
        if (nic.value === '') {
            nic.setCustomValidity('Enter nic!');
        } else {
            nic.setCustomValidity('Enter nic in 200056789123 or 123456789V format');
        }
    });
    var pwd = document.getElementById("password");

    pwd.addEventListener('input', () => {
        pwd.setCustomValidity('');
        pwd.checkValidity();
    });

    pwd.addEventListener('invalid', () => {
        if (pwd.value === '') {
            pwd.setCustomValidity('Enter password!');
        } else {
            pwd.setCustomValidity(
                'Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters'
            );
        }
    });

    // function validatePwd(){
    //     var pwd = document.getElementById("password");
    //     var msg = document.getElementById("msg");
    //     var condition = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    //     if(!pwd.match(condition)){
    //         msg.innerHTML="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
    //     }
    //     else{
    //         msg.innerHTML="";
    //     }
    // }
    </script>

</body>
</html>