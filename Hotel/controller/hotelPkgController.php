<?php

include '../model/hotelPkg.php';

class hotelPkgController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

     public function addHotelPkg($pkgName,$price,$desc,$filename,$status)
    {
        $pkg = new hotelPkg();

        $res = $pkg->insertHotelPkg($pkgName,$price,$desc,$filename,$status);

        if (!$res) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {
            include "../view/addPkg.php";
            move_uploaded_file($tempname, $folder);
            echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view/hotelPkg.php';
        </script>";
        }

    }
    public function viewAllPkgs()
    {
        $pkg = new hotelPkg();

        $result = $pkg->viewAllPkgs();

        // include "../view/room.php";
        return $result;

    }


}
