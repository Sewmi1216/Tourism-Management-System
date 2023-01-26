<?php
require_once "../db/db_connection.php";
// session_start();
// $user = "";
// if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
//     $id = $_SESSION["hotelID"];
// } else {
//     header("location:login.php");
// }

class hotelPkg extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertHotelPkg($pkgName, $price, $desc, $filename, $status)
    {
        require_once "../view-hotel/hotelPkg.php";

        $sql= "INSERT INTO hotelpackage(packageName, price, description, image, pkg_status, hotelID) VALUES ('$pkgName','$price','$desc','$filename','$status', '$id')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmts = $this->conn->prepare($sql);
        $stmts->execute();
        return $stmts;
    }
    public function viewAllPkgs()
    {
        // $query = "Select * from hotelpackage p, room r, hotel h where p.packageID=r.hotelPkgID and p.hotelID=h.hotelID";
       // $query = "Select * from hotelpackage p, room r, hotel h where p.packageID=r.hotelPkgID or p.hotelID=h.hotelID";
            $query = "Select * from hotelpackage p, hotel h where p.hotelID=h.hotelID";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        // $stmt = $this->conn->prepare($query);

        // $stmt->execute();
        // echo 'sql';

        // return $stmt;

    }
    public function viewPkg($pId)
    {
       $query = "Select * from hotelpackage p, hotel h where p.hotelID=h.hotelID and packageID = '$pId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
        // $stmt = $this->conn->prepare($query);

        // $stmt->execute();
        // echo 'sql';

        // return $stmt;

    }
    public function updatePkg($id, $pkgName, $price, $desc, $filename, $status){
        $query = "update hotelpackage set packageName='$pkgName', price='$price', description='$desc', image='$filename', pkg_status='$status' where packageID='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function deletePkg($id){
        $query = "delete from hotelpackage where packageID='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
}
