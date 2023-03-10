<?php
require_once "../db/db_connection.php";

class room extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertRoom($roomNo, $type, $beds, $status, $hotelPkgId)
    {
        $query = "INSERT INTO room (roomNo, type, noOfBeds, status, typeID) VALUES (?, ?, ?, ?, ?)";

        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isisi", $roomNo, $type, $beds, $status, $hotelPkgId);
        $stmt->execute();
        return $stmt;
    }
   
    public function viewAllRooms($id){
       $query = "Select * from room where hotelId='$id'";
       return $this->getData($query);
    }

    private function getData($query) {
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result)) {
			$data[]=$row;            
		}
		return $data;
	}
     public function viewAvailableRooms($id){
       $query = "Select * from room where status='Available' and hotelId='$id'";
       return $this->getData($query);
    }
}
