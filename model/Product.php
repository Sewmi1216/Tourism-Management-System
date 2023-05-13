<?php
require_once "../db/db_connection.php";

class product extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertproduct($pName,$avaquantity, $price,$categoryID, $id)
    {
        $query = "INSERT INTO product (productName,quantity,price,categoryId,entID) VALUES (?,?,?,?,?)";

        //$stmt = mysqli_query($this->conn, $query);
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiisii",$pName,$avaquantity, $price,$categoryID, $id);
        $stmt->execute();
        if (!$stmt) {
            die('Error in query: ' . mysqli_error($this->conn));
        }
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

        $query = "SELECT * FROM product p, entrepreneur e, product_category c where p.entID=e.entID and p.productName=c.product_categoryId and e.entID='$id'";
        return $this->getData($query);

    }
    public function viewCategories($id)
    {

        $query = "SELECT * FROM product_category where entID='$id'";
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

    public function updateproduct($id,$categoryID, $pName, $avaquantity, $price)
    {
        $query = "UPDATE product SET categoryId='categoryId',productName='$pName',  quantity='$avaquantity', price='$price' WHERE productID='$id'";
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
    //    $query= "SELECT o.orderID, o.orderDateTime AS 'Order Date', o.customerName AS 'Cutomer Name', o.customerAddress AS 'Cutomer Address', o.status, 
    //     GROUP_CONCAT(CONCAT(p.productName, ' x', i.quantity) SEPARATOR '<br>') AS 'View'
    // FROM craftorder o 
    // JOIN craftorder_items i ON o.orderID = i.orderID 
    // JOIN product p ON i.productID = p.productID
    // GROUP BY o.orderID";
    
         $query = "SELECT * FROM craftorder o, product p, craftorder_items i where i.productId=p.productID and p.productID=i.productID and p.entID='$id'";
        // $query = "SELECT * FROM craftorder o, entrepreneur e where o.entID=e.entID and e.entID='$id'";

        return $this->getData($query);
    }
    // public function viewOrderPayments($id)
    // {
    //     $query = "Select * from craftorder o, craftorder_payment c, product p where o.orderPaymentID = c.craftOrderId and o.productID= p.productID and p.entID='$id'";

    //     return $this->getData($query);
    // }
     public function viewOrderPayments($id)
    {
        // $query = "Select * from craftorder o, craftorder_payment c, product p where o.orderPaymentID = c.orderPaymentID and o.productID= p.productID and p.entID='$id'";
    //    $query= "SELECT craftorder.orderID, 
    //    craftorder_items.itemId,
    //    craftorder_payment.orderPaymentId, 
    //    product.productID 
    //    FROM craftorder
    //    INNER JOIN craftorder_items ON craftorder.orderID = craftorder_items.orderId
    //    INNER JOIN craftorder_payment ON craftorder_items.itemId = craftorder_payment.itemId
    //    INNER JOIN product ON craftorder_payment.orderPaymentId = product.orderPaymentId;";
    $query="Select * from craftorder_payment";

        return $this->getData($query);
    }
    public function countOrders($id)
    {
        $query1 = "SELECT COUNT(o.orderID) as count FROM craftorder o, product p, craftorder_items s WHERE DATE(o.orderDateTime) = CURDATE() and s.productID= p.productID and o.orderID=s.orderId and p.entID='$id'";
        return $this->getData($query1);
    }
    public function cancelledOrders($id)
    {
        $query1 = "SELECT COUNT(o.orderID) as cancelled FROM craftorder o, product p, craftorder_items s WHERE DATE(orderDateTime) = CURDATE() and status='Cancelled' and s.productID= p.productID and o.orderID=s.orderId and p.entID='$id'";
        return $this->getData($query1);
    }
    public function countProductOrders()
    {
        // $query1 = "SELECT pc.categoryName as product_category, COUNT(*) as num_orders FROM craftorder co INNER JOIN product p ON co.orderID = p.productID INNER JOIN product_category pc ON p.productID = pc.product_categoryId GROUP BY pc.categoryName;";
//         $query1 ="SELECT pc.categoryName, COUNT(co.orderID) AS num_orders
// FROM product_category pc
// JOIN product p ON pc.product_categoryId = p.categoryId
// JOIN craftorder co ON p.productID = co.productID
// GROUP BY pc.categoryName;";
$query1 ="select product_category.categoryName as categoryName, COUNT(*) as no_of_orders from product_category inner join product on product_category.product_categoryId=product.categoryId inner JOIN craftorder_items ON craftorder_items.productId=product.productID INNER JOIN craftorder ON craftorder.orderID=craftorder_items.orderId INNER join entrepreneur_product on entrepreneur_product.productID=product.productID where entrepreneur_product.entrepreneurID='$id' GROUP BY product_category.categoryName;";
        return $this->getData($query1);
    }
    public function revenue()
    {
        $query1 = "SELECT YEAR(paymentDateTime) AS year, MONTHNAME(paymentDateTime) AS month, SUM(amount) AS revenue FROM craftorder_payment GROUP BY YEAR(paymentDateTime), MONTH(paymentDateTime);";
        return $this->getData($query1);
    }
    // public function todayRevenue($id)
    // {
    //     $query1 = "SELECT SUM(amount) as amount FROM craftorder o, craftorder_payment c, product p where o.orderID = c.craftOrderId and o.productID= p.productID and p.entID='$id' and DATE(c.paymentDateTime) = CURDATE() and c.paymentStatus = 'Completed'";
    //     return $this->getData($query1);
    // }
    public function todayRevenue($id)
    {
        $query1 = "SELECT SUM(amount) as amount FROM craftorder o, craftorder_payment c, product p where o.orderID = c.orderId and p.entID='$id' and DATE(c.paymentDateTime) = CURDATE() and c.paymentStatus = 'Completed'";
        return $this->getData($query1);
    }
    public function cleanString($str)
    {
        return str_replace(' ', '_', $str);
    }
    public function getCategories()
    {
        $query1 = "SELECT DISTINCT p.categoryId, c.categoryName FROM product p, product_category c where c.product_categoryId=p.categoryId;";
        return $this->getData($query1);
    }
    public function getProducts()
    {
        // $totalRecord = strtolower(trim(str_replace("/", "", $_POST['totalRecord'])));
        $sql = "SELECT * FROM product p, product_category c where c.product_categoryId=p.categoryId and p.quantity != 0";
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $sql .= " AND categoryId IN ('" . implode("','", $_POST['category']) . "')";
        }
        $sql .= " ORDER BY p.categoryId DESC";
        // $query ="Select * from product_img i, product p where i.productID=p.productID and i.productID='$getid'";

        $products = $this->getData($sql);
        // $rowcount = $this->getNumRows($sql);
        // $productHTML = '';
        // if (isset($products) && count($products)) {
        //     foreach ($products as $key => $product) {
        //         $productHTML .= '<div class="box">';
        //         // $productHTML .= '<img src="../images/'. $product['image'].'" alt="'.$product['productName'].'" />';
        //         $productHTML .= '<div class="content-container">';
        //         $productHTML .= '<h3 style="display: inline;">' . $product['productName'] . '</h3>';
        //         $productHTML .= '</div>';
        //         $productHTML .= '<div class="price">$' . $product['price'] . '</div>';
        //         $productHTML .= '<div style="display: flex; justify-content: center;">';
        //         $productHTML .= '<a href="tourpackage.php?pid=' .$product['categoryId'] .'" class="btn">More Information</a>';
        //         $productHTML .= '</div>';
        //         $productHTML .= '</div>';
        //     }
        // }
        return $products;
        //return $productHTML;
    }
    private function getNumRows($sqlQuery)
    {
        $result = mysqli_query($this->conn, $sqlQuery);
        if (!$result) {
            die('Error in query: ' . mysqli_error());
        }
        $numRows = mysqli_num_rows($result);
        return $numRows;
    }
    public function getTotalProducts()
    {
        $sql = "SELECT distinct p.categoryId FROM product p, product_category c where c.product_categoryId=p.categoryId and p.quantity != 0";
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $category = $_POST['category'];
            $sql .= " AND categoryId IN ('" . implode("','", $category) . "')";
        }
        // $productPerPage = 9;
        $rowCount = $this->getNumRows($sql);
        // $totalData = ceil($rowCount / $productPerPage);
        return $rowCount;
    }

    public function viewAllProImgs($getid)
    {
        $query = "SELECT * FROM product_img i, product p WHERE i.productID=p.productID AND i.productID='$getid'";
        $result = mysqli_query($this->conn, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }
}