<?php
require_once "../db/db_connection.php";

class product extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertproduct($pName, $pCategory, $avaquantity, $price, $id)
    {
        $query = "INSERT INTO product (productName,category,quantity,price,entID) VALUES ('$pName','$pCategory','$avaquantity','$price','$id')";

        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function addproductImg($productid, $file)
    {
        require_once "../view-entrepreneur/addPhotos.php";

        // $sql= "INSERT INTO roomtype_img(roomTypeId, image) VALUES (?, ?)";
        $sql = "INSERT INTO product_img(image,productID) VALUES ('$file','$productid')";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bind_param("ib", $typeid, $file);

        $stmt->execute();
        if (!$stmt) {
            die('Error in query: ' . mysqli_error($this->conn));
        }
        return $stmt;
    }
    public function viewAllImgs($getid)
    {
        $query = "Select * from product_img i, product p where i.productID=p.productID and i.productID='$getid'";
        // $query = "Select * from roomtype_img";

        return $this->getData($query);

    }
    public function deleteImg($id)
    {
        $query = "delete from product_img where id='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function viewproduct($pId)
    {

        $query = "Select * from product where productID = '$pId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }
    public function viewAll($id)
    {

        $query = "SELECT * FROM product p, entrepreneur e where p.entID=e.entID and e.entID='$id'";
        return $this->getData($query);

    }
    private function getData($query)
    {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die('Error in query: ' . mysqli_error($this->conn));
        }
        $data = array();
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function deleteproduct($id)
    {
        $query = "delete from product where productID='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function updateproduct($id, $pName, $pCategory, $avaquantity, $price)
    {
        $query = "UPDATE product SET productName='$pName', category='$pCategory', quantity='$avaquantity', price='$price' WHERE productID='$id'";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    public function vieworders($oId)
    {

        $query = "Select * from order where orderID = '$oId'";

        $stmt = mysqli_query($this->conn, $query);
        return $stmt;

    }
    public function viewAllOrders($id)
    {

        $query = "SELECT * FROM craftorder o, product p where p.productID=o.productID and p.entID='$id'";
        // $query = "SELECT * FROM craftorder o, entrepreneur e where o.entID=e.entID and e.entID='$id'";

        return $this->getData($query);
    }
     public function viewOrderPayments($id)
    {
        $query = "Select * from craftorder o, craftorder_payment c, product p where o.orderID = c.craftOrderId and o.productID= p.productID and p.entID='$id'";

        return $this->getData($query);
    }
    public function countOrders($id)
    {
        $query1 = "SELECT COUNT(orderID) as count FROM craftorder o, product p WHERE DATE(o.orderDateTime) = CURDATE() and o.productID= p.productID and p.entID='$id'";
        return $this->getData($query1);
    }
     public function cancelledOrders($id)
    {
        $query1 = "SELECT COUNT(orderID) as cancelled FROM craftorder o, product p WHERE DATE(orderDateTime) = CURDATE() and status='Cancelled' and o.productID= p.productID and p.entID='$id'";
        return $this->getData($query1);
    }
    public function todayRevenue($id)
    {
        $query1 = "SELECT SUM(amount) as amount FROM craftorder o, craftorder_payment c, product p where o.orderID = c.craftOrderId and o.productID= p.productID and p.entID='$id' and DATE(c.paymentDateTime) = CURDATE() and c.paymentStatus = 'Completed'";
        return $this->getData($query1);
    }
}
