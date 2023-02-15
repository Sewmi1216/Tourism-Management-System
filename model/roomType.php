<?php
require_once "../db/db_connection.php";
// session_start();
// $user = "";
// if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
//     $id = $_SESSION["hotelID"];
// } else {
//     header("location:login.php");
// }

class roomType extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertRoomType($pkgName, $price, $desc, $filename, $status)
    {
        require_once "../view-hotel/roomType.php";

        $sql= "INSERT INTO roomtype(typeName, price, img, description, typestatus, hotelID) VALUES ('$pkgName','$price', '$filename', '$desc','$status', '$id')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmts = $this->conn->prepare($sql);
        $stmts->execute();
        return $stmts;
    }
    // public function viewAllPkgs()
    // {
    //   $query = "Select * from hotelpackage p, hotel h where p.hotelID=h.hotelID";

    //     $stmt = mysqli_query($this->conn, $query);
    //     return $stmt;

    // }
    public function viewType($pId)
    {
    //    $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID and roomTypeId = '$pId'";
        $query = "Select * from roomtype where roomTypeId = '$pId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        // $stmt = $this->conn->prepare($query);

        // $stmt->execute();
        // echo 'sql';

        // return $stmt;

    }
      public function viewAllTypes(){
       $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID";
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
    public function updateType($id, $pkgName, $price, $desc, $filename, $status){
        $query = "update roomtype set typeName='$pkgName', price='$price', description='$desc', img='$filename', typestatus='$status' where roomTypeId='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function deleteType($id){
        $query = "delete from roomtype where roomTypeId='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
}
