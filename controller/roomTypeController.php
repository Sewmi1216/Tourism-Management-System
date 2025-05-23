<?php

include_once '../model/roomType.php';

class roomTypeController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addRoomType($pkgName, $desc, $id, $price, $beds)
    {
        $hpkgs = new roomType();

        $res = $hpkgs->insertRoomType($pkgName, $desc, $id, $price, $beds);
        return $res;

    }
    public function addRoomTypeImg($typeid, $file)
    {
        $typeImg = new roomType();

        $result = $typeImg->addRoomTypeImg($typeid, $file);

        return $result;
       

    }
    public function viewAllTypes($id)
    {
        $pkg = new roomType();
        $result = $pkg->viewAllTypes($id);
        return $result;
    }
    public function viewAllImgs($getid)
    {
        $type = new roomType();
        $result = $type->viewAllImgs($getid);
        return $result;
    }

    public function deleteImg($id, $typeid)
    {
        $dl = new roomType();
        $dl->deleteImg($id);

        // if (!$dl) {
        //     echo 'There was a error';
        //     // echo "<script>console.log(res)</script>";
        // } else {
        //     echo "<script>
        // window.location.href = '../view-hotel/addPhotos.php?id=$typeid';
        // </script>";

        // }

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

    public function updateType($id, $pkgName, $desc, $beds, $price)
    {
        $hp = new roomType();
        $hp->updateType($id, $pkgName, $desc, $beds, $price);

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

        if ($hp) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        }
    //     echo "<script>alert('Room type is successfully deleted');
	// window.location.href = '../view-hotel/roomType.php';
	// </script>";

        //  else {
        //     echo "<script>
        // window.location.href = '../view-hotel/roomType.php';
        // </script>";

        // }

    }
       public function viewPersons($id)
    {
        $hotelPkg = new roomType();

        $results = $hotelPkg->viewPersons($id);

        return $results;

    }
}
