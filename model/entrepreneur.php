<?php
require_once "../db/db_connection.php";

class entrepreneur extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($username){
        $query = "SELECT * FROM entrepreneur where username='$username'";
        //echo "print";
        $stmt = mysqli_query($this->conn, $query);
        //$stmt = $this->conn->prepare($query);
        //$stmt->execute();
        return $stmt;
    }
    public function insertentrepreneur($businessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc)
    {
        $query = "INSERT INTO entrepreneur (businessName, address, email, phone, profileImg, username, password, entrepreneurName, entrepreneurNic,  entrepreneurPhone, entrepreneurEmail, document, status) VALUES ('$businessName', '$address','$email','$phone', '$fileImg', '$username', '$password', '$eName', '$eNic','$ePhone', '$eEmail',  '$fileDoc', 0)";

        // $stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
         $stmt->execute();
        // echo "print";
        return $stmt;
    }


    public function viewAllentrepreneur()
    {
        $query = "SELECT * from entrpreneur";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    
    }
}
