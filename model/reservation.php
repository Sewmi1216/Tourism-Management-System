<?php
require_once "../db/db_connection.php";

class reservation extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function viewhotelPayments($id)
    {
        $query = "Select * from hotel_payment h, guest_reservation g where h.reservationID = g.reservationID and h.hotelId='$id'";

        return $this->getData($query);
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
    public function searchForReport($from, $to, $id)
    {
        $query = "SELECT * FROM hotel_payment p, guest_reservation g WHERE p.reservationID=g.reservationID and g.hotelId='$id' and p.paymentDateTime BETWEEN '$from' AND '$to'";
        $stmt = mysqli_query($this->conn, $query);
        $results = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        return $results;
    }

}
