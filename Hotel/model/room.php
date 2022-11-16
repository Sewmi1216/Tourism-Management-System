<?php
require_once "../db/db_connection.php";

class room extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertRoom($roomNo,$type,$beds,$status,$hotelPkgId)
    {
        $query = "INSERT INTO room (roomNo, type, noOfBeds, status, hotelPkgID) VALUES ('$roomNo','$type','$beds','$status','$hotelPkgId')";
       
         //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
