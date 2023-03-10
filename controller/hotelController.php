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

    public function userLogin($username, $password)
    {
        $hoteluser = new hotel();
        $res = $hoteluser->validate($username);

        if (mysqli_num_rows($res[0]) > 0) {

            $result1 = mysqli_fetch_assoc($res[0]);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['username'] = $result1['username'];
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

                $_SESSION['username'] = $result1['username'];
                $_SESSION['touristID'] = $result1['userID'];

                header("Location: ../view/home2.php");
                exit();

            } else {
                $_SESSION["attempts"] += 1;
                $_SESSION["pwderror"] = "Password does not match";
                // echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else if (mysqli_num_rows($res[2]) > 0) {

            $result1 = mysqli_fetch_assoc($res[2]);
            if ($result1['password'] == $password) {

                $_SESSION['username'] = $result1['username'];
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
                    $_SESSION['username'] = $result1['username'];
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
                    $_SESSION['username'] = $result1['username'];
                    $_SESSION['tourguideID'] = $result1['tourguideID'];

                    // header("Location: ../view-hotel/dashboard.php");
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
            $_SESSION["usernameerror"] = "Username does not exist";

            // echo "<script type='text/javascript'>alert('Username is incorrect');</script>";

        }

    }
    public function addHotel($id, $hotelName, $address, $email, $phone, $fileImg, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        $user = new hotel();

        $result = $user->insertHotel($id, $hotelName, $address, $email, $phone, $fileImg, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc);

        if (!$result) {
            echo 'There was a error';
        } else {
            echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view-hotel/hotelLogin.php';
        </script>";
        }
    }
    public function recoverPwd($email)
    {

        $rec = new hotel();
        $result = $rec->recPwd($email);

        if (mysqli_num_rows($result) > 0) {

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
                http://localhost/pack2paradise/view-hotel/resetPwd.php
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
                                </script>
                            <?php
}
        } else {
            ?>
            <script>
                            alert("<?php echo "Invalid Email " ?>");
                        </script><?php
}
    }

    public function validateUser($email)
    {
        $hoteluser = new hotel();
        $res = $hoteluser->recPwd($email);

        return $res;

    }

    public function countReservations()
    {
        $hoteluser = new hotel();
        $res = $hoteluser->countReservations();
        return $res;

    }
    public function canceledReservations()
    {
        $hoteluser2 = new hotel();
        $res2 = $hoteluser2->canceledReservations();
        return $res2;
    }
    public function viewhotelPayments()
    {
        $hoteluser3 = new hotel();
        $result3 = $hoteluser3->viewhotelPayments();
        return $result3;
    }
    public function get_payments($id)
    {
        $hoteluser4 = new hotel();
        $result4 = $hoteluser4->get_payments($id);
        return $result4;

    }
    public function viewGuestReservations()
    {
        $hoteluser4 = new hotel();
        $result4 = $hoteluser4->viewGuestReservations();
        return $result4;
    }
    public function viewAdminReservations()
    {
        $hoteluser4 = new hotel();
        $result4 = $hoteluser4->viewAdminReservations();
        return $result4;
    }
public function viewPendingReservations()
    {
        $hoteluser5 = new hotel();
        $result5 = $hoteluser5->viewPendingReservations();
        return $result5;
    }
}
