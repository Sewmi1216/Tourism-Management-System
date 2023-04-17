<?php
require_once "../db/db_connection.php";

class hotel extends db_connection
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

    public function insertHotel($hotelName, $address, $email, $phone, $fileImg, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        //  $query = "INSERT INTO hotel (name, address, email, phone, profileImg, password, managerName, managerPhone, managerEmail, managerNic, status, document) VALUES ('$hotelName', '$address', '$email', '$phone', '$fileImg', '$password', '$mName', '$mPhone', '$mEmail', '$mNic', 0, '$fileDoc')";
        //$query = "INSERT INTO hotel (name, address, email, phone, profileImg, password, managerName, managerPhone, managerEmail, managerNic, status, document) SELECT '$hotelName', '$address', '$email', '$phone', '$fileImg', '$password', '$mName', '$mPhone', '$mEmail', '$mNic', 0, '$fileDoc' WHERE NOT EXISTS (SELECT hotelID FROM hotel WHERE email = '$email')";

        // $stmt = mysqli_query($this->conn, $query);
        // $stmt = $this->conn->prepare($query);
        // $stmt->execute();
        //  return $stmt;

        $query = "INSERT INTO hotel (name, address, email, phone, profileImg, password, managerName, managerPhone, managerEmail, managerNic, document) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssssssss", $hotelName, $address, $email, $phone, $fileImg, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc);
        $stmt->execute();
        return $stmt;

    }
    public function checkEmail($email)
    {
        $query = "select hotelID from hotel where email='$email'";
        $stmt = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($stmt);
        return $row;
    }

    // //Hotels can only chat with admin and tourists.
    // public function viewAllUsers(){
    //     $query = "SELECT * from tourist, admin";
    //     $result = mysqli_query($this->conn, $query);
    //     return $result;
    // }

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

    public function viewProfile($id)
    {
        //    $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID and roomTypeId = '$pId'";
        $query = "Select * from hotel where hotelID = '$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function updateprofile($id, $name, $address, $email, $phone, $username, $password, $managerName, $managerPhone, $managerEmail, $managerNic)
    {
        $query = "update hotel set name='$name', address='$address', email='$email', phone='$phone',username='$username', password='$password',managerName='$managerName', managerPhone='$managerPhone', managerEmail='$managerEmail', managerNic='$managerNic' where hotelID='$id'";
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

    public function viewhotelPayments($id)
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
        // $query = "Select * from guest_reservation g, payment p where hotelId='1'";
        $query = "Select * from guest_reservation g where hotelId='$id'";

        return $this->getData($query);
    }
    public function viewAdminReservations($id)
    {
        $query = "Select * from admin_reservation g, payment p where hotelId='$id'";
        return $this->getData($query);
    }
    public function viewPendingReservations($id)
    {
        $query = "Select * from guest_reservation g, roomtype r where g.typeID=r.roomTypeID and status='Pending' and g.hotelId='$id'";
        return $this->getData($query);
    }

    public function viewAllmanagers()
    {

        $query = "SELECT * from hotel where status= 1";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function viewAllpendingmanagers()
    {
        $query = "SELECT * from hotel where status IS NULL";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function viewonemanager($id)
    {
        $query = "SELECT * from hotel where hotelID = $id";

        $stmt = mysqli_query($this->conn, $query);
        // print_r($stmt);
        // die();
        return $stmt;

    }

    public function removehotel($id)
    {

        // print_r($id);
        // die();
        $query = "UPDATE hotel SET status = 0 where hotelID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function removehotelrequest($id)
    {

        // print_r($id);
        // die();

        $query = "UPDATE hotel SET status = 0 where hotelID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function accepthotelrequest($id)
    {

        // print_r($id);
        // die();

        $query = "UPDATE hotel SET status = 1 where hotelID= $id ";
        $stmt = mysqli_query($this->conn, $query);
        // return $stmt;
        if ($stmt) {
            $query1 = "select email from hotel where hotelID= $id ";
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

    public function viewdeletedmanagers()
    {
        $query = "SELECT * from hotel where status= 0";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }
}
