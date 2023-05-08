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
// hotel chat
    public function chatUsers()
    {
        $hotel = new message();
        $result = $hotel->chatUsers();
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

    public function viewAllTourists()
    {
        $hotel = new message();
        $result = $hotel->viewAllTourists();
        return $result;
    }
    public function viewAllGuides()
    {
        $hotel = new message();
        $result = $hotel->viewAllGuides();
        return $result;

    }
    public function viewAllHotels()
    {
        $hotel = new message();
        $result = $hotel->viewAllHotels();
        return $result;
    }
    public function viewAdmin()
    {
        $hotel = new message();
        $result = $hotel->viewAdmin();
        return $result;
    }
    public function viewAllEnts()
    {
        $hotel = new message();
        $result = $hotel->viewAllEnts();
        return $result;
    }
    public function tsendMessage($user_to, $userLoggedIn, $body, $date)
    {
        $hotel = new message();
        $result1 = $hotel->sendMessage($user_to, $userLoggedIn, $body, $date);
        return $result1;
    }
}
