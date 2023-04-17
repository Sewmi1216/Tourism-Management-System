<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
    header("location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title">Craft Orders </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for products" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
                
            </div>

        </div>
        <div class="bg" style="overflow-x:auto;">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Order ID</th>
                        <th class="tblh">Order Date</th>
                        <th class="tblh">Total Amount</th>
                        <th class="tblh">Status</th>
                        <th class="tblh">Tourist ID</th>
                        <th class="tblh">Cart ID</th>
                        <th class="tblh">Product ID</th>
                        <th class="tblh">View</th>
                        
                     
                    </tr><?php 
require_once("../controller/orderController.php");
$order = new orderController();
$results= $order->viewAllOrders($id);
foreach ($results as $result) {
        ?>
                   
                   
    <tr class="subtext tblrw">
         
    <th class="tbld"><?php echo $result["orderID"] ?></td>
    <th class="tbld"><?php echo $result["orderDateTime"] ?></td>
    <th class="tbld"><?php echo $result["totalAmount"] ?></td>
    <td class="tbld">
                        <?php if ($result["status"] == "Completed") {?>
                        <button class="status2"><?php echo $result["status"]; ?></button>
                        <?php } else if($result["status"] == "Pending") {?>
                        <button class="status1"><?php echo $result["status"]; ?></button>
                        <?php } else{?>
                        <button class="status3"><?php echo $result["status"]; ?></button>
                        <?php }?>
                    </td>
    <th class="tbld"><?php echo $result["touristID"] ?></td>
    <th class="tbld"><?php echo $result["cartID"] ?></td>
    <th class="tbld"><?php echo $result["productID"] ?></td>
    <td class="tbld"><a onclick="document.getElementById('id02').style.display='block';loadData(this.getAttribute('data-ID'));" data-ID="<?php echo $result['productID']; ?>"><i class="fa-solid fa-bars"></i></a></td>
    
    </tr>
    
    <?php }
    ?>
    </table>
        </div>
        </div>
        </div>
       
        <div id="id02" class="modal">

            <form class="modal-content animate" method="post" action="../api/productapi.php" enctype="multipart/form-data">
                <div class="imgcontainer" style="background-color:#004581;">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="product" style="color:white; margin-left:15px;"><b>View Order Details</b></label>
                </div>
                <table>
                <tr class="row">
                    <input type="hidden" class="subfield" name="id" id="productid" value="" ?>
                </tr>
            <tr class="row">
                <td>
                    <div class="content">Product Name :</div>
                    
                </td>
                <td> <input type="text" class="subfield" id ="productname" name="pName" value=""  /></td>
                
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Category:</div>
                </td>
                <td> <input type="text" class="subfield" id="pcategory"  name="pCategory" value=""/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Quantity : </div>
                </td>
                <td> <input type="number" id="qunatity" min="10" class="subfield" name="avaquantity" value=""/></td>
            </tr>

            
            <tr class="row">
                <td>
                    <div class="content">Price :</div>
                </td>
                <td><input type="number" id="price" min="10" class="subfield" name="price" value=""></td>
                
            </tr>
            
            
            
          
            
         
        </table>
       
        </form>
    </div>

         
</body>

</html>