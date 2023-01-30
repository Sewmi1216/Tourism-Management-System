<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:HotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="page-title" style="margin:2vw 3vw;">Dashboard Overview</div>

        <div style="margin-top:20px;margin-left:10px;" class="dashheading">
            <span class="b">
                All Reservations
                <div style="margin-top:60px;font-size:40px;">20</div>
            </span>
            <span class="b">
                Cancelled Reservations
                <div style="margin-top:60px;font-size:40px;">2</div>
            </span>
            <span class="b">
                Reserved Rooms
                <div style="margin-top:60px;font-size:40px;">4</div>
            </span>
            <span class="b">
                Today's Revenue
                <div style="margin-top:60px;font-size:40px;">$250</div>
            </span>
        </div>

        <div style="margin-top:20px;margin-left:10px;" class="chart">
            <span class="c">
                Room Booking Chart
                <br>
                <img src="../images/hotel-pie.png" height="300px" width="400px" class="chartimg" />
            </span>
            <span class="c">
                Sales Revenue
                <br>
                <img src="../images/hotel-bar.png" alt="" height="300px" width="450px" class="chartimg" />
            </span>
        </div>




    </section>

</body>

</html>