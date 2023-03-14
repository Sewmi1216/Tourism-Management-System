<?php 
require('../api/entrepreneurprofile.php');
$rows = $_SESSION['c'];

// foreach($rows as $x){
//     print_r($x);
// }

// die();
// print_r($rows); die();
// The http request hits here 4th.
// Using the data from previously execute code, the view is prepared
// A response to the http request is sent from here as html file.
?>

<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
</head>

<body>
<?php include "header.php"?>
    <div class="registerForm">
        <form method="post" action="../api/addentreapi.php" enctype="multipart/form-data">
            <div class="heading" style="margin-top:0px;">Entrepreneur Registration</div>
            <hr>

            <?php            
foreach($rows as $row) {
echo '<table>

            <div class="subheading" style="margin-top:15px;">Business Name*</div>
            <input type="text" class="field" style=";margin-top:12px;" name="bName" value="'.$row['businessName'].'" />
            <div class="subheading" style="margin-top:15px;">Contact Person Details</div>

            <table>
                <tr>
                    <td>
                        <div class="content">Name</div>
                        <input type="text" class="subfield" name="eName" value="'.$row['entrepreneurName'].'"/>
                    </td>
                    <td>
                        <div class="content">Contact Number</div>
                        <input type="text" class="subfield" name="ePhone" pattern="[0-9]{10}" value="'.$row['entrepreneurPhone'].'" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Email Address</div>
                        <input type="text" class="subfield" name="eEmail"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="'.$row['entrepreneurEmail'].'" required />
                    </td>
                    <td>
                        <div class="content">NIC</div>
                        <input type="text" class="subfield" id="nic" name="eNic" value="'.$row['entrepreneurNic'].'" pattern="[0-9]{9}[Vv0-9]{1,3}"
                            required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Username</div>
                        <input type="text" class="subfield" name="username" value="'.$row['username'].'" required />
                    </td>
                    <td>
                        <div class="content">Password</div>
                        <input type="password" class="subfield" name="password" id="password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="'.$row['password'].'" required />
                        <div id="msg" style="color:red;"></div>
                    </td>
                </tr>

            </table>
            <div class="subheading" style="margin-top:15px;">Business Details</div>

            <table>
                <tr>
                    <td>
                        <div class="content">Address</div>
                        <input type="text" class="subfield" name="address" value="'.$row['businessName'].'"/>
                    </td>
                    <td>
                        <div class="content">Email address</div>
                        <input type="text" class="subfield" name="email"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="'.$row['email'].'" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Contact Number</div>
                        <input type="text" class="subfield" name="phone" pattern="[0-9]{10}" value="'.$row['phone'].'" required />
                    </td>
                    <td>
                        <div class="content">Profile Image</div><input type="file" style="padding-bottom:25px;"
                            class="subfield" name="proImg" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Business Certificate</div>
                        <input type="file" class="subfield" name="doc" style="padding-bottom:25px;" value="'.$row['document'].'"/>
                    </td>
                </tr>
            </table>
            <input type="submit" class="btnRegister" value="Update Profile" name="signup" />

        </form>


    </div>
    '; } ?>


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