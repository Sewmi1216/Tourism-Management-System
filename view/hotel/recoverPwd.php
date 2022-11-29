<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <!-- <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>

    <div class="form" style="margin-top:125px;">
        <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">Recover Password</div>
        <form class="login-form" method="POST">
            <label style="font-size:15px;padding:10px;" class="text">Email Address</label>
            <input type="text" class="field" name="username" placeholder="Enter your email" />
            <input type="submit" class="btn" value="Recover" style="margin-top:42px;" name="signIn">
        </form>
    </div>


</body>

</html>