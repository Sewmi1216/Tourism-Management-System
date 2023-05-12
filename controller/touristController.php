<?php

include '../model/tourist.php';
include '../model/admin.php';

class touristController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($username, $password)
    {
        $tourist = new tourist();

        $res = $tourist->validate($username, $password);

        if (mysqli_num_rows($res) > 0) {

            $result = mysqli_fetch_assoc($res);

            if ($result['email'] == $username && $result['password'] == $password) {

                $_SESSION['username'] = $result['username'];
                $_SESSION['touristID'] = $result['userID'];

                header("Location: ../view/craft_list.php");

                exit();

            } else {
                header("Location: ../view/login.php");
                exit();
            }
        } else {
            header("Location: ../view/login.php");
            echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
            exit();

        }

    }



    public function checkmail($email)
    {
        $user = new hotel();
        $rlt = $user->checkmail($email);
        return $rlt;

    }
    public function userSignup($inputs)
    {
        $tourist = new tourist();
        $mailcheck = $tourist->checkmail($inputs[2]);


        if ($mailcheck > 0) {
            $_SESSION['error'] = "Email is already registered";
            // header("Location: ../view/sign.php");
        } else {
            $res = $tourist->insertTourist($inputs);
            if (!$res) {
                echo 'Error Occured';
            } else {
                echo 'Successfully Added';
                header("Location: ../view-hotel/login.php");

            }
        }

    }


    // public function userSignup($inputs)
    // {
    //     $tourist = new tourist();
    //     $mailcheck = $tourist->checkmail($inputs[2]);

    //     if ($mailcheck > 0) {
    //         $_SESSION['error'] = "Email is already registered";
    //         // header("Location: ../view/sign.php");
    //     } else {
    //         $res = $tourist->insertTourist($inputs);
    //         if (!$res) {
    //             echo 'Error Occured';
    //         } else {
    //             echo 'Successfully Added';
    //             header("Location: ../view-hotel/login.php");

    //         }
    //     }

    // }
    public function userLogout()
    {
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: ../view/login.php");

    }

    public function addcart($quantity, $productID, $tourist_id)
    {
        $tourist = new tourist();
        $row = $tourist->checkproid($productID);

        if ($row > 0) {
            $res = $tourist->updateToCart($quantity, $productID, $tourist_id);
            if (!$res) {
                echo 'Error Occured';
            } else {
                echo 'Successfully Added';
                header("Location: ../view/cart.php");

            }
        } else {
            $res = $tourist->insertToCart($quantity, $productID, $tourist_id);
            if (!$res) {
                echo 'Error Occured';
            } else {
                echo 'Successfully Added';
                header("Location: ../view/cart.php");

            }
        }
    }

    public function viewAlltourist()
    {

        $pkg = new tourist();

        $result = $pkg->viewtourist();

        $_SESSION['c'] = $result;
        return $result;

    }
    public function viewAllHotels()
    {
        $hotel = new tourist();
        $result = $hotel->viewAllHotels();
        return $result;
    }
    public function viewHotel($id)
    {
        $hotel1 = new tourist();
        $rs = $hotel1->viewHotel($id);
        return $rs;
    }
    public function viewAllRoomTypes($id)
    {
        $type = new tourist();
        $rs = $type->viewAllRoomTypes($id);
        return $rs;
    }
    public function searchRoom($id, $person, $roomtype)
    {
        $room = new tourist();
        $rs = $room->searchRoom($id, $person, $roomtype);
        return $rs;

    }
    public function availability($checkin, $checkout, $room)
    {
        $search = new tourist();
        $rs = $search->availability($checkin, $checkout, $room);
        return $rs;
    }
  
    public function insertReservation($email, $guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId)
    {
        $reservation = new tourist();
        $res = $reservation->insertReservation($guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId);

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
        $mail->setFrom('sewmi.rotaract3220@gmail.com', 'Reservation');
        // get email from input
        $mail->addAddress($email);
        //$mail->addReplyTo('lamkaizhe16@gmail.com');

        // HTML body
        $mail->isHTML(true);
        $mail->Subject = "Your have placed a reservation";
        $mail->Body = "<b>Dear User</b>
                    <h3>Your have placed a reservation</h3>";

        if (!$mail->send()) {?>
        <script>
        alert("<?php echo "Error sending email to " . $email ?>");
        </script>
        <?php
}

    }
    public function insertTourBooking($name, $phone, $email, $total_amount, $aDate, $dDate, $guests, $touristID, $packageId)
    {
        $booking = new tourist();
        $res = $booking->insertTourBooking($name, $phone, $email, $total_amount, $aDate, $dDate, $guests, $touristID, $packageId);

        require "../libs/PHPMailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'sewmi.rotaract3220@gmail.com';
        $mail->Password = 'uaqgejykofzquoaf';

        $mail->setFrom('sewmi.rotaract3220@gmail.com', 'Tour Booking');

        $mail->addAddress($email);

        // HTML body
        $mail->isHTML(true);
        $mail->Subject = "Your have placed a tour booking";
        $mail->Body = "<b>Dear User</b>
                    <h3>Your have placed a tour booking</h3>";

        if (!$mail->send()) {?>
        <script>
        alert("<?php echo "Error sending email to " . $email ?>");
        </script>
        <?php
}
    }

    public function viewProfile($id)
    {
        // print_r($id);
        // die();

        $profile = new tourist();
        $rs = $profile->viewProfile($id);
        return $rs;

    }
    public function viewTouristProfile($id)
    {
        $profile = new tourist();
        return $profile->viewTouristProfile($id);

    }
    public function viewReservation($id)
    {
        $res = new tourist();
        $rs = $res->viewReservation($id);
        return $rs;

    }
    public function viewAllTourPackages()
    {
        $hotel = new tourist();
        $result = $hotel->viewAllTourPackages();
        return $result;
    }
    public function viewTourPkg($pid)
    {
        $tourpkg = new tourist();
        $result = $tourpkg->viewTourPkg($pid);
        return $result;
    }
    public function viewAllTourImgs($id)
    {
        $tour = new tourist();
        $result = $tour->viewAllTourImgs($id);
        return $result;
    }

    public function viewProduct($id)
    {
        $tour = new tourist();
        $result = $tour->viewProduct($id);
        return $result;
    }
    public function viewCartItems($id)
    {
        $tour = new tourist();
        $result = $tour->viewCartItems($id);
        return $result;
    }
}