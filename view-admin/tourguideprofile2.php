<?php 
require('../api/tourguideprofile.php');
$rows = $_SESSION['c'];
// print_r($rows);
// die();
?>



<!DOCTYPE html>
<html>
<head>
  <title> User Profile</title>
  <link rel="stylesheet" href="../css/profile.css">
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
        <h2 style="color:white"><b>TOUR GUIDE PROFILE</b></h2>
        </div>
        <?php

foreach($rows as $row) 
echo '
        <div class="tab" >
            <div class="centered">
                <img src="../img/lithu.png" alt="lithu">
                <h2><b>  '.$row['name'].'</b></h2>
                <p><b> '.$row['username'].'</b></p>
              </div>
            

            <div class="vl">
             <div class="ldetails"> 
                <p>E-mail</p> 
                <p> '.$row['email'].'</p><br>
            
                <p>Phone Number</p> 
                <p> '.$row['phone'].'</p><br>
                <p>Address</p> 
                <p> '.$row['address'].'</p><br>
                <p>NIC</p> 
                <p> '.$row['nic'].'</p><br>
                <p>Date of Birth</p> 
                <p> '.$row['name'].'</p><br>
                <p>Country of Origin</p> 
                <p> '.$row['name'].'</p><br>
               
             </div>
             '  ?>
            
             
            
        </div>

        
       
        
</body>
</html>