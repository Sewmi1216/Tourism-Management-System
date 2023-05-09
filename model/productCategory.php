<?php
require_once "../db/db_connection.php";


class productCategory extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertProductCategory($ctgName, $desc, $id)
    {
        require_once "../view-entrepreneur/productCategory.php";

        $sql = "INSERT INTO product_category(categoryName, description, entID) VALUES ('$ctgName', '$desc', '$id')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmts = $this->conn->prepare($sql);
        $stmts->execute();
        return $stmts;
    }
    public function addproductCategoryImg($categoryid, $file)
    {
        require_once "../view-entrepreneur/addPhotos.php";

        // $sql= "INSERT INTO roomtype_img(roomTypeId, image) VALUES (?, ?)";
        $sql = "INSERT INTO product_img(productCategoryId, image) VALUES ('$categoryid', '$file')";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bind_param("ib", $typeid, $file);

        $stmt->execute();
        return $stmt;
    }
   
    public function viewCategpry($cId)
    {
        //    $query = "Select * from roomtype p, hotel h where p.hotelID=h.hotelID and roomTypeId = '$pId'";
        $query = "Select * from product_category where product_categoryId = '$cId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }
    public function viewAllCategories($id)
    {

        $query = "Select * from product_category p, entrepreneur e where p.entID=e.entID and e.entID='$id'";
        return $this->getData($query,$this->conn);
    }

    public function viewAllImgs($getid)
    {
        $query = "Select * from product_img i, product_Category p where i.productCategoryId=p.productCategoryId and p.productCategoryId='$getid'";
        // $query = "Select * from roomtype_img";

        return $this->getData($query,$this->conn);

    }
    public function deleteImg($id)
    {
        $query = "delete from product_img where id='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    private function getData($query,$conn)
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die('Error in query: ' . mysqli_error($conn));
        }
        $data = array();
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function updateCategory($id, $ctgName, $desc)
    {
        $query = "update product_category set categoryName='$ctgName', description='$desc' where product_categoryId='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }
    public function deleteCategory($id)
    {
        $query = "delete from product_category where product_categoryId='$id'";
        $foreign_key_query = "SELECT * FROM `ent` WHERE entID='$id'";

        $foreign_key_result = mysqli_query($this->conn, $foreign_key_query);

        if (mysqli_num_rows($foreign_key_result) > 0) {
            echo '<script>alert("Deletion prevented due to foreign key constraints")</script>';
            echo "<script> window.location.href = '../view-entrepreneur/productCategory.php'; </script>";
        } else {
            mysqli_query($this->conn, $query);
            echo "<script> window.location.href = '../view-entrepreneur/productCategory.php'; </script>";
        }
    }
   

}
