<?php
require_once "../db/db_connection.php";

class entrepreneur extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($username){
        $query = "SELECT * FROM entrepreneur where username='$username'";
       
        $stmt = mysqli_query($this->conn, $query);
       
        return $stmt;
    }
    public function insertentrepreneur($businessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc)
    {
        $query = "INSERT INTO entrepreneur (businessName, address, email, phone, profileImg, username, password, entrepreneurName, entrepreneurNic,  entrepreneurPhone, entrepreneurEmail, document, status) VALUES ('$businessName', '$address','$email','$phone', '$fileImg', '$username', '$password', '$eName', '$eNic','$ePhone', '$eEmail',  '$fileDoc', 0)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
       return $stmt;
    }

    public function viewAll()
    {
    
        $query = "Select * from entrepreneur " ;
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



public function updateentrepreneur($businessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc){
    $query = "UPDATE entrepreneur SET businessName='$businessName', address='$address', email='$email', phone='$phone', profileImg='$fileImg' , username='$username', password='$password', entrepreneurName='$eName', entrepreneurNic='$eNic' ,entrepreneurPhone='$ePhone' ,entrepreneurEmail='$eEmail', document='$fileDoc'WHERE entID='id'";
    $stmt = mysqli_query($this->conn, $query);
    return $stmt;
    
}


    public function viewAllentrepreneur()
    {
        $query = "SELECT * from entrpreneur";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    
    }

    public function viewAllentrepreneurs(){
        $query = "SELECT * FROM entrepreneur where status = 2";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }


    public function viewpendingentrepreneurs(){
            $query = "SELECT * FROM entrepreneur where status=1";
    
            $stmt = mysqli_query($this->conn, $query);
            return $stmt;

    }

    public function viewoneentrepreneur($id){
        $query = "SELECT * FROM entrepreneur where entID= $id";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function removeentrepreneur($id){

        // print_r($id);
        // die();
        $query = "UPDATE entrepreneur SET status = 0 where entID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function removeentrepreneurrequest($id){

        // print_r($id);
        // die();

        $query = "UPDATE entrepreneur SET status = 0 where entID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function acceptentrepreneurrequest($id){

        // print_r($id);
        // die();

        $query = "UPDATE entrepreneur SET status = 2 where entID= $id ";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }

    public function viewdeletedentrepreneurs(){
        $query = "SELECT * FROM entrepreneur where status=0";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

}
}   
?>