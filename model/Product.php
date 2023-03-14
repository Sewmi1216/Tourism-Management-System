<?php
require_once "../db/db_connection.php";

class product extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertproduct($eid,$pName, $pCategory,$avaquantity, $price,$fileImg)
    {
        $query = "INSERT INTO product (productName,category,quantity,price,productImg,entID) VALUES ('$pName', '$pCategory','$avaquantity', '$price','$fileImg','$eid')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function viewproduct($pId)
    {
    
        $query = "Select * from product where productID = '$pId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        
    }
    public function viewAll($id)
    {
        
        $query = "SELECT * FROM product p, entrepreneur e where p.entID=e.entID and e.entID='$id'";
        return $this->getData($query);

    }
    private function getData($query) {
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die('Error in query: '. mysqli_error($this->conn));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result)) {
			$data[]=$row;            
		}
		return $data;
	}



public function deleteproduct($eid){
    $query = "delete from product where productID='$eid'";
    $stmt = mysqli_query($this->conn, $query);
    return $stmt;
}

public function updateproduct($id, $pName, $pCategory,$avaquantity, $price,$fileImg){
    $query = "UPDATE product SET productName='$pName', category='$pCategory', quantity='$avaquantity', price='$price', productImg='$fileImg' WHERE productID='$id'";
    $stmt = mysqli_query($this->conn, $query);
    return $stmt;
}



}
?>