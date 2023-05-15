<?php
// session_start();

include '../model/tourguide.php';

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

    // public function viewAllpendingguides()
    // {

    //     $pkg = new tourguide();

    //     $result = $pkg->viewAllpendingguides($inputs[0]);
    //     // print_r($result);
    //     // die();

    //     $_SESSION['c'] = $result;
    //     return $result;

    // }

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

        $_SESSION['c'] = $result;
        return $result;
    }

    // public function viewdeletedguides()
    // {

    //     $pkg = new tourguide();

    //     $result = $pkg->viewdeletedguides($inputs[0]);
    //     // print_r($result);
    //     // die();

    //     $_SESSION['c'] = $result;
    //     return $result;

    // }

    
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

        echo $bookingId;
        $result = $user->updateGuide($bookingId, $newGuide);
       // return $result;
        if($result)
        {
            echo "<script>alert('Assigning Tour guide is sucessful'); </script>";
        }
    }
}
