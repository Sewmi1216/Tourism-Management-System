<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
    header("location:../view-hotel/hotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">Dashboard Overview</div>

        <div style="margin-top:20px;margin-left:10px;" class="heading">
            <span class="b">
               New Users 
               <div style="margin-top:60px;font-size:20px;">50</div>
            </span>
            <span class="b">
                Total Orders
                <div style="margin-top:60px;font-size:20px;">100</div>
            </span>
            <span class="b">
               Products Sell
               <div style="margin-top:60px;font-size:20px;">500</div>
            </span>
            <span class="b">
                Today's Revenue
                <div style="margin-top:60px;font-size:20px;">$250</div>
            </span>
        </div>

        <div style="margin-top:20px;margin-left:10px;" class="chart">
            <span class="c">
                Craft Ordering Chart
                <br>
                <img src="../images/ent-pie.png" height="300px" width="450px" class="chartimg" />
            </span>
            <span class="c">
                Sales Revenue
                <br>
                <img src="../images/ent-bar.png" alt="" height="300px" width="400px" class="chartimg" />
            </span>
        </div>













    </section>

</body>

</html>