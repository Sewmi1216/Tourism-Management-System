<?php

include '../model/room.php';

class roomController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addRoom($roomNo,$beds,$status,$typeId,$id)
    {
        $room = new room();


        $res = $room->insertRoom($roomNo,$beds,$status,$typeId,$id);

        if (!$res) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {
            echo "<script>
        window.location.href = '../view-hotel/room.php';
        </script>";
        }

    }
    public function viewAllRooms($id)
    {
        $room = new room();
        $result = $room->viewAllRooms($id);
        return $result;
    }

     public function viewAvailableRooms($id)
    {
        $room = new room();
        $result = $room->viewAvailableRooms($id);
        return $result;
    }


}
