<?php
require_once "../db/db_connection.php";

class user extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($email)
    {
        $stmt = array();
        // $query = "SELECT * FROM hotel where username='$username'";
        $query1 = "SELECT * FROM hotel where email='$email'";
        $query2 = "SELECT * FROM tourist where email='$email'";
        $query3 = "SELECT * FROM admin where email='$email'";
        $query4 = "SELECT * FROM entrepreneur where email='$email'";
        $query5 = "SELECT * FROM tourguide where email='$email'";

        //echo "print";
        $stmt[0] = mysqli_query($this->conn, $query1);
        $stmt[1] = mysqli_query($this->conn, $query2);
        $stmt[2] = mysqli_query($this->conn, $query3);
        $stmt[3] = mysqli_query($this->conn, $query4);
        $stmt[4] = mysqli_query($this->conn, $query5);

        //$stmt = $this->conn->prepare($query);
        //$stmt->execute();
        return $stmt;
    }
     public function checkAllEmails($email)
    {
        $query = "SELECT COUNT(*) AS COUNT
                    FROM (
                    SELECT email FROM hotel WHERE email = '$email'
                    UNION
                    SELECT email FROM tourist WHERE email = '$email'
                        UNION
                    SELECT email FROM entrepreneur WHERE email = '$email'
                        UNION
                    SELECT email FROM tourguide WHERE email = '$email'
                    ) AS emails;";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    
    public function updateHotelPwd($email, $password)
    {
        $query = "UPDATE hotel SET password='$password' WHERE email='$email'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function updateTouristPwd($email, $password)
    {
        $query = "UPDATE tourist SET password='$password' WHERE email='$email'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function updateEntPwd($email, $password)
    {
        $query = "UPDATE entrepreneur SET password='$password' WHERE email='$email'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function updateGuidePwd($email, $password)
    {
        $query = "UPDATE tourguide SET password='$password' WHERE email='$email'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

     public function insertHotel($hotelName, $address, $email, $phone, $fileImg, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        $status = 0; // Set status as 0

        $query = "INSERT INTO hotel (name, address, email, phone, profileImg, password, managerName, managerPhone, managerEmail, managerNic, status, document) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssssssssis", $hotelName, $address, $email, $phone, $fileImg, $password, $mName, $mPhone, $mEmail, $mNic, $status, $fileDoc);
        $stmt->execute();
        return $stmt;
    }
    public function checkEmail($email)
    {
        $query = "SELECT h.hotelID, NULL AS tourguideID, NULL AS entID, NULL AS userID
                FROM hotel h
                WHERE h.email = '$email'
                UNION
                SELECT NULL AS hotelID, g.tourguideID, NULL AS entID, NULL AS userID
                FROM tourguide g
                WHERE g.email = '$email'
                UNION
                SELECT NULL AS hotelID, NULL AS tourguideID, e.entID, NULL AS userID
                FROM entrepreneur e
                WHERE e.email = '$email'
                UNION
                SELECT NULL AS hotelID, NULL AS tourguideID, NULL AS entID, t.userID
                FROM tourist t
                WHERE t.email = '$email'";
        // $query = "select hotelID from hotel where email='$email'";
        $stmt = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($stmt);
        return $row;
    }
}
