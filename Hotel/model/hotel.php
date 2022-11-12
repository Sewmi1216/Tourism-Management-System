<?php
require_once "../db/db_connection.php";

class hotel extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($username,$password){
        $query = "SELECT * FROM hotel where username='$username' and password='$password'";
        //echo "print";
        $stmt = mysqli_query($this->conn, $query);
        //$stmt = $this->conn->prepare($query);
        //$stmt->execute();
        return $stmt;
    }
}
