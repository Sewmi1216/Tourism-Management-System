<?php
// session_start();

include '../model/tourguide.php';
include '../model/tourbooking.php';

class tourguideController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addguide($name, $email, $phone, $nic, $fileImg, $password, $language, $fileDoc, $vehicle, $type, $passenger)
    {
        $tourguide = new tourguide();

        $res = $tourguide->inserttourguide($name, $email, $phone, $nic, $fileImg, $password, $language, $fileDoc, $vehicle, $type, $passenger);

        if (!$res) {
            echo 'There was a error';
        } else {
            echo "<script>alert('Your form was successfully submitted. Wait for admin approval');
        window.location.href = '../view-hotel/hotelLogin.php';
        </script>";
        }

    }
//       public function addguide($name, $email, $phone, $nic, $fileImg, $password, $language, $fileDoc, $vehicle, $type, $passenger)
//     {
//         $tourguide = new tourguide();
//         $mailcheck = $tourguide->checkEmail($email);
//  if ($mailcheck > 0) {
//             $_SESSION['error'] = "Email is already registered";

//         } else {
//         $res = $tourguide->inserttourguide($name, $email, $phone, $nic, $fileImg, $password, $language, $fileDoc, $vehicle, $type, $passenger);

//         if (!$res) {
//             echo 'There was a error';
//         } else {
//             echo "<script>alert('Your form was successfully submitted. Wait for admin approval');
//         window.location.href = '../view-hotel/hotelLogin.php';
//         </script>";
//         }

//     }
// }
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
                echo "<script>alert('Your form was successfully submitted. Wait for admin approval');
        window.location.href = '../view-hotel/login.php';
        </script>";
            }
        }
    }

    public function viewAllTourguides()
    {
        $tourguide = new tourguide();

        $results = $tourguide->viewAllTourguides();

        // include "../view-tour_guide/Guide_Assign_tourists.php";
        $_SESSION['c'] = $results;
        return $results;

    }


    public function viewavailableTourguides()
    {
        $tourguide = new tourguide();

        $results = $tourguide->viewavailableTourguides();
       

        // include "../view-tour_guide/Guide_Assign_tourists.php";
        $_SESSION['c'] = $results;
        return $results;
    }
    
    public function viewAssignedBookings($id)
    {
        $tourguide = new tourguide();
        $results = $tourguide->viewAssignedBookings($id);
        return $results;
    }

      public function viewAssignedBookingDetails($id, $guideid)
    {
        $tourguide = new tourguide();
        $results = $tourguide->viewAssignedBookingDetails($id, $guideid);
        return $results;
    }

    public function viewAvailability($id)
    {
        $tourguide = new tourguide();

        return $tourguide->viewAvailability($id);
    }
    public function updateAvailability($from, $to, $id)
    {
        $tourguide = new tourguide();
        $rs = $tourguide->updateAvailability($from, $to, $id);
        if ($rs) {
            echo "<script>alert('Availability updated successfully');
        window.location.href = '../view-tour_guide/availability.php';
        </script>";

        } else {
            echo "<script>alert('Availability update failed');
        window.location.href = '../view-tour_guide/availability.php';
        </script>";
        }

    }

    public function viewoneguide($id)
    {

        $pkg = new tourguide();

        $result = $pkg->viewonetourguide($id);
        // print_r($result);
        // die();

        $_SESSION['c'] = $result;
        return $result;

    }

    public function viewAllpendingguides()
    {

        $pkg = new tourguide();

        $result = $pkg->viewAllpendingguides($inputs[0]);
        // print_r($result);
        // die();

        $_SESSION['c'] = $result;
        return $result;

    }

    public function removetourguide($id)
    {

        $user = new tourguide();

        $result = $user->removetourguide($id);

        $_SESSION['c'] = $result;
        return $result;
    }

    public function removetourguiderequest($id)
    {

        $user = new tourguide();

        $result = $user->removetourguiderequest($id);

        $_SESSION['c'] = $result;
        return $result;
    }

    public function accepttourguiderequest($id)
    {

        $user = new tourguide();

        $result = $user->accepttourguiderequest($id);

        // $_SESSION['c'] = $result;
        // return $result;

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
            $mail->Subject = "Congratulations! You Have Been Approved as a Pack2Paradise Tour Guide";
            $mail->Body = "<b>Dear User</b>
                    <h3>I am pleased to inform you that your tour guide account on Pack2Paradise has been approved by our system administrator. Congratulations on becoming a part of our team of expert tour guides!

                    You are now authorized to be appointed for tours with tourists on our platform and start showcasing your skills and knowledge. We are excited to have you on board and we wish you the best of luck in your new role.
                    
                    As a tour guide on Pack2Paradise, you will have the opportunity to work with a diverse group of tourists from all around the world. You will be responsible for providing them with a memorable and enjoyable experience while exploring the beauty of our paradise island.
                    
                    We have no doubt that you will excel in your new role and provide our customers with the highest level of service. Our team is always available to assist you with any questions or concerns that you may have.
                    
                    Thank you for choosing Pack2Paradise as your platform to showcase your skills as a tour guide. We look forward to working with you and providing our customers with an unforgettable experience.
                    
                    Best regards,
                    Pack2Paradise Team
                    
                    
                    
                    
                    
                    </h3>";
    
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

    public function viewdeletedguides()
    {

        $pkg = new tourguide();

        $result = $pkg->viewdeletedguides($inputs[0]);
        // print_r($result);
        // die();

        $_SESSION['c'] = $result;
        return $result;

    }

    
    public function assignguide($assignguide, $bookingID)
    {
        $user = new tourguide();

        
        $result = $user->assignguide($assignguide, $bookingID);
       // return $result;
        if($result)
        {
            echo "<script>alert('Assigning Tour guide is sucessful'); </script>";
        }
    }

    public function updateGuide($bookingId, $newGuide)
    {
        $user = new tourbooking();

        // echo $bookingId;
        $result = $user->updateGuide($bookingId, $newGuide);
       // return $result;
        if($result)
        {
            echo "<script>alert('Assigning Tour guide is sucessful'); </script>";
            // header('Location: ./tourbooking.php')
        }
    }
}
