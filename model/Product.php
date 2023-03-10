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
        
        // $query = "Select * from product p where quantity='40' or quantity='50' or quantity='10' or quantity='25'" ;
        
        // return $this->getData($query);
        $query = "SELECT * FROM product";
        return $this->getData($query);

    }
    private function getData($query) {
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result)) {
			$data[]=$row;            
		}
		return $data;
	}


public function deleteproduct($id){
    $query = "delete from product where productID='17'";
    $stmt = mysqli_query($this->conn, $query);
    return $stmt;
}

public function updateproduct($id, $pName, $pCategory,$avaquantity, $price,$fileImg){
    $query = "UPDATE product SET productName='$pName', category='$pCategory', quantity='$avaquantity', price='$price', productImg='$fileImg' WHERE productID='$id'";
    $stmt = mysqli_query($this->conn, $query);
    return $stmt;
}



}
