<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
   header("location:../view-hotel/login.php");

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
                <div class="page-title">Payments </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for products" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
                <button type="submit" id="create_ppdf" name="create_ppdf" class="btns"
                    style="margin-left:2rem;background-color:red;">Download pdf</button>
                
            </div>

        </div>
        <div class="bg" style="overflow-x:auto;">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Payment ID</th>
                    <th class="tblh">Date</th>
                    <th class="tblh">Amount</th>
                    <th class="tblh">Order ID</th>
                    
                    <th class="tblh">Status</th>
                    
                   
                    
                </tr><?php 
require_once("../controller/productController.php");
$payment = new productController();
$results= $payment->viewOrderPayments($id);
foreach ($results as $result) {
        ?>
             
 
           <tr class="subtext tblrw">
                    <th class="tblh"><?php echo $result["orderPaymentId"] ?></th>
                    <th class="tblh"><?php echo $result["paymentDateTime"] ?></th>
                    <th class="tblh"><?php echo $result["amount"] ?></th>
                    
                    <th class="tblh"><?php echo $result["orderID"] ?></th>
                    <td class="tbld">
                        <?php if ($result["status"] == "Completed") {?>
                        <button class="status3"><?php echo $result["paymentStatus"]; ?></button>
                        <?php } else if($result["status"] == "Pending") {?>
                        <button class="status1"><?php echo $result["status"]; ?></button>
                        <?php } else{?>
                        <button class="status2"><?php echo $result["status"]; ?></button>
                        <?php }?>
                    </td>
                    
                    
                    
                </tr>     
                
                <?php }

?>
            </table>
        </div>
        </div>
        </div>

    </section>
    
</body>

</html>




