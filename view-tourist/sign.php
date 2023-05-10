<?php session_start();
include_once '../api/signupapi.php';?>

<!DOCTYPE html>
<html>

<head>
    <title> Sign Up</title>
    <link rel="stylesheet" href="../css/sign.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>


</head>

<body>

    <div class="up">
        <button type="button" class="homebtn" style="margin-right:1370px;"
            onclick="document.location.href='../view-hotel/login.php'">Login </button>
        <button type="button" class="homebtn" onclick="document.location.href='../view-tourist/index.php'">Home</button>
        <br>
        <div class="ln1">
            <p>Hey, We are glad you chose <br>Pack2Paradise &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </p>

        </div>

        <br>
    </div>


    <div class="ls">
        <div class="ls1"></div>
        <div class="label">Let’s get started</div>
        <div class="ls2"></div>
        <br>
    </div>
    <div class="btn-group">

        <form action="" method="POST" style="font-color:white;" enctype="multipart/form-data">
            <div class="a">
                <label for="name"><b>Name</b></label><br>
            </div>

            <div class="b">
                <input type="text" placeholder="Enter your full name" name="name" required><br>
            </div>

            <div class="c">
                <label for="mno"><b>Mobile Number</b></label><br>
            </div>

            <div class="b">
                <input type="text" placeholder=" Enter your mobile  number" name="mno" required><br>
            </div>


            <div class="h">
                <label for="dob"><b>Date of Birth</b></label><br>
            </div>

            <div class="b">
                <input type="date" placeholder="Please enter your DOB" name="dob" required><br>
            </div>

            <!-- <div class="d">
                <label for="psw"><b>Username</b></label><br>
            </div>

            <div class="b">
                <input type="text" placeholder="Please enter a username" name="username" required><br><br>
            </div> -->

            <div class="e">
                <label for="email"><b>Email</b> </label> <br>
            </div>
                  <?php
if (!isset($_SESSION["error"])) {
    $_SESSION["error"] = null;
} else {
    echo "<div class='s' style='color:red;'>";
    echo $_SESSION["error"];
    echo "</div>";
    unset($_SESSION["error"]);
}?>


            <div class="b">
                <input type="email" placeholder="Please enter your email address" name="email" required><br>
            </div>

            <div class="d">
                <label for="psw"><b>Password</b></label><br>
            </div>

            <div class="b">
                <input type="password" placeholder="Please  enter a password" name="psw" required><br><br>
            </div>

            <div class="f">
             <label for="NIC/Passport"><b>NIC/Passport No</b></label><br>
            </div>

            <div class="b">
                <input type="text" placeholder=" Enter your NIC/Passport Number" name="NIC/Passport" required><br>
            </div>



            <div class="f">
                <label for="address"><b>City</b></label><br>
            </div>

            <div class="b">
                <input type="text" placeholder=" Enter your City" name="address" required><br>
            </div>

            <div class="g">
                <label for="country"><b>Country</b></label><br>
            </div>

            <div class="b">
                <input type="text" placeholder=" Enter your Country" name="country" required><br>
            </div>

            <div class="j">
                <label for="image"><b>Profile Image</b></label><br>
            </div>

            <div class="k">
                <input type="file" placeholder="Enter your City" name="proImg"><br>
            </div>


            <div class="submit">
                <button type="submit" class="signupbtn" name="signup"
                 onclick="document.location.href='../view-tourist/index.php'">Sign Up</button>
            </div>

            


        </form>



        <div class="log">
            <p style="color:rgb(255, 255, 255);"> Already have an account? <a href="../view-hotel/login.php"
                    style="text-decoration:none;color: white;">Log
                    In</a> <br></p>
        </div>
    </div>

    </form>

  <script> 
  
  if (!preg_match('/^[0-9]{10}$/', $_POST['phone'])) {
    $errors[] = "Mobile number is invalid";
}

</script>

</body>

</html>