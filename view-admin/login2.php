<?php
/*
include '../controller/adminController.php';
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
    $admincon = new adminController();
    $admincon->userLogin($username, $password);

}
*/
?>

<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/newlogin.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>

    <div  class="form">

        <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">LOGIN</div>

        <form class="login-form" method="POST" action="../api/aloginapi.php">
            <label style="font-size:15px;padding:10px;" class="text">Username</label>

            <input type="text" class="field" onfocus="this.placeholder=''" name="username" placeholder="Enter your username" />

            <label style="font-size:15px;padding:10px;" class="text">Password</label>

            <input type="password" class="field" name="password" placeholder="********" onfocus="this.placeholder=''" />
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
} else 
{
    ?>
            <input type="submit" class="btn text" value="Log In" name="signIn">

            <?php }?>

        </form>
    </div>


</body>

</html>