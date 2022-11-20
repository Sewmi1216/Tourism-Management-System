<?php
include '../controller/entrepreneurController.php';

if (isset($_POST['signIn'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $entrepreneurcon = new entrepreneurController();
    $entrepreneurcon->userLogin($username, $password);
}
?>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/stylenew.css?v=<?php echo time(); ?>">
</head>

<body>


    <div class="loginbox">
        <h1>LOGIN</h1>
        <h5>Welcome back! Please enter your details.</h3>
            <form class="login-form" method="POST" >
                <p><label for="fname">Username*</label></p><br>
                <input type="text" id="fname" name="username" placeholder="Enter user name.."><br>
                <p><label for="lname">Password*</label><br></p>
                <input type="text" id="lname" name="password" placeholder="********"><br>
                <?php if (isset($_SESSION["error"])) {?>
                    <p style="color:red;"><?php $_SESSION["error"];?></p>
            <?php unset($_SESSION["error"]);}?>
                <a href="Recover.php" style="float:right;text-decoration:none;margin-bottom:10px;"
                    class="message">Forgot password</a>
                <input type="submit" class="btn" value="Login" name="signIn">

                <p>Don't have an account?<a href="signup.php" style="text-decoration:none;">Sign up</a></p>

            </form>



    </div>
</body>

</html>