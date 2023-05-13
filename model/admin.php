<?php
require_once "../db/db_connection.php";

class admin extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($username, $password)
    {
        $query = "SELECT * FROM admin where username ='$username' and password='$password'";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function viewAdmin(){
        $sql = "SELECT * from admin";
        $stmt = mysqli_query($this->conn, $sql);
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
    public function viewpendingusers()
    {
        $query = "SELECT COUNT(*) AS total_count
        FROM (
            SELECT status FROM entrepreneur WHERE status = 0
            UNION ALL
            SELECT status FROM hotel WHERE status = 0
            UNION ALL
            SELECT status FROM tourguide WHERE status=0
        ) AS tbl;";
     
        
        $stmt = mysqli_query($this->conn, $query);
      

        return $stmt;
    
    }

    public function viewtourguidecount()
    {
        $query = "SELECT COUNT(*) as tourguide_count FROM tourguide WHERE status = 1";
     
        
        $stmt = mysqli_query($this->conn, $query);
      

        return $stmt;
    
    }

    public function viewhotelcount()
    {
        $query = "SELECT COUNT(*) as hotel_count FROM hotel WHERE status = 1";
     
        
        $stmt = mysqli_query($this->conn, $query);
      

        return $stmt;
    
    }

    public function viewentrepreneurcount()
    {
        $query = "SELECT COUNT(*) as entrepreneur_count FROM entrepreneur WHERE status = 1";
     
        
        $stmt = mysqli_query($this->conn, $query);
      

        return $stmt;
    
    }

    public function viewtouristcount()
    {
        $query = "SELECT COUNT(*) as tourist_count FROM tourist ";
     
        
        $stmt = mysqli_query($this->conn, $query);
      

        return $stmt;
    
    }

    public function countpackageReservations($id)
    {
        $query1 = "SELECT rt.typeName as room_type, COUNT(*) as num_reservations FROM guest_reservation gr INNER JOIN room r ON gr.roomID = r.roomNo INNER JOIN roomtype rt ON r.typeID = rt.roomTypeId where gr.hotelId='$id' GROUP BY rt.typeName;";
        return $this->getData($query1);
    }

}