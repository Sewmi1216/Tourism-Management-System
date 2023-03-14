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

  

    public function addtourguide($inputs)
    {
        $tourguide = new tourguide();
        

        $res = $tourguide-> inserttourguide($inputs);
        
        if (!$res) {
            echo 'Error Occured';
        }else{
            echo 'Successfully Added';
            header("Location: ../view/tourguide.php");
            
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
}