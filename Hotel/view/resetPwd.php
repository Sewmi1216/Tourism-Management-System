<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
</head>

<body>


  <div class="form" style="margin-top:145px;">
    <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">Reset Password</div>
    <form class="login-form" method="POST">
      <label style="font-size:15px;padding:10px;" class="text">New password</label>
      <input type="password" class="field" name="username"/>
      <label style="font-size:15px;padding:10px;" class="text">Re-enter new password</label>
      <input type="password" class="field" name="username"/>
      <input type="submit" class="btn" value="Reset" style="margin-top:42px;" name="signIn">
      </form>
  </div>


</body>

</html>