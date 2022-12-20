<?php
require_once "../db/db_connection.php";

class tourguide extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

   /* public function validate($username, $password)
    {
        $query = "SELECT * FROM tourist where email='$username' and password='$password'";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    } */

    public function inserttourguide($inputs)
    {
       
    
        $query = "INSERT INTO tourguide(name, nic, username, email, address, phone, password) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]','$inputs[3]','$inputs[4]','$inputs[5]','$inputs[6]')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function viewtourguide()
    {
       
    
        $query = "SELECT * FROM tourguide ";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
}