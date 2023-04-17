<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/pkg.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <!-- <div class="text">Hotel Packages</div> -->
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Tour Bookings </div>

        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Date</th>
                    <th class="tblh">Reservation ID</th>
                    <th class="tblh">Guest ID</th>
                    <th class="tblh">Guest Name</th>
                    <th class="tblh">Total amount</th>
                    <th class="tblh">Check-in</th>
               
                    <th class="tblh">Payment status</th>
                </tr>

                <?php
require_once "../controller/tourbookingcontroller.php";
$res = new tourbookingcontroller();
$results = $res->viewtourreservations();

foreach ($results as $result) {
    ?> <tbody>
                    <tr class="subtext tblrw">
                        <td class="tbld"><?php echo $result["bookingDateTime"] ?></td>
                        <td class="tbld"><?php echo $result["bookingID"] ?></td>
                        <td class="tbld"><?php echo $result["touristID"] ?></td>
                        <td class="tbld"><?php echo $result["guestName"] ?></td>
                        <td class="tbld"><?php echo '$' . $result["noOfGuests"] ?></td>
                        <td class="tbld"><?php echo $result["passportExpDate"] ?></td>
                        
                        <!-- <td class="tbld">
                            <?php if ($result["typestatus"] == "Completed") {?>
                            <button class="status1"><?php echo $result["paymentStatus"]; ?></button>
                            <?php } else {?>
                            <button class="status2"><?php echo $result["paymentStatus"]; ?></button>
                            <?php }?>
                        </td> -->


                        <?php }

?>
                    </tr>
            </table>
        </div>
        </div>
        </div>





    </section>

</body>

</html>