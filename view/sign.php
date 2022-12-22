<?php 
session_start()
?>

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
        <button type="button" class="homebtn">Home</button> <br>


        <div class="ln1">
            <p>Hey, We are glad you chose <br>Pack2Paradise &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

        </div>

        <br>
    </div>


    <div class="ls">
        <div class="ls1"></div>
        <div class="label">Let’s get started</div>
        <div class="ls2"></div>
        <br>
    </div>

    <div class="social">
        <div class="gb">
            <div class="icon">
                <img src="../img/glicon.png">
            </div>
            <button class="googlebtn">Google Account</button>
        </div>
        <div class="fb">
            <div class="icon-2">
                <img src="../img/fb.png">
            </div>
            <button class="facebookbtn">Facebook Account</button>
        </div>
    </div>





    <div class="btn-group">

        <form action="../api/signupapi.php" method="POST">
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

            <div class="e">
                <label for="email"><b>Email</b> </label> <br>
                <?php 
                if(isset($_SESSION['err'])){
                    echo'<span class="email-err">' . $_SESSION['err'] .  '</span>';
                    $_SESSION['err'] = '';
                }?>
               
            </div>

            <div class="b">
                <input type="email" placeholder="Please enter your email address" name="email" required><br>
            </div>

            <div class="h">
                <label for="dob"><b>Date</b></label><br>
            </div>

            <div class="b">
                <input type="date" placeholder="Please  enter your DOB" name="dob" required><br><br>
            </div>


            <div class="d">
                <label for="psw"><b>Password</b></label><br>
            </div>

            <div class="b">
                <input type="password" placeholder="Please  enter a password" name="psw" required><br><br>
            </div>

            <div class="f">
                <label for="address"><b>District</b></label><br>
            </div>

            <div class="b">
                <input type="text" placeholder=" Enter your District" name="address" required><br>
            </div>

            <div class="g">
                <label for="country"><b>Country</b></label><br>
            </div>

            <div class="b">
                <input type="text" placeholder=" Enter your Country" name="country" required><br>
            </div>
            


            <div class="submit">
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </form>

        <div class="log">
            <p style="color:rgb(255, 255, 255);"> Already have an account? <a href="./login.php" target="_blank">Log In</a> <br></p>
        </div>
    </div>

        </form>

</body>

</html>