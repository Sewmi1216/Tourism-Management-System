<?php session_start();
include_once '../api/addhotel.php';?>

<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!-- <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>

    <div class="form" style="margin-top:50px;">
        <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">Recover Password</div>
        <form class="login-form" method="POST" action="../api/addhotel.php">
            <label style="font-size:15px;padding:10px;" class="text">Email Address</label>
            <input type="text" class="field" name="email" placeholder="Enter your email" required autofocus />
           
            <input type="submit" class="btn" value="Recover" style="margin-top:42px;" name="recover">
        </form>
    </div>


</body>

</html>