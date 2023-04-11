<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:login.php");
}
?>

<!DOCTYPE html>

<head>
    <title>Pack2Paradise</title>
    <!-- <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
</head>

<body>


    <div class="form" style="margin-top:145px;">
        <div class="text" style="text-align:center;font-size:30px;margin-bottom:35px;">Reset Password</div>
        <form class="login-form" name="resetPasswordForm" method="POST" onSubmit="return validateResetPassword()">
              <?php
require_once "../controller/roomTypeController.php";
$pwd = new hotelController();
$result = $pwd->validateUser($email);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "0 results";
}

        ?>
            <input type="text" name="userID" value="<?php echo $row["userID"]; ?>" readonly />
            <label style="font-size:15px;padding:10px;" class="text">New password</label>
            <input type="password" class="field" name="npwd" />
            <label style="font-size:15px;padding:10px;" class="text">Re-enter new password</label>
            <input type="password" class="field" name="cpwd" />
            <input type="submit" class="btn" value="Reset" style="margin-top:42px;" name="reset">

        </form>
    </div>
<script>
function validateResetPassword(){
            var password = document.forms["resetPasswordForm"]["npwd"].value;
            var confirm_password = document.forms["resetPasswordForm"]["cpwd"].value;
            if (password.length < 8) {
                alert("Password must have at least 8 characters");
                return false;
            }else if (password != confirm_password) {
                alert("Confirm your password correctly");
                return false;
            }else{
                return true;
            }
        }
    </script>
</body>

</html>