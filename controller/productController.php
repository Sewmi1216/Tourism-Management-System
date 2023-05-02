<?php

include '../model/Product.php';

class productController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    
public function addproduct($pName,$pCategory,$avaquantity,$price,$id)
{
	$product = new product();

	$result = $product->insertproduct($pName,$pCategory,$avaquantity,$price,$id);

	
}
public function addproductImg($productid,$file)
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

        $results= $product->viewAll($id);

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
    
   

    public function updateproduct($id,$pName,$pCategory,$avaquantity,$price)
    {
        $result = new product();
        $result-> updateproduct ($id,$pName,$pCategory,$avaquantity,$price);

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

        $results= $product->viewproduct($pId);

        return $results;
    
      
    }
    public function countOrders()
    {
        $productuser = new product();
        $res = $productuser->countOrders();
        return $res;
    }
    public function countProdctOrders()
    {
        $productuser = new product();
        $res = $productuser->countProductOrders();
        return $res;
    }
    public function revenue()
    {
        $productuser = new product();
        $res = $productuser->revenue();
        return $res;
    }
   

    public function canceledOrders()
    {
        $productuser2 = new product();
        $res2 = $productuser2->canceledOrders();
        return $res2;
    }
     public function todayRevenue()
    {
        $productuser3= new product();
        $res3 = $productuser3->todayRevenue();
        return $res3;
    }
    
    public function soldProducts()
    {
        $productuser3= new product();
        $res3 = $productuser3->soldProducts();
        return $res3;
    }
}
?>




