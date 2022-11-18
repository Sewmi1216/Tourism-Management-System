<?php
require_once "../db/db_connection.php";

class product extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertproduct($pName, $pCategory,$avaquantity, $price,$fileImg)
    {
        $query = "INSERT INTO product (productName, category, quantity,price, productImg) VALUES ('$pName, $pCategory,$avaquantity, $price,$fileImg')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function viewAll()
    {
        $query = "Select * from product p, entrepreneurID E where p.entrepreneurID=e.entrepreneurID";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        // $stmt = $this->conn->prepare($query);

        // $stmt->execute();
        // echo 'sql';

        // return $stmt;

    }
}
