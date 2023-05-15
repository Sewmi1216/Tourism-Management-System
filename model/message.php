<?php
require_once "../db/db_connection.php";

class message extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
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
// hotel chat
    public function chatUsers()
    {
        $sql = "SELECT userID, name, email from tourist union select adminID, name, email from admin";
        return $this->getData($sql);
    }

    public function getMessages($id, $user)
    {
        $query = mysqli_query($this->conn, "SELECT * from message WHERE (user_to='$id' AND user_from='$user') OR (user_from='$id' AND user_to='$user')");
        while ($row = mysqli_fetch_array($query)) {
            $user_to = $row['user_to'];
            $user_from = $row['user_from'];
            $body = $row['body'];
            // $date = $row['date'];
            // $date_time_now = date("Y-m-d H:i:s", strtotime($date));

            $div_top = ($user_to == $id) ? "<div class='message' id='red'>" : "<div class='message' id='blue'>";
            $data = $data . $div_top . $body . "</div><br><br><br>";
        }
        return $data;
    }
    public function sendMessage($user_to, $userLoggedIn, $body, $date)
    {
        if ($body != "") {
            $query = "INSERT INTO message VALUES('', '$user_to','$userLoggedIn', '$body', NOW())";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }
    public function viewAllHotels()
    {
        $sql = "SELECT hotelID, name, email from hotel where status='1'";
        return $this->getData($sql);
    }
    public function viewAllTourists()
    {
        $sql = "SELECT userID, name, email from tourist";
        return $this->getData($sql);
    }

    public function viewAllAssignedTourists($id)
    {
        $sql = "SELECT t.name AS tourist_name,t.email AS tourist_email
FROM tourist t
WHERE t.userID IN (
  SELECT b.touristID
  FROM tourbooking b
  WHERE b.tourGuideId = '$id');";
        return $this->getData($sql);
    }
    public function viewAdmin()
    {
        $sql = "SELECT adminID, name, email from admin";
        return $this->getData($sql);
    }
    public function viewAllEnts()
    {
        $sql = "SELECT entID, businessName, email from entrepreneur where status='1'";
        return $this->getData($sql);
    }
    public function viewAllGuides()
    {
        $sql = "SELECT tourguideID, name, email from tourguide where status='1'";
        return $this->getData($sql);
    }
    public function tsendMessage($user_to, $userLoggedIn, $body, $date)
    {
        if ($body != "") {
            $query = "INSERT INTO message VALUES('', '$user_to','$userLoggedIn', '$body', '$date', 'no', 'no', 'no')";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }
}
