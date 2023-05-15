<?php
include '../controller/userController.php';
session_start();
//if(isset($_SESSION["attempts"])){
if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["locked"];
    if ($difference > 3) {
        unset($_SESSION["locked"]);
        unset($_SESSION["attempts"]);
    }
}
//}

if (isset($_POST['signIn'])) {
    // session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password =md5($password);
    $hotelcon = new userController();
    $hotelcon->userLogin($email, $password);
}
?>

<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>
    <div style="margin-top:75px;"></div>
    <div class="form">
        <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">LOGIN</div>
        <form class="login-form" method="POST">
            <label style="font-size:15px;padding:10px;" class="text">Email</label>

            <input type="text" class="field" onfocus="this.placeholder=''" name="email"
                placeholder="Enter your email" />
            <label style="font-size:15px;padding:10px;" class="text">Password</label>
            <input type="password" class="field" name="password" placeholder="********" onfocus="this.placeholder=''" />


            <a href="recoverPwd.php" style="float:right;text-decoration:none;margin-bottom:10px;" class="text">Forgot
                password</a>
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

if ($_SESSION["attempts"] > 3) {
    $_SESSION["locked"] = time();
    echo "<p class='text' style='color:red;margin-left:3px;padding:20px;'>Try again after 30 seconds</p>";
} else {
    ?>



            <input type="submit" class="btn text" value="Sign In" name="signIn">

            <?php }?>


            <p class="message text">Don't have an account <a href="../view-tourist/initiate.php" class="text"
                    style="text-decoration:none;">Sign up for
                    free</a></p>
        </form>
    </div>


</body>

</html>