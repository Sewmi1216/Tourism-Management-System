<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:hotelLogin.php");
}
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
                <div class="page-title"> Guest Reservations[Payment done by tourist]</div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for guest reservations" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>

            </div>

        </div>

        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Date</th>
                    <th class="tblh">Reservation ID</th>
                    <th class="tblh">Guest ID</th>
                    <th class="tblh">Guest Name</th>
                    <th class="tblh">Total amount</th>
                    <th class="tblh">Check-in</th>
                    <th class="tblh">Check-out</th>
                    <th class="tblh">Payment status</th>
                </tr>

                <?php
require_once "../controller/hotelController.php";
$res = new hotelController();
$results = $res->viewGuestReservations($id);

foreach ($results as $result) {
    ?><tbody>
                    <tr class="subtext tblrw">
                        <td class="tbld"><?php echo $result["bookingDateTime"] ?></td>
                        <td class="tbld"><?php echo $result["reservationID"] ?></td>
                        <td class="tbld"><?php echo $result["touristID"] ?></td>
                        <td class="tbld"><?php echo $result["guestName"] ?></td>
                        <td class="tbld"><?php echo '$' . $result["total_amount"] ?></td>
                        <td class="tbld"><?php echo $result["checkInDate"] ?></td>
                        <td class="tbld"><?php echo $result["checkOutDate"] ?></td>
                        <td class="tbld">
                            <?php if ($result["typestatus"] == "Completed") {?>
                            <button class="status1"><?php echo $result["paymentStatus"]; ?></button>
                            <?php } else {?>
                            <button class="status2"><?php echo $result["paymentStatus"]; ?></button>
                            <?php }?>
                        </td>


                        <?php }

?>
                    </tr>
            </table>
        </div>
        </div>
        </div>

        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Guest Reservations[Payment done by admin]</div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for admin reservations" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>

            </div>

        </div>

        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Date</th>
                    <th class="tblh">Reservation ID</th>
                    <th class="tblh">Guest ID</th>
                    <th class="tblh">Guest Name</th>
                    <th class="tblh">Total amount</th>
                    <th class="tblh">Check-in</th>
                    <th class="tblh">Check-out</th>
                    <th class="tblh">Payment status</th>
                </tr>
                <?php
require_once "../controller/hotelController.php";
$admin= new hotelController();
$results2 = $admin->viewAdminReservations($id);

foreach ($results2 as $result) {
    ?><tbody>
                    <tr class="subtext tblrw">
                        <td class="tbld"><?php echo $result["bookingDateTime"] ?></td>
                        <td class="tbld"><?php echo $result["reservationID"] ?></td>
                        <td class="tbld"><?php echo $result["touristID"] ?></td>
                        <td class="tbld"><?php echo $result["guestName"] ?></td>
                        <td class="tbld"><?php echo '$' . $result["total_amount"] ?></td>
                        <td class="tbld"><?php echo $result["checkInDate"] ?></td>
                        <td class="tbld"><?php echo $result["checkOutDate"] ?></td>
                        <td class="tbld">
                            <?php if ($result["typestatus"] == "Completed") {?>
                            <button class="status1"><?php echo $result["paymentStatus"]; ?></button>
                            <?php } else {?>
                            <button class="status2"><?php echo $result["paymentStatus"]; ?></button>
                            <?php }?>
                        </td>


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