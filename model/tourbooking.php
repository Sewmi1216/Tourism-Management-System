<?php
require_once "../db/db_connection.php";
// The http request hits there third.
// Depending on the function called, database is access and some data is return / or may be no data is return.
class tourbooking extends db_connection
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
    public function inserttourbooking($inputs)
    {
       
    
        $query = "INSERT INTO tourpackage(packageName, price, description, adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '1')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function updatetourbooking($inputs)
    {
       
    
        // $query = "UPDATE tourpackage SET (packageName, price, description, participant_count , adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '$inputs[3]', '1') where packageID = $inputs[4]";
        $query = "UPDATE tourpackage SET packagename = '$inputs[0]', price ='$inputs[1]', description ='$inputs[2]', participant_count ='$inputs[3]' WHERE packageID ='$inputs[4]'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    
    public function viewtourbookingpending()
    {
        
        
        $query = "SELECT * FROM tourbooking where status = 0 ";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    
    public function viewtourpkgs()
    {
       
    
        $query = "SELECT * FROM tourpackage ";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    
    public function viewtourreservations()
    {
        $query = "SELECT * FROM tourbooking";
        
        $stmt = mysqli_query($this->conn, $query);

        

        return $stmt;
    }

    public function countBooking()
    {
        $query1 = "SELECT COUNT(*) as num_bookings FROM tourbooking WHERE bookingStatus = 'Pending'";

        return $this->getData($query1);
    

    }

    public function viewtourreservationdetails($id)
    {
       
    
        $query = "SELECT * from tourbooking a, tourpackage b, tourist c, tourguide d WHERE a.tourPkgID = b.packageID AND a.tourGuideId = d.tourguideID and a.touristID = c.userID and a.bookingID ='$id'";
$stmt = mysqli_query($this->conn, $query);

return $stmt;

    }

    public function viewtourbookingPayments($id)
    {
        $query = "SELECT * FROM tourbooking_payment a, tourbooking b WHERE a.tourBookingId = b.bookingID AND b.bookingID = $id";

        return $this->getData($query);
    }

    public function viewalltourbookingPayments()
    {
        $query = "SELECT * FROM tourbooking_payment a , tourbooking b WHERE a.tourBookingId = b.bookingID";

        return $this->getData($query);
    }


    public function updateStatus($bookingId, $newStatus)
    {
        $query = "UPDATE tourbooking SET bookingStatus='$newStatus' WHERE bookingID='$bookingId'";
        $stmt = mysqli_query($this->conn, $query);
        if ($stmt) {
            return $stmt;
        } else {
            die('Error in query: ' . mysqli_error($this->conn));
        }
    }

    public function updateGuide($bookingId, $newGuide)
    {
        $query = "UPDATE tourbooking SET tourGuideId='$newGuide' WHERE bookingID='$bookingId'";
        $stmt = mysqli_query($this->conn, $query);
        if ($stmt) {
            return $stmt;
        } else {
            die('Error in query: ' . mysqli_error($this->conn));
        }
    }

}