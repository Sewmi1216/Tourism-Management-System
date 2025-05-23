<?php session_start();
include_once '../api/addhotel.php';?>
<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <a href="home.php" class="logo"><img src="../images/logo.png" alt="Logo" height="50px" width="90px"
                style="margin-left:45px;padding-right:0px;"></a>
        <!-- <div style="font-size: 25px;line-height: 40px;color: rgba(37, 53, 81, 1);margin-top:10px;">Pack2Paradise</div> -->
        <div class="header-right">
            <a href="../view-hotel/home.php">HOME</a>
            <a href="login.php" style="margin-left:60px;">LOGIN</a>
        </div>
    </header>
    <div class="registerForm">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="heading" style="margin-top:0px;">Hotel Registration</div>
            <hr>
            <div class="subheading" style="margin-top:15px;">Hotel Name*</div>
            <input type="text" class="field" style=";margin-top:12px;" name="hotelName" required/>
            <!--
            <div class="subheading" style="margin-top:15px;">Hotel Details</div> -->

            <table>
                <tr>
                    <td>
                        <div class="content">Address</div>
                        <input type="text" class="subfield" name="address" required/>
                    </td>
                    <td>
                        <div class="content">Contact Number</div>
                        <input type="text" class="subfield" name="phone" pattern="[0-9]{10}" required />
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="content">Business Certificate</div>
                        <input type="file" class="subfield" name="doc" style="padding-bottom:25px;" required/>
                    </td>
                    <td>
                        <div class="content">Profile Image</div><input type="file" style="padding-bottom:25px;"
                            class="subfield" name="proImg" required/>
                    </td>
                </tr>
                <tr>

                    <td>
                        <div class="content">Email address</div>
                        <input type="text" class="subfield" name="email"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
                    </td>
 <?php
if (!isset($_SESSION["error"])) {
    $_SESSION["error"] = null;
} else {
    echo "<div class='s' style='color:red;'>";
    echo $_SESSION["error"];
    echo "</div>";
    unset($_SESSION["error"]);
}?>

                    <td>
                        <div class="content">Password</div>
                       
                        <input type="password" class="subfield" name="password" id="password"
                            pattern="^[a-zA-Z0-9]{8}$" required />
                        <div id="msg" style="color:red;"></div>
                    </td>
                </tr>
            </table>
        
            <div class="subheading" style="margin-top:15px;">Contact Person Details</div>

            <table>
                <tr>
                    <td>
                        <div class="content">Name</div>
                        <input type="text" class="subfield" name="mName" requied/>
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
                <!-- <tr>
                    <td>
                        <div class="content">Username</div>
                        <span id="check-username"></span></br>
                        <input type="text" class="subfield" name="username" id="username" oninput="checkUsername()"
                            required />
                    </td>
                    <td>
                        <div class="content">Password</div>
                        <input type="password" class="subfield" name="password" id="password" required />
                        <input type="password" class="subfield" name="password" id="password"
                            pattern="^[a-zA-Z0-9]{1,12}$" required />
                        <div id="msg" style="color:red;"></div>
                    </td>
                </tr> -->

            </table>

            <input type="submit" class="btnRegister" id="signup" value="Sign Up" name="signup" />
            <p style="margin-top:-32px;text-align:center;">Already have an account <a href="login.php"
                    style="text-decoration:none;color: #004581;" class="text">Login</a></p>
        </form>


    </div>

    <script>
    function checkUsername() {
        $.ajax({
            url: "../api/check.php",
            method: "POST",
            data: 'username=' + $("username").val(),
            success: function(data) {
                console.log(data);
                $("#check-username").html(data);
            }
        });

    }
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
                'Must contain at least 8 characters'
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