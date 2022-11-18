<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <link rel="stylesheet" href="../css/rstyle.css?v=<?php echo time(); ?>">
</head>


<body>
<header>
        <a href="#default" class="logo"><img src="../Images/Travel and Tourism Logo.png" alt="Logo" height="40px"
                width="90px" style="margin-left:45px;padding-right:0px;"></a>
        <div style="font-size: 25px;line-height: 40px;color: rgba(37, 53, 81, 1);margin-top:10px;">Pack2Paradise</div>
        <div class="header-right" style="float:right">
        <a href="#home">HOME</a>
        <a href="#contact" style="margin-left:60px;margin-top:-8px;"><img src="../Images/Profile.jpg" alt="Logo"
                height="40px" width="40px" style="padding-right:0px;border-radius:50%;"></a>
        <a class="active" href="login.php" style="padding:10px;margin-left:60px;">LOGOUT</a>
        </div>
    </header>

    <div class="heading" style="color:white;margin-left:70px;margin-top:15px;">ENTREPRENEUR REGISTRATION</div>
        <div class="registerForm" style="">
        <form action="../api/addentreapi.php" method="post" enctype="multipart/form-data">       
        <label for="email"><b>BUSSINESS NAME</b></label>
        <input type="text" placeholder="Enter Bussiness Name" name="bussinessName" required>
        <h4>CONTACT ENTREPRENURE DETAILS</h4>

   <div class="row">
      <div class="col-25">
        <label for="fname"> Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="eName" placeholder="Your name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="nic"> NIC</label>
      </div>
      <div class="col-75">
        <input type="text" id="NIC" name="eNic" placeholder="Your NIC..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone"> Contact Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="PHONE" name="ePhone" placeholder="Your phone..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone"> Email Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="eEmail" placeholder="Your email..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone"> User Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="username" placeholder="Your username..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone"> Password</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="password" placeholder="Your password..">
      </div>
    </div>
    <h4>BUSSINESS DETAILS</h4>
    <div class="row">
      <div class="col-25">
        <label for="phone"> Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="PHONE" name="address" placeholder="Enter address..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone"> Contact Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="PHONE" name="phone" placeholder="Enter phone..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone"> Email Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="PHONE" name="email" placeholder="Enter email..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone"> Profile Image</label>
      </div>
      <div class="col-75">
      <input type="file"  name="proImg" />
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone"> Bussiness Certificate</label>
      </div>
      <div class="col-75">
      <input type="file"name="doc" />
      </div>
    </div>

    
    
    
        <hr>
        

        <button type="submit" class="registerbtn" name="register">Register</button>
    </div>

  
   
    <p>Already have an account? <a href="Login.php">Login</a></p>
       
        </div>
</form>




</body>

</html>