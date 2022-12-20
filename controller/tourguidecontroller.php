<?php
session_start();

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

    public function viewAllguide()
    {
        
        $pkg = new tourguide();

        $result = $pkg->viewtourguide();

        $_SESSION['c'] = $result;
        return $result;

    }
}