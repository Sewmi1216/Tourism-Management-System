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

    public function userLogin($username, $password)
    {
        $tourguideuser = new tourguide();
        $res = $tourguideuser->validate($username);

        if (mysqli_num_rows($res) > 0) {
           

            $result1 = mysqli_fetch_assoc($res);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['username'] = $result1['username'];
                    $_SESSION['tourguideID'] = $result1['tourguideID'];

                    header("Location: ../view-tour_guide/Guide_Assign_tourists.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Try again shortly');</script>";

                }
            } else {
                // $_SESSION["error"] = "Password does not match";
                $_SESSION["pwderror"] = "Password does not match";
                $_SESSION["attempts"]+= 1;
               

            }
        }
        

    }

    public function addguide($name, $email,$phone,$nic, $fileImg, $username, $password, $availability,$language,$fileDoc,$vehicle,$type,$passenger)
    {
        $tourguide = new tourguide();
        

        $res = $tourguide-> inserttourguide($name, $email,$phone,$nic, $fileImg, $username, $password, $availability,$language,$fileDoc,$vehicle,$type,$passenger);
        
        if (!$res) {
            echo 'There was a error';
        } else {
            echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view-hotel/hotelLogin.php';
        </script>";
        }

    }

   
    
    public function viewAllTourguides()
    {
        $tourguide = new tourguide();

        $results= $tourguide->viewAllTourguides();

        // include "../view-tour_guide/Guide_Assign_tourists.php";
        return $results;

    }

    
    public function viewoneguide($inputs)
    {
        
        $pkg = new tourguide();
        

        $result = $pkg->viewonetourguide($inputs[0]);
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
    
        $result = $user-> removetourguide($id);
    
        $_SESSION['c'] = $result;
        return $result;
    }
    
    public function removetourguiderequest($id)
    {
    
        $user = new tourguide();
    
        $result = $user-> removetourguiderequest($id);
    
        $_SESSION['c'] = $result;
        return $result;
    }
    
    public function accepttourguiderequest($id)
    {
    
        $user = new tourguide();
    
        $result = $user-> accepttourguiderequest($id);
    
        $_SESSION['c'] = $result;
        return $result;
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
}