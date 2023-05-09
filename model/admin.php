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

    public function viewpendingusers()
    {
        $query = "SELECT COUNT(*) as num_pen_requests1 FROM entrepreneur WHERE status = 0";
     
        
        $stmt = mysqli_query($this->conn, $query);
      

        return $stmt;
    
    }

    public function viewtourguidecount()
    {
        $query = "SELECT COUNT(*) as tourguide_count FROM tourguide WHERE status = 1";
     
        
        $stmt = mysqli_query($this->conn, $query);
      

        return $stmt;
    
    }

}