<?php
include '../controller/hotelController.php';
session_start();
//if(isset($_SESSION["attempts"])){
if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["locked"];
    if ($difference > 5) {
        unset($_SESSION["locked"]);
        unset($_SESSION["attempts"]);
    }
}
//}

if (isset($_POST['signIn'])) {
    // session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hotelcon = new hotelController();
    $hotelcon->userLogin($username, $password);
}
?>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/entrepreneur_login.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="loginbox">
        <h1>LOGIN</h1>
        <h5>Welcome back! Please enter your details.</h3>
            <form class="login-form" method="POST" >
                <p><label for="fname">Username*</label></p><br>
                <input type="text" class="field" onfocus="this.placeholder=''" name="username"
                placeholder="Enter your username" />
                <p><label for="lname">Password*</label><br></p>
                <input type="password" class="field" name="password" placeholder="********" onfocus="this.placeholder=''" />
                <a href="Recover.php" style="float:right;text-decoration:none;margin-bottom:10px;"
                    class="message">Forgot password</a>

            <?php

if (!isset($_SESSION["pwderror"])) {
    $_SESSION["pwderror"] = null;
} else {
    echo "<p class='text' style='color:red;margin-left:3px;padding:13px;'>";
    echo $_SESSION["pwderror"];
    echo "</p>";
    unset($_SESSION["pwderror"]);
}
if (!isset($_SESSION["usernameerror"])) {
    $_SESSION["usernameerror"] = null;
} else {
    echo "<p class='text' style='color:red;margin-left:3px;padding:13px;'>";
    echo $_SESSION["usernameerror"];
    echo "</p>";
    unset($_SESSION["usernameerror"]);
}

if (!isset($_SESSION["attempts"])) {
    $_SESSION["attempts"] = null;
}

if ($_SESSION["attempts"] > 2) {
    $_SESSION["locked"] = time();
    echo "<p class='text' style='color:red;margin-left:3px;padding:20px;'>Try again after 30 seconds</p>";
} else {
    ?>



           <input type="submit" class="btn" value="Login" name="signIn">
                <?php }?>

                <p>Don't have an account?<a href="signup.php" style="text-decoration:none;">Sign up</a></p>

            </form>



    </div>
</body>

</html>