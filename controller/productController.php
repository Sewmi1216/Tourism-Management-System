<?php

include '../model/Product.php';

class productController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addproduct($pName, $avaquantity, $price,$productID, $id)
    {
        $product = new product();

        $result = $product->insertproduct($pName,$avaquantity, $price,$productID, $id);

    }
    public function addproductImg($productid, $file)
    {
        $productImg = new product();

        $result = $productImg->addproductImg($productid, $file);

        return $result;

    }
    public function viewAllImgs($getid)
    {
        $product = new product();
        $result = $product->viewAllImgs($getid);
        return $result;
    }

      public function viewAllProImgs($getid)
    {
        $product = new product();
        return $product->viewAllProImgs($getid);
    }
    public function deleteImg($id, $productid)
    {
        $dl = new product();
        $dl->deleteImg($id);

        // if (!$dl) {
        //     echo 'There was a error';
        //     // echo "<script>console.log(res)</script>";
        // } else {
        //     echo "<script>
        // window.location.href = '../view-hotel/addPhotos.php?id=$typeid';
        // </script>";

        // }

    }
    public function viewCategories($id)
    {
        $product = new product();

        $results = $product->viewCategories($id);

        // include "../view/product.php";
        return $results;

    }
    public function viewAll($id)
    {
        $product = new product();

        $results = $product->viewAll($id);

        // include "../view/product.php";
        return $results;

    }

    public function deleteproduct($id)
    {
        $result = new product();
        $result->deleteproduct($id);

        if (!$result) {
            echo 'There was a error';
        } else {
            echo "<script>alert('This product is deleted');
        window.location.href = '../view-entrepreneur/product.php';
        </script>";

        }

    }

    public function updateproduct($id,$pName,$categoryID,$avaquantity,$price){
        $result = new product();
        $result->updateproduct($id,$pName,$categoryID,$avaquantity,$price);

        if (!$result) {
            echo 'There was a error';

        } else {

            echo "<script>
        window.location.href = '../view-entrepreneur/product.php';
        </script>";

        }

    }

    public function viewproduct($pId)
    {
        $product = new product();

        $results = $product->viewproduct($pId);

        return $results;

    }
    public function viewAllOrders($id)
    {
        $order = new product();

        $result = $order->viewAllOrders($id);

        // include "../view/order.php";
        return $result;
    }
    public function viewOrderPayments($id)
    {
        $order = new product();
        $result = $order->viewOrderPayments($id);
        return $result;

    }
    public function countOrders($id)
    {
        $order = new product();
        $result = $order-> countOrders($id);
        return $result;
    }
    
    public function countProductOrders($id)
    {
        $order  = new product ();
        $res = $order->countProductOrders($id);
        return $res;
    }
    public function revenue()
    {
        $order = new product();
        $res = $order->revenue();
        return $res;
    }
    public function cancelledOrders($id)
    {
        $order = new product();
        $result = $order->cancelledOrders($id);
        return $result;
    }
    public function todayRevenue($id)
    {
        $order = new product();
        $result = $order->todayRevenue($id);
        return $result;
    }

    public function getCategories()
    {
        $order = new product();
        $result = $order->getCategories();
        return $result;
    }
    public function cleanString($str)
    {
        $order = new product();
        $result = $order->cleanString($str);
        return $result;
    }
    public function getProducts()
    {
        $pro = new product();
        return $pro->getProducts();
    }
    public function getTotalProducts()
    {
        $pro = new product();
        return $pro->getTotalProducts();
    }
   
}
