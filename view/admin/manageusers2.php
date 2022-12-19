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
 
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">DASHBOARD OVERVIEW</div>

        <div style="margin-top:20px;margin-left:10px;" class="dashheading">
            <span class="b">
                User Requests

                <h1> 20 </h1>
            </span>
            <span class="b">
                Tour Bookings
            </span>
            <span class="b">
                Tour guides
            </span>
            <span class="b">
                Today's Revenue
            </span>
        </div>

        <div style="margin-top:20px;margin-left:10px;" class="chart">
            <span class="c">
                Room Booking Chart
            </span>
            <span class="c">
                Sales Revenue
            </span>
        </div>


    </section>





</body>

</html>