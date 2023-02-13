<?php

include_once '../model/roomType.php';

class roomTypeController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addRoomType($pkgName, $price, $desc, $filename, $status)
    {
        $hpkgs = new roomType();

        $res = $hpkgs->insertRoomType($pkgName, $price, $desc, $filename, $status);

        if (!$res) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {
            // echo "
            //  <script>
            //     var x = document.getElementById('snackbar);
            //     x.className = 'show';
            //     setTimeout(function(){ x.className = x.className.replace('show', ''); }, 3000);
            //     window.location.href = '../view-hotel/roomType.php';
            // </script>";
            echo "
             <script>alert(' A new room type is added');
        window.location.href = '../view-hotel/roomType.php';
        </script>";

        }

    }
    public function viewAllTypes()
    {
        $pkg = new roomType();
        $result = $pkg->viewAllTypes();
        return $result;

    }
    public function viewType($pId)
    {
        $hotelPkg = new roomType();

        $results = $hotelPkg->viewType($pId);

        return $results;

    }
    //  public function search($input)
    // {
    //     $hpkg = new hotelPkg();

    //     $results = $hpkg->searchPkg($input);

    //     // include "../view/room.php";
    //     return $results;

    // }

    public function updateType($id, $pkgName, $price, $desc, $filename, $status)
    {
        $hp = new roomType();
        $hp->updateType($id, $pkgName, $price, $desc, $filename, $status);

        if (!$hp) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {

            echo "<script>
        window.location.href = '../view-hotel/roomType.php';
        </script>";

        }

    }
    public function deleteType($id)
    {
        $hp = new roomType();
        $hp->deleteType($id);

        if (!$hp) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {
            echo "<script>alert('This room type is deleted');
        window.location.href = '../view-hotel/roomType.php';
        </script>";

        }

    }
}
