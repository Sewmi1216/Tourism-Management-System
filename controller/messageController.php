<?php
error_reporting(E_ERROR | E_PARSE);

include '../model/message.php';

class messageController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

      public function viewAllHotels()
    {
        $hotel = new message();
        $result = $hotel->viewAllHotels();
        return $result;
    }
    public function getMessages($id, $user)
    {
        $hotel = new message();
        $result = $hotel->getMessages($id, $user);
        return $result;
    }
    public function sendMessage($user_to, $userLoggedIn, $body, $date)
    {
        $hotel = new message();
        $result1 = $hotel->sendMessage($user_to, $userLoggedIn, $body, $date);
        return $result1;
    }
}
