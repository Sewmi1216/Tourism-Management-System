<?php
require_once "../db/db_connection.php";

class tourist extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($username, $password)
    {
        $query = "SELECT * FROM tourist where email='$username' and password='$password'";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function insertTourist($inputs)
    {
        
        $query = "INSERT INTO tourist (name, address, email, phone, username, password, dob, country) VALUES ('$inputs[0]', '$inputs[4]', '$inputs[2]', '$inputs[1]', '$inputs[2]', '$inputs[3]', '$inputs[6]', '$inputs[4]')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getallproducts(){
        $query = "SELECT * FROM product";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function getproduct($id){
        $query = "SELECT * FROM product WHERE productID='$id'";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function insertToCart($quantity,$productID,$touristID){
        $query = "INSERT INTO cart_item (quantity, productID, tourist_ID) VALUES ('$quantity', '$productID' , '$touristID')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getallcartitems(){
        $t_id = $_SESSION['touristID'];
        $query = "SELECT * FROM cart_item WHERE tourist_ID='$t_id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        
    }

    public function checkmail($email){
        $query = "SELECT * FROM tourist where email='$email'";
        
        $stmt = mysqli_query($this->conn, $query);
        $rows = mysqli_num_rows($stmt);
        return $rows;
    }

    public function checkproid($id){
        $query = "SELECT * FROM cart_item where productID='$id'";
        $stmt = mysqli_query($this->conn, $query);
        $rows = mysqli_num_rows($stmt);
        return $rows;
    }

    public function updateToCart($quan, $productID, $tourist_id){
        $query = "SELECT quantity FROM cart_item where productID='$productID'";
        $stmt = mysqli_query($this->conn, $query);
        $quantity = mysqli_fetch_assoc($stmt);
        $q = intval($quantity['quantity']);
       
        $q2 = intval($quan );
        $u_quantity = $q + $q2;
        $sql2 = "UPDATE cart_item SET quantity='$u_quantity' WHERE productID='$productID'";
        $stmt2 = mysqli_query($this->conn, $sql2);
        return $stmt2;
    }

        

    
}