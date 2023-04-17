<?php

include '../model/room.php';

class roomController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addRoom($roomNo,$beds, $price, $view,$typeId,$id)
    {
        $room = new room();


        $res = $room->insertRoom($roomNo,$beds,$price,$view,$typeId,$id);

        if (!$res) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {
            echo "<script>
        window.location.href = '../view-hotel/room.php';
        </script>";
        }

    }
    public function viewRoom($rId)
    {
        $rm = new room();
        $rs = $rm->viewRoom($rId);
        return $rs;

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


    public function updateRoom($roomno, $typeId, $beds, $price, $view)
    {
        $room = new room();
        $room->updateRoom($roomno, $typeId, $beds, $price, $view);


        if (!$room) {
            echo 'There was a error';
          
        } else {


            echo "<script>
        window.location.href = '../view-hotel/room.php';
        </script>";

        }
    }
    public function deleteRoom($id)
    {
        $hp = new room();
        $hp->deleteRoom($id);

        if (!$hp) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {
            echo "<script>
        window.location.href = '../view-hotel/room.php';
        </script>";

        }

    }
}
