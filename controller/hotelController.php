<?php
error_reporting(E_ERROR | E_PARSE);

include '../model/hotel.php';

class hotelController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($email, $password)
    {
        $hoteluser = new hotel();
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
    public function checkEmail($email)
    {
        $user = new hotel();
        $rlt = $user->checkEmail($email);
        return $rlt;

    }
    public function addHotel($hotelName, $address, $email, $phone, $fileImg, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        $user = new hotel();
        $mailcheck = $user->checkEmail($email);

        if ($mailcheck > 0) {
            $_SESSION['error'] = "Email is already registered";
        } else {
            $result = $user->insertHotel($hotelName, $address, $email, $phone, $fileImg, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc);

            if (!$result) {
                echo 'There was a error';
            } else {
                echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view-hotel/login.php';
        </script>";
            }
        }
    }
    public function viewProfile($id)
    {
        $profile = new hotel();
        $rs = $profile->viewProfile($id);
        return $rs;

    }
    public function UpdateProfile($id, $name, $address, $email, $phone, $username, $password, $managerName, $managerPhone, $managerEmail, $managerNic)
    {

        $hp = new hotel();
        $hp->updateProfile($id, $name, $address, $email, $phone, $username, $password, $managerName, $managerPhone, $managerEmail, $managerNic);

        if (!$hp) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {

            echo "<script>
        window.location.href = '../view-hotel/profile.php';
        </script>";

        }

    }
    public function recoverPwd($email)
    {
        $rec = new hotel();
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
                http://localhost/Tourism-Management-System/view-hotel/resetPwd.php
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

    // public function validateUser($email)
    // {
    //     $hoteluser = new hotel();
    //     $res = $hoteluser->recPwd($email);
    //     return $res;

    // }

    public function resetPwd($email, $password)
    {
        $user = new hotel();
        $checkUser = $user->validate($email);

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

        } else if (mysqli_num_rows($checkUser[3]) > 0) {
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
            echo 'Error';
        }

    }
    public function countReservations()
    {
        $hoteluser = new hotel();
        $res = $hoteluser->countReservations();
        return $res;
    }
    public function countRoomTypeReservations()
    {
        $hoteluser = new hotel();
        $res = $hoteluser->countRoomTypeReservations();
        return $res;
    }

     public function revenue()
    {
        $hoteluser = new hotel();
        $res = $hoteluser->revenue();
        return $res;
    }
    public function viewAllmanagers()
    {
        $user = new hotel();

        $result = $user->viewAllmanagers();
        $_SESSION['c'] = $result;
        return $result;
    }

    public function canceledReservations()
    {
        $hoteluser2 = new hotel();
        $res2 = $hoteluser2->canceledReservations();
        return $res2;
    }
     public function todayRevenue()
    {
        $hoteluser3= new hotel();
        $res3 = $hoteluser3->todayRevenue();
        return $res3;
    }
     public function pendingPayments()
    {
        $hoteluser3= new hotel();
        $res3 = $hoteluser3->pendingPayments();
        return $res3;
    }

    public function viewhotelPayments($id)
    {
        $hoteluser3 = new hotel();
        $result3 = $hoteluser3->viewhotelPayments($id);

        return $result3;
    }
    public function get_payments($id)
    {
        $hoteluser4 = new hotel();
        $result4 = $hoteluser4->get_payments($id);
        return $result4;

    }

    public function viewGuestReservations($id)
    {
        $hoteluser4 = new hotel();
        $result4 = $hoteluser4->viewGuestReservations($id);
        return $result4;
    }
    public function viewAdminReservations($id)
    {
        $hoteluser4 = new hotel();
        $result4 = $hoteluser4->viewAdminReservations($id);
        return $result4;
    }
    public function viewPendingReservations($id)
    {
        $hoteluser5 = new hotel();
        $result5 = $hoteluser5->viewPendingReservations($id);
        return $result5;
    }

    public function viewAllpendingmanagers()
    {
        $user = new hotel();

        $result = $user->viewAllpendingmanagers();
        $_SESSION['c'] = $result;
        return $result;
    }

    public function viewonemanager($inputs)
    {
        $user = new hotel();

        $result = $user->viewonemanager($inputs[0]);

        $_SESSION['c'] = $result;
        return $result;
    }

    public function removehotel($id)
    {

        $user = new hotel();

        $result = $user->removehotel($id);

        $_SESSION['c'] = $result;
        return $result;
    }

    public function removehotelrequest($id)
    {

        $user = new hotel();

        $result = $user->removehotelrequest($id);

        $_SESSION['c'] = $result;
        return $result;
    }

    public function accepthotelrequest($id)
    {

        $user = new hotel();

        $results = $user->accepthotelrequest($id);
        // $_SESSION['c'] = $result;
        //return $result;
        foreach ($results as $result) {
            $hemail = $result['email'];
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
            $mail->setFrom('sewmi.rotaract3220@gmail.com', 'Approve account');
            // get email from input
            $mail->addAddress($hemail);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject = "Your account is approved";
            $mail->Body = "<b>Dear User</b>
                    <h3>Your account is approved</h3>";

            if (!$mail->send()) {?>
                <script>alert("<?php echo "Error sending email to " . $hemail ?>");
            </script>
<?php
} else {
                ?>
<script>
alert("<?php echo "Email sent to " . $hemail ?>");
</script>
<?php
}}

    }

    public function viewdeletedmanagers()
    {
        $user = new hotel();

        $result = $user->viewdeletedmanagers();
        $_SESSION['c'] = $result;
        return $result;
    }
    public function updateStatus($reservationid, $newStatus)
    {
        $user = new hotel();

        $result = $user->updateStatus($reservationid, $newStatus);
        if($result){
            echo "<script>alert('status update is sucessful');
              </script>";
        }
    }
   
    //  public function chatUser()
    // {
    //     $hotel = new hotel();
    //     $result = $hotel->chatUser();
    //     return $result;
    // }

}
