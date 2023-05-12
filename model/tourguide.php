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

    public function inserttourguide($name, $email, $phone, $nic, $fileImg, $username, $password, $availability, $language, $fileDoc, $vehicle, $type, $passenger)
    {

        $query = "INSERT INTO tourguide(name,email,phone,nic,profileImg,username,password,availability,languages,document,vehicleNumber,vehicleType,passenger,status) VALUES ('$name', '$email','$phone','$nic', '$fileImg', '$username', '$password', '$availability','$language','$fileDoc','$vehicle','$type','$passenger',0)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function viewAllTourguides()
    {

        $query = "SELECT * FROM tourguide where status= 1";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    private function getData($query)
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die('Error in query: ' . mysqli_error());
        }
        $data = array();
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function viewAssignedBookings($id)
    {
        $query = "SELECT * FROM tourbooking where tourGuideId= '$id'";
        return $this->getData($query);
    }

    public function viewAvailability($id)
    {
        $query = "SELECT unavailable_from, unavailable_to FROM tourguide where tourguideId= '$id'";
        return $this->getData($query);
    }
    public function updateAvailability($from, $to, $id)
    {
        $query = "update tourguide SET unavailable_from='$from', unavailable_to='$to' where tourguideId= '$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function viewonetourguide($id)
    {

        $query = "SELECT * FROM tourguide where tourguideID = $id ";

        $stmt = mysqli_query($this->conn, $query);
        // print_r($stmt);
        // die();
        return $stmt;
    }

    public function viewAllpendingguides()
    {

        $query = "SELECT * FROM tourguide where status = 0 ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function removetourguide($id)
    {

        // print_r($id);
        // die();
        $query = "UPDATE tourguide SET status = 2 where tourguideID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function removetourguiderequest($id)
    {

        // print_r($id);
        // die();

        $query = "UPDATE tourguide SET status = 3 where tourguideID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function accepttourguiderequest($id)
    {

        // print_r($id);
        // die();

        $query = "UPDATE tourguide SET status = 1 where tourguideID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function viewdeletedguides()
    {

        $query = "SELECT * FROM tourguide where status = 2 ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

}
