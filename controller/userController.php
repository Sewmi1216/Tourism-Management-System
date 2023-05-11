<?php
error_reporting(E_ERROR | E_PARSE);

include '../model/user.php';

class userController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($email, $password)
    {
        $hoteluser = new user();
        $res = $hoteluser->validate($email);

        if (mysqli_num_rows($res[0]) > 0) {

            $result1 = mysqli_fetch_assoc($res[0]);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['email'] = $result1['email'];
                    $_SESSION['hotelID'] = $result1['hotelID'];

                    header("Location: ../view-hotel/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please try again shortly');</script>";
                }
            } else {
                $_SESSION["pwderror"] = "Password does not match";
                $_SESSION["attempts"] += 1;
                // echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else if (mysqli_num_rows($res[1]) > 0) {

            $result1 = mysqli_fetch_assoc($res[1]);
            if ($result1['password'] == $password) {

                $_SESSION['email'] = $result1['email'];
                $_SESSION['userID'] = $result1['userID'];

                header("Location: ../view-tourist/home.php");
                exit();

            } else {
                $_SESSION["attempts"] += 1;
                $_SESSION["pwderror"] = "Password does not match";
                // echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else if (mysqli_num_rows($res[2]) > 0) {

            $result1 = mysqli_fetch_assoc($res[2]);
            if ($result1['password'] == $password) {

                $_SESSION['email'] = $result1['email'];
                $_SESSION['adminID'] = $result1['adminID'];

                header("Location: ../view-admin/dashboard.php");
                exit();

            } else {
                $_SESSION["attempts"] += 1;
                $_SESSION["pwderror"] = "Password does not match";

                // echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else if (mysqli_num_rows($res[3]) > 0) {

            $result1 = mysqli_fetch_assoc($res[3]);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['email'] = $result1['email'];
                    $_SESSION['entID'] = $result1['entID'];

                    header("Location: ../view-entrepreneur/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please try again shortly');</script>";

                }
            } else {
                $_SESSION["attempts"] += 1;
                $_SESSION["pwderror"] = "Password does not match";

                // echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else if (mysqli_num_rows($res[4]) > 0) {

            $result1 = mysqli_fetch_assoc($res[4]);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['email'] = $result1['email'];
                    $_SESSION['tourguideID'] = $result1['tourguideID'];

                    header("Location: ../view-tour_guide/Guide_Assign_tourists.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please try again shortly');</script>";

                }
            } else {
                $_SESSION["attempts"] += 1;
                $_SESSION["pwderror"] = "Password does not match";
                // echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else {
            $_SESSION["attempts"] += 1;
            $_SESSION["usernameerror"] = "Email does not exist";

            // echo "<script type='text/javascript'>alert('Username is incorrect');</script>";

        }

    }

    public function recoverPwd($email)
    {
        $rec = new user();
        $mailcheck = $rec->checkAllEmails($email);
        $row = mysqli_fetch_assoc($mailcheck);
        $count = $row['COUNT'];

        if ($count == 0) {
            echo "<script>alert('Email is not registered');
              window.location.href = '../view-hotel/recoverPwd.php';
              </script>";
        } else {

            $_SESSION['email'] = $email;
            require "../libs/PHPMailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            // h-hotel account
            $mail->Username = 'sewmi.rotaract3220@gmail.com';
            $mail->Password = 'uaqgejykofzquoaf';

            // send by h-hotel email
            $mail->setFrom('sewmi.rotaract3220@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($email);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject = "Recover your password";
            $mail->Body = "<b>Dear User</b>
                    <h3>We received a request to reset your password.</h3>
                    <p>Kindly click the below link to reset your password</p>
                http://localhost/Tourism-Management-System/view-hotel/resetPwd.php?email=" . $email . "
                    <br><br>";

            if (!$mail->send()) {
                echo "<script>alert('Invalid Email ');
                    window.location.href = '../view-hotel/recoverPwd.php';
            </script>";?>
<?php
} else {
                ?>
<script>
alert("<?php echo "Email sent to " . $email ?>");
window.location.href = '../view-hotel/recoverPwd.php';
</script>
<?php
}

        }
    }
    public function resetPwd($email, $password)
    {
        $user = new user();
       
        $checkUser = $user->validate($email);

        // echo $checkUser[1];
//         echo "<pre>";
// print_r($checkUser);
// echo "</pre>";


        if (mysqli_num_rows($checkUser[0]) > 0) {
            $user->updateHotelPwd($email, $password);
            echo "<script>alert('Password reset is sucessful');
              window.location.href = '../view-hotel/login.php';
              </script>";

        } else if (mysqli_num_rows($checkUser[1]) > 0) {
            $user->updateTouristPwd($email, $password);
            echo "<script>alert('Password reset is sucessful');
              window.location.href = '../view-hotel/login.php';
              </script>";

        } 
        else if (mysqli_num_rows($checkUser[3]) > 0) {
            $user->updateEntPwd($email, $password);
            echo "<script>alert('Password reset is sucessful');
              window.location.href = '../view-hotel/login.php';
              </script>";

        } else if (mysqli_num_rows($checkUser[4]) > 0) {
            $user->updateGuidePwd($email, $password);
            echo "<script>alert('Password reset is sucessful');
              window.location.href = '../view-hotel/login.php';
              </script>";
        } else {
            echo 'Password reset is unsucessful';
        }

    }
        public function addHotel($hotelName, $address, $email, $phone, $fileImg, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        $user = new user();
        $mailcheck = $user->checkAllEmails($email);

        if ($mailcheck > 0) {
            $_SESSION['error'] = "Email is already registered";
        } else {
            $result = $user->insertHotel($hotelName, $address, $email, $phone, $fileImg, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc);

            if (!$result) {
                echo 'There was a error';
            } else {
                echo "<script>alert('Your form was successfully submitted. Wait for admin approval');
        window.location.href = '../view-hotel/login.php';
        </script>";
            }
        }
    }
}
