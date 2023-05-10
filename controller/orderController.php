<?php

include '../model/order.php';

class orderController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }
      public function insertCraftOrder($touristID, $orderItems, $name, $phone, $address)
{
    $order = new order();
    return $order->insertCraftOrder($touristID, $orderItems, $name, $phone, $address);
}
}
