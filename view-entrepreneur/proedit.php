<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
    header("location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">Edit Profile</div>
        <div class="registerForm">
        <form method="post" action="../api/addentreapi.php" enctype="multipart/form-data">
        <?php
                    require_once "../controller/entrepreneurController.php";
                    $entrepreneur = new entrepreneurController();
                    $results = $entrepreneur->viewAll($id);
                    foreach ($results as $result){
                        ?>
            
            <div class="subheading" style="margin-top:15px;">Business Name*</div>
            <input type="text" class="field" style=";margin-top:12px;" name="businessName"  value="" />
            <div class="subheading" style="margin-top:15px;">Contact Person Details</div>

            <table>
                <tr>
                    <td>
                        <div class="content">Name</div>
                        <input type="text" class="subfield" name="eName" value="<?php echo $result["entrepreneurName"] ?>" />
                        
                    </td>
                    
                    <td>
                        <div class="content">Contact Number</div>
                        <input type="text" class="subfield" name="ePhone" value="<?php echo $result["entrepreneurPhone"] ?>" pattern="[0-9]{10}" required />
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <div class="content">NIC</div>
                        <input type="text" class="subfield" id="nic" name="eNic" value="<?php echo $result["entrepreneurNic"] ?>" pattern="[0-9]{9}[Vv0-9]{1,3}"
                            required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Username</div>
                        <input type="text" class="subfield" name="username" value="<?php echo $result["username"] ?>" required />
                    </td>
                    <td>
                        <div class="content">Password</div>
                        <input type="password" class="subfield" name="password" value="<?php echo $result["password"] ?>" id="password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                        <div id="msg" style="color:red;"></div>
                    </td>
                </tr>

            </table>
            <div class="subheading" style="margin-top:15px;">Business Details</div>

            <table>
                <tr>
                    <td>
                        <div class="content">Address</div>
                        <input type="text" class="subfield" name="address" value="<?php echo $result["address"] ?>"/>
                    </td>
                    <td>
                        <div class="content">Email address</div>
                        <input type="text" class="subfield" name="email"  value="<?php echo $result["email"] ?>"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Contact Number</div>
                        <input type="text" class="subfield" name="phone"  value="<?php echo $result["phone"] ?>" pattern="[0-9]{10}" required />
                    </td>
</tr>
<tr>
                    <td>
                        <div class="content">Profile Image</div>
                        <td> <?php echo "<img src='' style=
                    'width:200px;height: 200px;margin-left:45px;padding-right:0px;' id='fileImg'>"; ?>
                        <input type="file" class="subfield" name="fileImg" />
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="content">Business Certificate</div>
                        <td> <?php echo "<img src='' style=
                    'width:200px;height: 200px;margin-left:45px;padding-right:0px;' id='fileImg'>"; ?>
                        <input type="file" class="subfield" name="fileDoc" />
                    </td>
                        <input type="file" class="subfield" name="doc" style="padding-bottom:25px;" />
                    </td>
                </tr>
                <?php }

?>
     


            </table>
            <input type="submit" class="btnRegister" value="Update" name="update" />
            
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


                
</section>


</body>

</html>