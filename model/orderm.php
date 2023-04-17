<?php
require_once "../db/db_connection.php";

class order  extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function vieworders($oId)
    {
    
        $query = "Select * from order where orderID = '$oId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        
    }
    public function viewAllOrders($id)
    {
        
        $query = "SELECT * FROM craftorder o, entrepreneur e where o.entID=e.entID and e.entID='$id'";
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






   
    

    
}
?>

