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
        $query = "SELECT * FROM tourbooking b, tourpackage t where b.tourPkgId=t.packageID and b.tourGuideId= '$id'";
        return $this->getData($query);
    }
    public function viewAssignedBookingDetails($id, $guideid)
    {
        $query = "SELECT * FROM tourbooking b, tourpackage t where b.tourPkgId=t.packageID and b.bookingID='$id' and b.tourGuideId= '$guideid'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

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

    public function viewavailableTourguides()
    {

        $query = "SELECT * FROM tourguide where status = 1 ";

        $stmt = mysqli_query($this->conn, $query);
        $results = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        return $results;
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
        if ($stmt) {
            $query1 = "select email from tourguide where tourguideID= $id ";
            $stmt = mysqli_query($this->conn, $query1);
            $results = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
            if ($results) {
                return $results;
            } else {
                die('Error in query2: ' . mysqli_error($this->conn));

            }
        } else {
            die('Error in query1: ' . mysqli_error($this->conn));
        }
    }

    public function viewdeletedguides()
    {

        $query = "SELECT * FROM tourguide where status = 2 ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }





    public function updateGuide($bookingId, $newGuide)
    {
       $bookingId = mysqli_real_escape_string($this->conn, $bookingId);
$newGuide = mysqli_real_escape_string($this->conn, $newGuide);

$query = "UPDATE tourbooking SET tourGuideId='$newGuide' WHERE bookingID='$bookingId'";
$stmt = mysqli_query($this->conn, $query);

if ($stmt) {
    return $stmt;
} else {
    die('Error in query: ' . mysqli_error($this->conn));
}

    }


    public function assignguide($assignguide, $bookingID)
    {

$query = "UPDATE tourbooking SET tourGuideId='$$assignguide' WHERE bookingID='$bookingID'";
$stmt = mysqli_query($this->conn, $query);


if ($stmt) {
    return $stmt;
} else {
    die('Error in query: ' . mysqli_error($this->conn));
}

    }




//     public function updateGuide($bookingId, $newGuide)
//     {
//        $bookingId = mysqli_real_escape_string($this->conn, $bookingId);
// $newGuide = mysqli_real_escape_string($this->conn, $newGuide);

// $query = "UPDATE tourbooking SET tourGuideId='$newGuide' WHERE bookingID='$bookingId'";
// $stmt = mysqli_query($this->conn, $query);

// if ($stmt) {
//     return $stmt;
// } else {
//     die('Error in query: ' . mysqli_error($this->conn));
// }

//     }

// public function viewavailableTourguide()
// {

//     $query1 = "SELECT * from tourbooking where bookingID = 224";


//     $stmt1 = mysqli_query($this->conn, $query1);
//     $results = mysqli_fetch_all($stmt1, MYSQLI_ASSOC);

//     $arrivalDate =  $results[0]["arrivalDate"];
//     $departuredate = $results[0]["departureDate"];

    


//     // print_r($results);
//     // die();

//     $query2 = "SELECT * from tourguide where status = 1 and (unavailable_to < '$arrivalDate'  OR unavailable_from > '$departuredate');"

//     $x = mysqli_query($this->conn, $query2);
//     $results2 = mysqli_fetch_all($stmt2, MYSQLI_ASSOC);

//     print_r($stmt2);
//     die();
//     // $results1 = mysqli_fetch_all($stmt1, MYSQLI_ASSOC);

//     // $query = "SELECT t2.*
//     // FROM tourbooking t1
//     // JOIN tourguide t2 ON tourbooking.id = tourguide.foreign_key_id
//     // WHERE t1.bookingID = 224
//     //   AND tourguide.unavailable_from >= tourbooking.arrivalDate
//     //   AND tourguide.unavailable_to <= tourbooking.departureDate;
//     // "
//     // $query = "SELECT * FROM tourguide where status = 1  ";

//     // $foreign_key_query = "SELECT * FROM `tourbooking` WHERE tourPkgId='$id'";

//     // $foreign_key_result = mysqli_query($this->conn, $foreign_key_query);

//     // if (mysqli_num_rows($foreign_key_result) > 0) {
//     //     echo '<script>alert("Deletion prevented due to foreign key constraints")</script>';
//     //     echo "<script> window.location.href = '../view-admin/tourpackage.php'; </script>";
//     // } else {
//     //     mysqli_query($this->conn, $query);
//     //     echo "<script> window.location.href = '../view-admin/tourpackage.php'; </script>";
//     // }
//     $stmt = mysqli_query($this->conn, $query);
 
//     return $stmt;
// }

}
