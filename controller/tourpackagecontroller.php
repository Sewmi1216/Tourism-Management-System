<?php
session_start();

include '../model/tourpackage.php';

class tourpackageController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

  

    public function addtourpackage($inputs)
    {
        $tourpackage = new tourpackage();
        

        $res = $tourpackage-> inserttourpackage($inputs);
        
        if (!$res) {
            echo 'Error Occured';
        }else{
            echo 'Successfully Added';
            header("Location: ../view/tourpackages.php");
            
        }

    }

    public function viewAllPkgs()
    {
        
        $pkg = new tourpackage();

        $result = $pkg->viewtourPkgs();

        $_SESSION['c'] = $result;
        return $result;

    }
}