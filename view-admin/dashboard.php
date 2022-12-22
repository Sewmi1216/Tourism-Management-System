<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/dashboard.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&display=swap" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&family=Montserrat:wght@500&display=swap');
</style>

</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">DASHBOARD OVERVIEW</div>

        <div style="margin-top:20px;margin-left:20px; margin-right:20px;" class="dashheading">
            <span class="b">
                User Requests
                <div style="margin-top:60px;font-size:40px;">20</div>
            </span>
            <span class="b">
                Tour Bookings
                <div style="margin-top:60px;font-size:40px;">10</div>
            </span>
            <span class="b">
                Tour guides
                <div style="margin-top:60px;font-size:40px;">35</div>
            </span>
            <span class="b">
                Today's Revenue
                <div style="margin-top:60px;font-size:40px;">$18,130</div>
            </span>
        </div>

        <div style="margin-top:20px;margin-left:40px;" class="chart">
            <span class="c">
                <br>
                Room Booking Chart
                <br>
                <img src="../images/dashboard/piechart.png" alt="" style="width: 300px; height: auto">
            </span>
            <span class="c">
                <br>
                Sales Revenue
                <br>
                <img src="../images/dashboard/piechart.png" alt="" style="width: 300px; height: auto">
            </span>
        </div>


    </section>





</body>

</html>