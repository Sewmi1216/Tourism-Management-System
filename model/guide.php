<?php
require_once "../db/db_connection.php";

class guide extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function validate($username){
        $query = "SELECT * FROM tourguide where username='$username'";
       
        $stmt = mysqli_query($this->conn, $query);
       
        return $stmt;
    }
    public function insertourguide($name,$address, $email,$phone,$nic, $fileImg, $username, $password, $availability,$language,$fileDoc,$vehicle,$type,$passenger)
    {
        $query = "INSERT INTO tourguide (name, address, email, phone,nic, profileImg, username, password, availability, languages,document,vehicleNumber,vehicleType,passenger,status) VALUES ('$name,$address, $email,$phone,$nic,$fileImg,$username,$password,$availability,$language,$fileDoc,$vehicle,$type,$passenger', 0)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
       return $stmt;
    }

    public function viewAll($id)
    {
    
        $query = "Select * from tourguide " ;
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



// public function updateentrepreneur($businessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc){
//     $query = "UPDATE entrepreneur SET businessName='$businessName', address='$address', email='$email', phone='$phone', profileImg='$fileImg' , username='$username', password='$password', entrepreneurName='$eName', entrepreneurNic='$eNic' ,entrepreneurPhone='$ePhone' ,entrepreneurEmail='$eEmail', document='$fileDoc'WHERE entID='id'";
//     $stmt = mysqli_query($this->conn, $query);
//     return $stmt;
// }


    

    public function viewentrepreneue($eId)
    {
    
        $query = "Select * from entrepreur where entID = '$eId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        
    }

}
?>

   
