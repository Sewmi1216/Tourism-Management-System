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
                
            </div>

        </div>
        <div class="bg" style="overflow-x:auto;">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Payment ID</th>
                    <th class="tblh">Date</th>
                    <th class="tblh">Type</th>
                    <th class="tblh">Price</th>
                    <th class="tblh">Status</th>
                    <th class="tblh">Tour Booking ID</th>
                    <th class="tblh">Order ID</th>
                    <th class="tblh">Reservation ID</th>
                </tr><?php 
require_once("../controller/paymentController.php");
$payment = new paymentController();
$results= $payment->viewAllPayments();
foreach ($results as $result) {
        ?>
             
 
           <tr class="subtext tblrw">
                    <th class="tblh"><?php echo $result["paymentID"] ?></th>
                    <th class="tblh"><?php echo $result["date"] ?></th>
                    <th class="tblh"><?php echo $result["type"] ?></th>
                    <th class="tblh"><?php echo $result["amount"] ?></th>
                    <th class="tblh"><?php echo $result["status"] ?></th>
                    <th class="tblh"><?php echo $result["bookingID"] ?></th>
                    <th class="tblh"><?php echo $result["orderID"] ?></th>
                    <th class="tblh"><?php echo $result["reservationID"] ?></th>
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




