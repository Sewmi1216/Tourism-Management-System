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
        $query = "INSERT INTO product (productName, category, quantity,price, productImg) VALUES ('$pName', '$pCategory','$avaquantity', '$price','$fileImg')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function viewAll()
    {
        $query = "Select * from product p, entrepreneur e, entrepreneur_product k where k.entrepreneurID=e.userID and k.productID= p.productID";
        //$query = "Select * from product p";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        // $stmt = $this->conn->prepare($query);

        // $stmt->execute();
        // echo 'sql';

        // return $stmt;

    }
}
