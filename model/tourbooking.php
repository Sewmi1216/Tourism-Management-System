<?php
require_once "../db/db_connection.php";
// The http request hits there third.
// Depending on the function called, database is access and some data is return / or may be no data is return.
class tourbooking extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

   /* public function validate($username, $password)
    {
        $query = "SELECT * FROM tourist where email='$username' and password='$password'";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    } */

    public function inserttourbooking($inputs)
    {
       
    
        $query = "INSERT INTO tourpackage(packageName, price, description, adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '1')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function updatetourbooking($inputs)
    {
       
    
        // $query = "UPDATE tourpackage SET (packageName, price, description, participant_count , adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '$inputs[3]', '1') where packageID = $inputs[4]";
        $query = "UPDATE tourpackage SET packagename = '$inputs[0]', price ='$inputs[1]', description ='$inputs[2]', participant_count ='$inputs[3]' WHERE packageID ='$inputs[4]'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function viewtourpkgs()
    {
       
    
        $query = "SELECT * FROM tourpackage ";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function viewtourbookingpending()
    {
       
    
        $query = "SELECT * FROM tourbooking where status = 0 ";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function viewtourpkg($id)
    {
       
    
        $query = "SELECT * FROM tourpackage where packageid = $id ";
        
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
}