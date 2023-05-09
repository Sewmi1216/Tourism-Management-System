<?php

// This is where the http request hits second.
// This is accessed to create the controller object.
// This is also accessed when a method inside is called.
include '../model/tourbooking.php';

class tourbookingcontroller extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

  

    public function addtourbooking($inputs)
    {
        $tourpackage = new tourpackage();
        

        $res = $tourpackage-> inserttourbooking($inputs);
        
        if (!$res) {
            echo 'Error Occured';
        }else{
            echo 'Successfully Added';
            header("Location: ../view-admin/tourpackages2.php");
            
        }

    }

    public function updatetourbooking($inputs)
    {
        $tourpackage = new tourpackage();
        

        $res = $tourpackage-> updatetourbooking($inputs);
        
        if (!$res) {
            echo 'Error Occured';
        }else{
            echo 'Successfully updated';
            header("Location: ../view-admin/tourpackages2.php");
            
        }

    }

    public function viewtourreservations()
    {
        
        $pkg = new tourbooking();

        $result = $pkg->viewtourreservations();

        $_SESSION['c'] = $result;
        return $result;

    }

    public function viewtourreservationdetails($inputs)
    {
        
        $pkg = new tourbooking();

        $result = $pkg->viewtourreservationdetails($inputs);

        $_SESSION['c'] = $result;
        return $result;

    }

    public function viewAllbookings()
    {
        
        $pkg = new tourpackage();

        $result = $pkg->viewtourPkgs();

        $_SESSION['c'] = $result;
        return $result;

    }


    public function viewPkg($inputs)
    {
        
        $pkg = new tourpackage();
        

        $result = $pkg->viewtourPkg($inputs[0]);
        

        $_SESSION['c'] = $result;
        return $result;
    }

    public function countBooking()
    {
        $booking = new tourbooking();
        $results = $booking->countBooking();
        $_SESSION['c'] = $result;
        return $result;
    }
}