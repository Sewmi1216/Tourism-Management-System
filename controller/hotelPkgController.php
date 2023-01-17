<?php

include_once('../model/hotelPkg.php');

class hotelPkgController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

     public function addHotelPkg($pkgName,$price,$desc,$filename,$status)
    {
        $hpkgs = new hotelPkg();

        $res = $hpkgs->insertHotelPkg($pkgName,$price,$desc,$filename,$status);

        if (!$res) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {

            echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view-hotel/hotelPkg.php';
        </script>";

        }

    }
    public function viewAllPkgs()
    {
        $pkg = new hotelPkg();

        $result = $pkg->viewAllPkgs();

        return $result;

    }
     public function viewPkg($pId)
    {
        $hotelPkg = new hotelPkg();

        $results = $hotelPkg->viewPkg($pId);

        return $results;

    }
    //  public function search($input)
    // {
    //     $hpkg = new hotelPkg();

    //     $results = $hpkg->searchPkg($input);

    //     // include "../view/room.php";
    //     return $results;

    // }


}
