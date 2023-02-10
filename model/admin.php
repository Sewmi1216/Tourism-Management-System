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

}