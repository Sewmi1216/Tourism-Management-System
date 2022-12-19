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
        $stmt = Array();
        // $query = "SELECT * FROM hotel where username='$username'";
        $query1 = "SELECT * FROM hotel where username='$username'";
        $query2 = "SELECT * FROM tourist where username='$username'";
        $query3 = "SELECT * FROM admin where username='$username'";
        $query4 = "SELECT * FROM entrepreneur where username='$username'";
        $query5 = "SELECT * FROM tourguide where username='$username'";

        //echo "print";
        $stmt[0] = mysqli_query($this->conn, $query1);
        $stmt[1] = mysqli_query($this->conn, $query2);
        $stmt[2] = mysqli_query($this->conn, $query3);
        $stmt[3]= mysqli_query($this->conn, $query4);
        $stmt[4]= mysqli_query($this->conn, $query5);

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
