<!DOCTYPE html>
<html>
<head>
  <title> Log In</title>
  <link rel="stylesheet" href="../css/tlogin.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>

    <div class="navbar"> 
        <ul>
          <img src="../img/logo.png" alt=" logo" style="width:55px;height:40px; margin-left: 20px; margin-top: 5px;" >

        <a class="abt" href="#">ABOUT</a>
        <a class="contact" href="#">CONTACT US</a>
       
         <div class="home-btn">
          <img class="home-img" src="../img/home.png" alt="">
         <a class="home-text" href="#">HOME</a>
          </div>
        </ul>
      </div>


      <form action="../api/touristloginapi.php" method="POST">
  

        <div class="container">
            <div class="wc">
                <p>WELCOME BACK</p>     
            </div>
            <div class="note">
                <p>Welcome back! Please enter your details.</p>
            </div>
        
        
          <label for="uname"><b>Email</b></label>
          <input type="text" placeholder="Enter your email" name="username" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter password" name="password" required>

          <label>
            <input class="box" type="checkbox" checked="checked" name="check"> Remember me 
            <a class="forgot" href="#">Forgot password</a>
          </label>
          
              
          <button class="signin" type="submit">Sign In</button>

          <div class="social">
            <div class="gb">
                <div class="icon">
                    <img src="../img/glicon.png">
                </div>
                <button class="googlebtn">Sign in with Google</button>
            </div>

            <p class="signup">Don’t have an account? <a class="free" href="./initiate.php">Sign up fo free!</a><p>
          
         
        </div>
      
      
        
      </form>

    </body>
    </html>