<!DOCTYPE html>
<html>
<head>
  <title> Edit Profile</title>
  <link rel="stylesheet" href="../css/edit.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>

  <div class="navbar">
  <ul>
    <img src="../img/logo.png" alt=" logo" style="width:40px;height:40px; margin-left: 20px;" >
    <li style="float:right"><a  href="#home">Home</a></li>
    <li style="float:right"><a  href="#contactus">Contact Us</a></li>
    <li style="float:right"><a href="#about">About</a></li>
  </ul>
</div>

<div class="heading">
<h2 style="color:white"><b>EDIT  PROFILE</b></h2>
</div>

<div class="container">
  <form action="/action_page.php">
  
  <div class="row">
    <div class="col-25">
        <label for="name">Name</label>
    </div>
    <div class="col-75">
        <input type="text" id="name" name="name">
    </div> 
  </div>
  
  
  <div class="row">
    <div class="col-25">
        <label for="uname">Username</label>
    </div>
    <div class="col-75">
        <input type="text" id="uname" name="uname">
    </div> 
  </div>
  
  
  <div class="row">
    <div class="col-25">
        <label for="email">E-mail</label>
    </div>
    <div class="col-75">
        <input type="text" id="email" name="email">
    </div> 
  </div>
  
  
  <div class="row">
    <div class="col-25">
        <label for="pno">Phone No</label>
    </div>
    <div class="col-75">
        <input type="text" id="pno" name="pno">
    </div> 
  </div>
  
  
  <div class="row">
    <div class="col-25">
        <label for="add">Address</label>
    </div>
    <div class="col-75">
        <input type="text" id="add" name="add">
    </div> 
  </div>
  
  
  <div class="row">
    <div class="col-25">
        <label for="lan">Languages</label>
    </div>
    <div class="col-75">
        <input type="text" id="lan" name="lan">
    </div> 
  </div>
  
  <div class="row">
    <div class="col-25">
        <label for="dob">Date of Birth</label>
    </div>
    <div class="col-75">
        <input type="text" id="dob" name="dob">
    </div> 
  </div>
  
    
  <br>

  <div class="cancel">
    <input type="submit"  value="CANCEL" > 
  </div>

  <div class="save">
    <input type="submit" value="SAVE CHANGES">
  </div>

  </form>
</div>

  
  </body>
  </html>