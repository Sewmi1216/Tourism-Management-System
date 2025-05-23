<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
</head>

<body>
<?php include "header.php"?>
    <div class="registerForm">
        <form method="post" action="../api/guideapi.php" enctype="multipart/form-data">
            <div class="heading" style="margin-top:0px;">Tour Guide Registration</div>
            <hr>
            
            <div class="subheading" style="margin-top:15px;">Contact Person Details</div>

            <table>
                <tr>
                    <td>
                        <div class="content">Name</div>
                        <input type="text" class="subfield" name="name" />
                    </td>
                    <td>
                        <div class="content">Contact Number</div>
                        <input type="text" class="subfield" name="phone" pattern="[0-9]{10}" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Email Address</div>
                        <input type="text" class="subfield" name="email"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
                    </td>
                    

                    

                    <td>
                        <div class="content">NIC</div>
                        <input type="text" class="subfield" id="nic" name="nic" pattern="[0-9]{9}[Vv0-9]{1,3}"
                            required />
                    </td>
                </tr>
                <tr>
                   
                    <td>
                        <div class="content">Password</div>
                        <input type="password" class="subfield" name="password" id="password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                        <div id="msg" style="color:red;"></div>
                    </td>
                    <td>
                        <div class="content">Languages</div>
                        <input type="text" class="subfield" name="language" />
                    </td>
                </tr>

                <tr>
                    
                    <!-- <td>
                        <div class="content">Availability</div>
                        <input type="text" class="subfield" name="availability"
                            required />
                    </td> -->
                     <td>
                        <div class="content">Profile Image</div><input type="file" style="padding-bottom:25px;"
                            class="subfield" name="proImg" />
                    </td>
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
                        <input type="text" class="subfield" name="vehicle" />
                    </td>
                    <td>
                        <div class="content">Vehicle Type</div>
                        <input type="text" class="subfield" name="type" required />
                    </td>
                    
                </tr>
                <tr>
                <td>
                        <div class="content">Number of passengers that can be carried</div>
                        <input type="number" class="subfield" min="0" name="passengers" required />
                    </td>
</tr>
            </table>
            <input type="submit" class="btnRegister" value="Sign Up" name="signup" />
            <p style="margin-top:-32px;text-align:center;">Already have an account <a href="Login.php"
                    style="text-decoration:none;color: #004581;" class="text">Login</a></p>
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