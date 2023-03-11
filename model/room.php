<?php
require_once "../db/db_connection.php";

class room extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }
    public function insertRoom($roomNo, $beds, $status, $typeId, $id)
    {
        $query = "INSERT INTO room (roomNo, noOfBeds, status, typeID, hotelId) VALUES (?,?,?,?,?)";
        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iisii", $roomNo, $beds, $status, $typeId, $id);
        $stmt->execute();
        return $stmt;
    }
    public function viewRoom($rId)
    {
        //    $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID and roomTypeId = '$pId'";
        $query = "Select * from room r, roomtype t where r.typeID=t.roomTypeId and r.roomNo = '$rId'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }
    public function viewAllRooms($id)
    {
        $query = "Select * from room r, roomtype t where r.typeID=t.roomTypeId and r.hotelId='$id'";
        return $this->getData($query);
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

    public function viewAvailableRooms($id)
    {
        $query = "Select * from room where status='Available' and hotelId='$id'";
        return $this->getData($query);
    }
}
