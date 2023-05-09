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

     private function getData($query)
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die('Error in query: ' . mysqli_error());
        }
        $data = array();
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function inserttourpackage($inputs)
    {
       
    

        $query = "INSERT INTO tourpackage(packageName, price, description, adminID, max_part , status, no_of_days) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '1', '$inputs[3]', 'Available' , '$inputs[4]')";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function updatetourpackage($inputs)
    {
        // $query = "UPDATE tourpackage SET (packageName, price, description, participant_count , adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '$inputs[3]', '1') where packageID = $inputs[4]";
        $query = "UPDATE tourpackage SET packagename = '$inputs[0]', price ='$inputs[1]', description ='$inputs[2]', max_part ='$inputs[3]', no_of_days='$inputs[4]' WHERE packageID ='$inputs[5]'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function viewtourpkgs()
    {
       
    
        //$query = "SELECT * FROM tourpackage where visible = 1 ";

        $query = "SELECT * FROM tourpackage where status = 'Available'";

     
        return $this->getData($query);
    }

    public function viewtourpkg($id)
    {
       
    
        $query = "SELECT * FROM tourpackage where packageid = $id ";
        
        $stmt = mysqli_query($this->conn, $query);
 
 
        return $stmt;
    }

    public function deletePkg_permenent($id)
    {
       
    
        $query = "DELETE FROM tourpackage where packageid = $id ";
        
        $stmt = mysqli_query($this->conn, $query);
 
 
        return $stmt;
    }
    public function deletetourPkg($id)
    {
       
    
        // $query = "UPDATE tourpackage SET (packageName, price, description, participant_count , adminID) VALUES ('$inputs[0]','$inputs[1]','$inputs[2]', '$inputs[3]', '1') where packageID = $inputs[4]";
        $query = "UPDATE tourpackage SET status = 'Unavailable' WHERE packageID = $id";
        //  print_r($query);
        // die(); 

        $foreign_key_query = "SELECT * FROM `tourbooking` WHERE tourPkgId='$id'";

        $foreign_key_result = mysqli_query($this->conn, $foreign_key_query);

        if (mysqli_num_rows($foreign_key_result) > 0) {
            echo '<script>alert("Deletion prevented due to foreign key constraints")</script>';
            echo "<script> window.location.href = '../view-admin/tourpackage.php'; </script>";
        } else {
            mysqli_query($this->conn, $query);
            echo "<script> window.location.href = '../view-admin/tourpackage.php'; </script>";
        }
      
    }

    public function viewdeletedtourPkg()
    {
        $query = "SELECT * FROM tourpackage where status = 'Unavailable' ";
    
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }


    
    //adding images
    public function addtourpackageimg($package_id, $file)
    {
        require_once "../view-admin/addPhotos.php";

        // $sql= "INSERT INTO tourpackage_img(tourpackageid, image) VALUES (?, ?)";
        $sql = "INSERT INTO tourpackage_img(tourpackageId, image) VALUES ('$package_id', '$file')";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bind_param("ib", $typeid, $file);

        $stmt->execute();

        // print_r($stmt);
        // die();

        return $stmt;
    }

    public function viewAllImgs($getid)
    {
        $query = "Select * from tourpackage_img i, tourpackage t where i.tourpackageId=t.packageID and i.tourpackageId='$getid'";
        // $query = "Select * from roomtype_img";

        return $this->getData($query);

    }
        public function deleteImg($id)
    {
        $query = "delete from tourpackage_img where id='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
}