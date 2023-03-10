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
        $stmt = array();
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
        $stmt[3] = mysqli_query($this->conn, $query4);
        $stmt[4] = mysqli_query($this->conn, $query5);

        //$stmt = $this->conn->prepare($query);
        //$stmt->execute();
        return $stmt;
    }

    public function insertHotel($id, $hotelName, $address, $email, $phone, $fileImg, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        $query = "INSERT INTO hotel (hotelID, name, address, email, phone, profileImg, username, password, managerName, managerPhone, managerEmail, managerNic, status, document) VALUES ('$id', '$hotelName', '$address', '$email', '$phone', '$fileImg', '$username', '$password', '$mName', '$mPhone', '$mEmail', '$mNic', 0, '$fileDoc')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // //Hotels can only chat with admin and tourists.
    // public function viewAllUsers(){
    //     $query = "SELECT * from tourist, admin";
    //     $result = mysqli_query($this->conn, $query);
    //     return $result;
    // }

    public function recPwd($email)
    {
        $query = "select * from tourist where email='$email'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    //Hotels can only chat with admin and tourists.
    public function viewAllUsers()
    {
        $query = "SELECT * from tourist, admin";
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

    public function countReservations()
    {
        $query1 = "SELECT count(*) FROM guest_reservation where DATE(bookingDateTime ) = CURRENT_DATE()";
        $query2 = "SELECT count(*) FROM admin_reservation where DATE(bookingDateTime ) = CURRENT_DATE()";

        $query = "SELECT count(*) from guest_reservation";
        $stmt1 = mysqli_query($this->conn, $query);
        $stmt2 = mysqli_query($this->conn, $query2);
        $rowcount1 = mysqli_num_rows($stmt1);
        $rowcount2 = mysqli_num_rows($stmt2);
        return $rowcount1;
    }
    public function canceledReservations()
    {
        $query1 = "SELECT count(*) FROM guest_reservation where status = 'Cancelled'";
        $query2 = "SELECT count(*) FROM admin_reservation where status = 'Cancelled'";
        // $query = "SELECT count(*) from guest_reservation";
        $stmt1 = mysqli_query($this->conn, $query1);
        $stmt2 = mysqli_query($this->conn, $query2);
        $rowcount1 = mysqli_num_rows($stmt1);
        $rowcount2 = mysqli_num_rows($stmt2);
        return $rowcount1 + $rowcount2;
    }

    public function viewhotelPayments()
    {
        $query = "Select * from payment p, guest_reservation g where p.reservationID=g.reservationID and category='reservation' and g.hotelId='$id'";
        return $this->getData($query);
    }
    public function get_payments($id)
    {
        $query = "Select * from guest_reservation where reservationID ='$id'";
        return $this->getData($query);

    }
     public function viewGuestReservations($id)
    {
        $query = "Select * from guest_reservation g, payment p where hotelId='$id'";
        return $this->getData($query);
    }
     public function viewAdminReservations($id)
    {
        $query = "Select * from admin_reservation g, payment p where hotelId='$id'";
        return $this->getData($query);
    }
     public function viewPendingReservations()
    {
        $query = "Select * from guest_reservation g, roomtype r where g.typeID=r.roomTypeID and status='Pending' and g.hotelId='$id'";
        return $this->getData($query);
    }
}
