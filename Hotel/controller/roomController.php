<?php

include '../model/room.php';

class roomController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addRoom($roomNo,$type,$beds,$status,$hotelPkgId)
    {
        $room = new room();

        $res = $room->insertRoom($roomNo,$type,$beds,$status,$hotelPkgId);

        if (!$res) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {
            echo "<script>alert('Your form was successfully submitted');
        window.location.href = 'room.php';
        </script>";
        }

    }

}
