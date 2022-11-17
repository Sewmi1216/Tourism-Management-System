
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="../css/stylenew.css?v=<?php echo time(); ?>">
		<body>
		</div>
			<div class="loginbox">
				<h1>LOGIN</h1>
				<h5>Welcome back! Please enter your details.</h3>
				<form class="login-form" method="POST" action="../api/loginapi.php">
                    <p><label for="fname">Username*</label></p><br>
                    <input type="text" id="fname" name="username" value="Enter Username Here"><br>
                    <p><label for="lname">Password*</label><br></p>
                    <input type="text" id="lname" name="password" value="Enter Password Here"><br>
					<a href="Recover.php" style="float:right;text-decoration:none;margin-bottom:10px;" class="message">Forgot password</a>
					<input type="submit" class="btn" value="Login" name="signIn">
					
					<p>Don't have an account?<a href="Registration.php" style="text-decoration:none;" >Sign up</a></p>
					
</form> 

				
				
			</div>
		</body>
	</head>
</html>