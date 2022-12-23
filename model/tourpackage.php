<?php
require_once "../db/db_connection.php";

class tourpackage extends db_connection
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

    public function inserttourpackage($inputs)
    {
       
    
        $query = "INSERT INTO tourpackage(packageName, price, description, adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '1')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function viewtourpkgs()
    {
       
    
        $query = "SELECT * FROM tourpackage ";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
}