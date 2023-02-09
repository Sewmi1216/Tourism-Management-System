<?php

include '../controller/touristController.php';

$productID = $_GET['product'];
$quantity = $_POST['quantity'];
$touristcon = new touristController();
if(isset($_POST['cart'])){
    $touristcon->addcart($quantity, $productID, $_SESSION['touristID']);
    print_r($_POST);
}

?>


<table style="margin:-30px;">
                <tr>
                    <td ><?php echo "<img src='../images/" . $row['productImg'] . "' style=
                    'width:500px;height: 300px;margin-left:45px;padding-right:0px;'>"; ?></td>
                    <td>
                        
                        <ul style="margin-left:23px;">
                            <li>Product Name:
                            </li>
                            <li>Category: 
                            </li>
                            <li>Quantity:
                            </li>
                            <li>Price:
                            </li>
                            
                        </ul>
                    </td>
                </tr>
            </table>