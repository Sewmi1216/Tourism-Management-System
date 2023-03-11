<?php

include '../model/Product.php';

class productController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    
public function addproduct($eid,$pName, $pCategory,$avaquantity, $price,$fileImg)
{
	$product = new product();

	$result = $product->insertproduct($eid,$pName, $pCategory,$avaquantity, $price,$fileImg);

	if (!$result) {
		echo 'There was a error';
		// echo "<script>console.log(res)</script>";
	} else {
		echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view-entrepreneur/Product.php';
	</script>";
	}
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
    
   

    public function updateproduct($id,$pName, $pCategory,$avaquantity, $price,$fileImg)
    {
        $result = new product();
        $result-> updateproduct ($id,$pName, $pCategory,$avaquantity, $price,$fileImg);

        if (!$result) {
            echo 'There was a error';
          
        } else {

            echo "<script>
        window.location.href = '../view-entrepreneur/product.php';
        </script>";

        }

    }



}
?>




