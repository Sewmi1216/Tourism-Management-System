<?php
error_reporting(E_ERROR | E_PARSE);

include '../model/hotel.php';

class chatController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

   public function viewAllUsers()
    {
        $hotel = new hotel();
        $result = $hotel->viewAllUsers();
        return $result;

    }
}
