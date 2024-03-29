<?php
require_once "../db/db_connection.php";
// session_start();
// $user = "";
// if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
//     $id = $_SESSION["hotelID"];
// } else {
//     header("location:login.php");
// }

class roomType extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertRoomType($pkgName, $desc, $id, $price, $beds)
    {
        require_once "../view-hotel/roomType.php";

        $sql = "INSERT INTO roomtype(typeName, description, hotelID, price, noOfPersons) VALUES ('$pkgName', '$desc', '$id','$price', '$beds')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmts = $this->conn->prepare($sql);
        $stmts->execute();
        return $stmts;
    }
    public function addRoomTypeImg($typeid, $file)
    {
        require_once "../view-hotel/addPhotos.php";

        // $sql= "INSERT INTO roomtype_img(roomTypeId, image) VALUES (?, ?)";
        $sql = "INSERT INTO roomtype_img(roomTypeId, image) VALUES ('$typeid', '$file')";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bind_param("ib", $typeid, $file);

        $stmt->execute();
        return $stmt;
    }
    // public function viewAllPkgs()
    // {
    //   $query = "Select * from hotelpackage p, hotel h where p.hotelID=h.hotelID";

    //     $stmt = mysqli_query($this->conn, $query);
    //     return $stmt;

    // }
    public function viewType($pId)
    {
        //    $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID and roomTypeId = '$pId'";
        $query = "Select * from roomtype where roomTypeId = '$pId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }
    public function viewAllTypes($id)
    {

        $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID and h.hotelID='$id'";
        return $this->getData($query);
    }

    public function viewAllImgs($getid)
    {
        $query = "Select * from roomtype_img i, roomtype r where i.roomTypeId=r.roomTypeId and r.roomTypeId='$getid'";
        // $query = "Select * from roomtype_img";

        return $this->getData($query);

    }
    public function deleteImg($id)
    {
        $query = "delete from roomtype_img where id='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    private function getData($query)
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die('Error in query: ' . mysqli_error());
        }
        $data = array();
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function updateType($id, $pkgName, $desc, $beds, $price)
    {
        $query = "update roomtype set typeName='$pkgName', description='$desc', price='$price', noOfPersons='$beds' where roomTypeId='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function deleteType($id)
    {
        $query = "delete from roomtype where roomTypeId='$id'";
        $foreign_key_query = "SELECT * FROM `room` WHERE typeID='$id'";

        $foreign_key_result = mysqli_query($this->conn, $foreign_key_query);

        if (mysqli_num_rows($foreign_key_result) > 0) {
            echo '<script>alert("You cannot delete this room type due to the existing room reservations")</script>';
            echo "<script> window.location.href = '../view-hotel/roomType.php'; </script>";
        } else {
            mysqli_query($this->conn, $query);
            echo '<script>alert("Room type is successfully deleted")</script>';
            echo "<script> window.location.href = '../view-hotel/roomType.php'; </script>";
        }
    }
     public function viewPersons($id)
    {
        $query = "SELECT distinct(noOfPersons) as 'NumberPerson' FROM roomtype where hotelId='$id'";
        return $this->getData($query);
    }

}
