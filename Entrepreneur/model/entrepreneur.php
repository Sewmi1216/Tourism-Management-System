<?php
require_once "../db/db_connection.php";

class entrepreneur extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($username,$password){
        $query = "SELECT * FROM entrepreneur where username='$username' and password='$password'";
        //echo "print";
        $stmt = mysqli_query($this->conn, $query);
        //$stmt = $this->conn->prepare($query);
        //$stmt->execute();
        return $stmt;
    }
    public function insertentrepreneur($bussinessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc)
    {
        $query = "INSERT INTO entrepreneur (name, address, email, phone, profileImg, username, password, entreName, entreNic,  entrePhone, entreEmail, document, status) VALUES ('$bussinessName, $address,$email,$phone, $fileImg, $username, $password, $eName, $eNic,$ePhone, $eEmail,  $fileDoc, 0')";

        
        // $stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
         $stmt->execute();
        // echo "print";
        return $stmt;
    }
}
