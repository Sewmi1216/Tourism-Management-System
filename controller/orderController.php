<?php

include '../model/orderm.php';

class orderController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    // public function viewAll($id)
    // {
    //     $product = new product();

    //     $results= $product->viewAll($id);

    //     // include "../view/product.php";
    //     return $results;

    // }

    
    public function viewAllOrders($id)
    {
        

        $order = new order();

        $result = $order->viewAllOrders($id);

        // include "../view/order.php";
        return $result;

    }

}


