<?php
require_once "../db/db_connection.php";

class hotel extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($username)
    {
        $query = "SELECT * FROM hotel where username='$username'";
        //echo "print";
        $stmt = mysqli_query($this->conn, $query);
        //$stmt = $this->conn->prepare($query);
        //$stmt->execute();
        return $stmt;
    }

    public function insertHotel($hotelName, $address, $email, $phone, $fileImg, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        $query = "INSERT INTO hotel (name, address, email, phone, profileImg, username, password, managerName, managerPhone, managerEmail, managerNic, status, document) VALUES ('$hotelName', '$address', '$email', '$phone', '$fileImg', '$username', '$password', '$mName', '$mPhone', '$mEmail', '$mNic', 0, '$fileDoc')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
