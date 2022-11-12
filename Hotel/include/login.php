<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/hotel/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel/login.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>

  <div class="form">
    <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">LOGIN</div>
    <form class="login-form" method="POST" action="../controller/hotelController.php">
      <label style="font-size:15px;padding:10px;" class="text">Username</label>
      <input type="text" class="field" name="username" placeholder="Enter your username"/>
       <label style="font-size:15px;padding:10px;" class="text">Password</label>
      <input type="password" class="field" name="password" placeholder="********"/>
      <a href="recoverPwd.php" style="float:right;text-decoration:none;margin-bottom:10px;" class="message">Forgot password</a>
      <input type="submit" class="btn" value="Sign In" name="signIn">
      <p class="message">Don't have an account <a href="hotelSignup.php" style="text-decoration:none;">Sign up for free</a></p>
    </form>
  </div>


</body>

</html>