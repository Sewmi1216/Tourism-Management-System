<?php
require_once "../db/db_connection.php";

class payment extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    
   
    public function viewAllPayments(){
       $query = "Select * from payment";
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
}
