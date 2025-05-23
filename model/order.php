<?php
require_once "../db/db_connection.php";

class order extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertCraftOrder($touristID, $orderItems, $name, $phone, $address, $total)
    {
        $query = "INSERT INTO craftorder (orderDateTime, status, touristID, customerName, customerPhone, customerAddress) VALUES (NOW(), 'Pending', '$touristID', '$name','$phone','$address')";
        $stmt = mysqli_query($this->conn, $query);

        if ($stmt) {
            $orderId = mysqli_insert_id($this->conn); // get the order ID

            foreach ($orderItems as $orderItem) {
                $productId = $orderItem['productId'];
                $qty = $orderItem['quantity'];

                $query1 = "INSERT INTO craftorder_items (orderId, productId, quantity) VALUES ('$orderId', '$productId', '$qty')";
                $stmt = mysqli_query($this->conn, $query1);

                if (!$stmt) {
                    $error1 = mysqli_error($this->conn);
                    return "Error2: $error1";
                }
            }
            $query2 = "INSERT INTO craftorder_payment(orderId, paymentDateTime, amount, paymentStatus) VALUES ('$orderId', NOW(), '$total', 'Completed')";
            $rst = mysqli_query($this->conn, $query2);
            return $rst;
        } else {
            $error2 = mysqli_error($this->conn);
            return "Error1: $error2";
        }
    }

}
  