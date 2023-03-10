<?php

include '../model/orderm.php';

class orderController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    

    
    public function viewAllOrders()
    {
        

        $order = new order();

        $result = $order->viewAllOrders();

        // include "../view/order.php";
        return $result;

    }

}


