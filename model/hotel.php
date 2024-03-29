<?php
require_once "../db/db_connection.php";

class hotel extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    // public function validate($email)
    // {
    //     $stmt = array();
    //     // $query = "SELECT * FROM hotel where username='$username'";
    //     $query1 = "SELECT * FROM hotel where email='$email'";
    //     $query2 = "SELECT * FROM tourist where email='$email'";
    //     $query3 = "SELECT * FROM admin where email='$email'";
    //     $query4 = "SELECT * FROM entrepreneur where email='$email'";
    //     $query5 = "SELECT * FROM tourguide where email='$email'";

    //     //echo "print";
    //     $stmt[0] = mysqli_query($this->conn, $query1);
    //     $stmt[1] = mysqli_query($this->conn, $query2);
    //     $stmt[2] = mysqli_query($this->conn, $query3);
    //     $stmt[3] = mysqli_query($this->conn, $query4);
    //     $stmt[4] = mysqli_query($this->conn, $query5);

    //     //$stmt = $this->conn->prepare($query);
    //     //$stmt->execute();
    //     return $stmt;
    // }

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
        //  $query = "select hotelID from hotel where email='$email'";
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
    //Hotels can only chat with admin and tourists.
    // public function viewAllUsers()
    // {
    //     $query = "SELECT * from tourist";
    //     return $this->getData($query);
    // }
    public function viewAllHotels()
    {
        $sql = "SELECT userID, name, email from tourist union select adminID, email, password from admin";
        return $this->getData($sql);
    }
    //  public function chatUser()
    // {
    //     $sql = "SELECT userID, email from tourist union select adminID, email from admin";
    //     return $this->getData($sql);
    // }

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
    public function updateprofile($id, $name, $address, $phone, $managerName, $managerPhone, $managerEmail, $managerNic)
    {
        $query = "update hotel set name='$name', address='$address', phone='$phone', managerName='$managerName', managerPhone='$managerPhone', managerEmail='$managerEmail', managerNic='$managerNic' where hotelID='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function countReservations($id)
    {
        $query1 = "SELECT COUNT(*) as num_reservations FROM guest_reservation WHERE DATE(bookingDateTime) = CURDATE() and hotelID='$id';";
        $query2 = "SELECT count(*) FROM admin_reservation where DATE(bookingDateTime ) = CURRENT_DATE()";

        return $this->getData($query1);

    }
    public function canceledReservations($id)
    {
        $query1 = "SELECT COUNT(*) as num_reservations FROM guest_reservation WHERE status ='Cancelled' and DATE(bookingDateTime) = CURDATE() and hotelID='$id';";
        return $this->getData($query1);

    }
    public function countRoomTypeReservations($id)
    {
        $query1 = "SELECT rt.typeName as room_type, COUNT(*) as num_reservations FROM guest_reservation gr INNER JOIN room r ON gr.roomID = r.roomNo INNER JOIN roomtype rt ON r.typeID = rt.roomTypeId where gr.hotelId='$id' GROUP BY rt.typeName;";
        return $this->getData($query1);
    }
    public function revenue($id)
    {
        $query1 = "SELECT YEAR(paymentDateTime) AS year, MONTHNAME(paymentDateTime) AS month, SUM(amount) AS revenue FROM hotel_payment where hotelId='$id' GROUP BY YEAR(paymentDateTime), MONTH(paymentDateTime);";
        return $this->getData($query1);
    }
    public function todayRevenue($id)
    {
        $query1 = "SELECT SUM(amount) as today_revenue FROM hotel_payment WHERE DATE(paymentDateTime) = CURDATE() AND paymentStatus = 'Completed';";
        return $this->getData($query1);
    }
    public function pendingPayments($id)
    {
        $query1 = "SELECT COUNT(*) as pending_payments FROM hotel_payment WHERE DATE(paymentDateTime) = CURDATE() AND paymentStatus = 'Pending' and hotelID='$id';";
        return $this->getData($query1);
    }

    public function viewhotelPayments($id)
    {
        $query = "Select * from hotel_payment h, guest_reservation g where h.reservationID = g.reservationID and h.hotelId='$id'";

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
        $query = "SELECT * from hotel where status = 0";
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
        $query = "UPDATE hotel SET status = 2 where hotelID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function removehotelrequest($id)
    {

        // print_r($id);
        // die();

        $query = "UPDATE hotel SET status = 3 where hotelID= $id ";

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
        $query = "SELECT * from hotel where status= 2";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }
    public function updateStatus($reservationid, $newStatus)
    {
        $query = "UPDATE guest_reservation SET status='$newStatus' WHERE reservationID='$reservationid'";
        $stmt = mysqli_query($this->conn, $query);
        if ($stmt) {
            return $stmt;
        } else {
            die('Error in query1: ' . mysqli_error($this->conn));
        }
    }
}