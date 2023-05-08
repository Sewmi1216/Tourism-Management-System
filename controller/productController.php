<?php

include '../model/Product.php';

class productController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addproduct($pName, $pCategory, $avaquantity, $price, $id)
    {
        $product = new product();

        $result = $product->insertproduct($pName, $pCategory, $avaquantity, $price, $id);

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

    public function updateproduct($id, $pName, $pCategory, $avaquantity, $price)
    {
        $result = new product();
        $result->updateproduct($id, $pName, $pCategory, $avaquantity, $price);

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
        $result = $order->countOrders($id);
        return $result;
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
    
}

