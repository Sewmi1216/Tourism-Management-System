<?php
require_once "../db/db_connection.php";
// The http request hits there third.
// Depending on the function called, database is access and some data is return / or may be no data is return.
class tourpackage extends db_connection
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

    public function inserttourpackage($inputs)
    {
       
    
        $query = "INSERT INTO tourpackage(packageName, price, description, adminID, max_part , visible	, no_of_days) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '1', '$inputs[3]', 1 , '$inputs[4]')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function updatetourpackage($inputs)
    {
       
    
        // $query = "UPDATE tourpackage SET (packageName, price, description, participant_count , adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '$inputs[3]', '1') where packageID = $inputs[4]";
        $query = "UPDATE tourpackage SET packagename = '$inputs[0]', price ='$inputs[1]', description ='$inputs[2]', max_part ='$inputs[3]', no_of_days='$inputs[4]' WHERE packageID =$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function viewtourpkgs()
    {
       
    
        $query = "SELECT * FROM tourpackage where visible = 1 ";
     
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function viewtourpkg($id)
    {
       
    
        $query = "SELECT * FROM tourpackage where packageid = $id ";
        
        $stmt = mysqli_query($this->conn, $query);
 
 
        return $stmt;
    }

    public function deletetourPkg($id)
    {
       
    
        // $query = "UPDATE tourpackage SET (packageName, price, description, participant_count , adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '$inputs[3]', '1') where packageID = $inputs[4]";
        $query = "UPDATE tourpackage SET visible = 0 WHERE packageID = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function viewdeletedtourPkg()
    {
        $query = "SELECT * FROM tourpackage where visible = 0 ";
    
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    
    //adding images
    public function addRoomTypeImg($typeid, $file)
    {
        require_once "../view-hotel/addPhotos.php";

        // $sql= "INSERT INTO roomtype_img(roomTypeId, image) VALUES (?, ?)";
        $sql = "INSERT INTO roomtype_img(roomTypeId, image) VALUES ('$typeid', '$file')";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bind_param("ib", $typeid, $file);

        $stmt->execute();
        return $stmt;
    }
}