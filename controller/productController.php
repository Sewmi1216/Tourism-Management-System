<?php

include '../model/Product.php';

class productController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    
public function addproduct($pName, $pCategory,$avaquantity, $price,$fileImg)
{
	$product = new product();

	$result = $product->insertproduct($pName, $pCategory,$avaquantity, $price,$fileImg);

	if (!$result) {
		echo 'There was a error';
		// echo "<script>console.log(res)</script>";
	} else {
		echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view-entrepreneur/Product.php';
	</script>";
	}
}
public function viewAll()
    {
        $product = new product();

        $result = $product->viewAll();

        // include "../view/product.php";
        return $result;

    }
//     public function deleteproduct($pName, $pCategory,$avaquantity, $price,$fileImg)
// {
    
//     $result = new product();
//     $result = $product->deleteproduct($pName, $pCategory,$avaquantity, $price,$fileImg);

//     if (!$result) {
//         echo 'There was an error';
//     } else {
//         echo "<script>alert('The product was successfully deleted');
//         window.location.href = '../view-entrepreneur/product.php';
//         </script>";
//     }
// }

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



}




