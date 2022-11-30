<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotelRegistration.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>
    <div class="heading" style="color:black;margin-left:70px;margin-top:15px;">HOTEL REGISTRATION</div>
    <div class="registerForm">
        <form method="post" action="../api/addhotel.php" enctype="multipart/form-data">
        <div class="subheading" style="color:black;margin-left:-1100px;margin-top:15px;">HOTEL NAME*</div>
        <input type="text" class="field" style="margin-left:63px;margin-top:12px;" name="hotelName"/>
        <div class="subheading" style="color:black;margin-left:70px;margin-top:15px;">CONTACT PERSON DETAILS</div>

        <table>
            <tr class="row">
                <td>
                    <div class="content">NAME</div>
                </td>
                <td><input type="text" class="subfield" name="mName" /></td>
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
                <td><input type="text" class="subfield" name="mPhone" pattern="[0-9]{10}" required /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">EMAIL ADDRESS</div>
                </td>
                <td> <input type="text" class="subfield" name="mEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">NIC</div>
                </td>
                <td><input type="text" class="subfield" id="nic" name="mNic" pattern="[0-9]{9}[Vv0-9]{1,3}" required/>
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

        <div class="subheading" style="color:black;margin-left:70px;margin-top:30px;">HOTEL DETAILS</div>

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
                <td> <input type="text" class="subfield" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">CONTACT NUMBER</div>
                </td>
                <td> <input type="text" class="subfield" name="phone" pattern="[0-9]{10}" required/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">PROFILE IMAGE</div>
                </td>
                <td> <input type="file"
                        style="margin-top:5px;background: #cfcaff;  box-sizing: border-box;border: 1px solid rgba(0, 0, 0, 0.25);border-radius: 36px;"
                        name="proImg" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">BUSINESS CERTIFICATE</div>
                </td>
                <td> <input type="file"
                        style="margin-top:5px;background: #cfcaff;  box-sizing: border-box;border: 1px solid rgba(0, 0, 0, 0.25);border-radius: 36px;"
                        name="doc" /></td>
            </tr>
        </table>
        <input type="submit" class="btn" value="Sign Up" name="signup"/>
        </form>
        <p style="margin-left:500px;margin-top:-32px;">Already have an account <a href="login.php"
                style="text-decoration:none;color:white;">Login</a></p>


    </div>

<script>
    var nic = document.getElementById("nic");

    nic.addEventListener('input', () => {
    nic.setCustomValidity('');
    nic.checkValidity();
    });

    nic.addEventListener('invalid', () => {
    if(nic.value === '') {
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
    if(pwd.value === '') {
        pwd.setCustomValidity('Enter password!');
    } else {
        pwd.setCustomValidity('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters');
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

 