<html lang="en">
<head>
   <link rel="stylesheet" href="../css/addtouristguide.css">
    <title>Document</title>
</head>
<body>
    <div class="add"> <h2>ADD NEW TOURIST GUIDE</h2> </div>

    <form action="../api/addtourguide.php" method = "POST" style="border:1px solid #ccc">
        <div class="container">
         
      
          <label for="pckgname"><b>Tourist Guide Name</b></label> <br>
          <input type="text" placeholder="Enter Tourist Guide Name" name="guidename" required>
      <br>
          <label for="nic"><b> NIC </b></label> <br>
          <input type="text" placeholder="Enter Tourist Guide ID" name="nic" required>
          <br>
          <label for="username"><b>Tourist Guide User Name</b></label><br>
          <input type="text" placeholder="Repeat Password" name="guideusername" required>
          <br>  
          <label for="emailaddress"><b>E-Mail Address</b></label><br>
          <input type="text" placeholder="Tourist guide's email address" name="guideemail" required>
          <br>
          <label for="address"><b>Address</b></label><br>
          <input type="text" placeholder="Tourist guide's physical address" name="guideaddress" required>
          <br>
          <label for="Phone"><b>Phone Number</b></label><br>
          <input type="text" placeholder="Contact number" name="guidephone" required>
          <br>
          <label for="pswd"><b>Password</b></label><br>
          <input type="password" placeholder="Enter the password" name="guidepassword" required>
          <br>
          <label for="rpt-pswd"><b>Re-Enter the Password</b></label><br>
          <input type="password" placeholder="Re-enter the password" name="guidepassword2" required>
          <br>
          <div class="clearfix">
            <a href="tourguides.html" target="main"><button type="button" class="cancelbtn">CANCEL</button></a>
            <a href="tourguides.html" target="main"><button type="submit" class="signupbtn">ADD Tourist Guide</button></a>
          </div>
        </div>
      </form>
</body>
</html>