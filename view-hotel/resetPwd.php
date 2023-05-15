<?php
// session_start();

include_once '../api/addhotel.php';
if(isset($_GET['email'])){
    $email =$_GET['email'];
}
?>

<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!-- <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <div class="form" style="margin-top:50px;">
        <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">Reset Password</div>
        <form class="login-form" name="resetPasswordForm" method="POST" onSubmit="return validateResetPassword()">

         <input type="email" class="field" name="email" value="<?php echo $email;?>" required/>
            <label style="font-size:15px;padding:10px;" class="text">New password &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;
                <i class="fa-sharp fa-solid fa-eye-slash" id="togglePassword"></i></label>
            <input type="password" class="field" name="npwd" id="npwd" />

            <label style="font-size:15px;padding:10px;" class="text">Re-enter new password&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa-sharp fa-solid fa-eye-slash" id="togglePasswordR"></i></label>
            <input type="password" class="field" name="cpwd" id="cpwd" required/>
            <input type="submit" class="btn" value="Reset" style="margin-top:42px;" name="reset">

        </form>
    </div>
    <script>
    function validateResetPassword() {
        var password = document.forms["resetPasswordForm"]["npwd"].value;
        var confirm_password = document.forms["resetPasswordForm"]["cpwd"].value;
        if (password.length < 8) {
            alert("Password must have at least 8 characters");
            return false;
        } else if (password != confirm_password) {
            alert("Your password does not match");
            return false;
        } else {
            return true;
        }
    }
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('npwd');

    toggle.addEventListener('click', function() {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.classList.toggle('fa-eye');
    });
    const togglenew = document.getElementById('togglePasswordR');
    const npassword = document.getElementById('cpwd');

    togglenew.addEventListener('click', function() {
        if (npassword.type === "password") {
            npassword.type = 'text';
        } else {
            npassword.type = 'password';
        }
        this.classList.toggle('fa-eye');
    });
    </script>
</body>

</html>