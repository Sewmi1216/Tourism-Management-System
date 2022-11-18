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

<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>

    <div class="form">
        <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">LOGIN</div>
        <form class="login-form" method="POST">
            <label style="font-size:15px;padding:10px;" class="text">Username</label>
            <input type="text" class="field" name="username" placeholder="Enter your username" />
            <label style="font-size:15px;padding:10px;" class="text">Password</label>
            <input type="password" class="field" name="password" placeholder="********" />


            <a href="recoverPwd.php" style="float:right;text-decoration:none;margin-bottom:10px;" class="message">Forgot
                password</a>
            <?php

if(!isset($_SESSION["attempts"])){
    $_SESSION["attempts"]=null;
}

if ($_SESSION["attempts"] > 2) {
    $_SESSION["locked"] = time();
    echo "plz wait for 5 sec";
} else {
    ?>



            <input type="submit" class="btn" value="Sign In" name="signIn">
            <?php }?>


            <p class="message">Don't have an account <a href="hotelSignup.php" style="text-decoration:none;">Sign up for
                    free</a></p>
        </form>
    </div>


</body>

</html>