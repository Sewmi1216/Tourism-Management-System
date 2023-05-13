<?php
session_start();
$user = "";

if (isset($_SESSION["email"]) && isset($_SESSION["adminID"])) {
    $id = $_SESSION["adminID"];
} else {
    header("location:../view-hotel/login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/admindashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div style="margin-top:20px;">
         <div class="page-title" style="margin-left:3vw;">Dashboard Overview</div>
            <a href="printadminDashboard.php" class="btns" target="_blank"
                style="margin-left:100rem;margin-top:0.5rem;background-color:red;">Download pdf</a>
        </div>
        <!-- <button type="submit" id="click" class="btns">Click</button> -->

        <div id="container">
           
            <div style="margin-top:20px;margin-left:10px;" class="dashheading">

                <span class="b">
                    Tour bookings
                    <div style="margin-top:40px;font-size:40px;"><?php
                        require_once "../controller/tourbookingController.php";
                        $res1 = new tourbookingController();
                        $results = $res1->countBooking();
                        foreach($results as $result){
                        echo $result['num_bookings'];}
?>
                    </div>
                </span>
                <span class="b">
                User Requests
                    <div style="margin-top:40px;font-size:40px;">
                                            <?php
                        require_once "../controller/adminController.php";
                        $res1 = new adminController();
                        $results = $res1->viewpendingusers();
                        foreach($results as $result){
                        echo $result['total_count'] ;}
                        ?>
                    </div>
                </span>
                <span class="b">
                   Tourist
                    <div style="margin-top:40px;font-size:40px;">
                    <?php
require_once "../controller/adminController.php";
$res1 = new adminController();
$results = $res1->viewtouristcount();
foreach($results as $result){
echo $result['tourist_count'];}
?>
                    </div>
                </span>
                <span class="b">
                Tour guides
                    <div style="margin-top:40px;font-size:40px;">
                        <?php
require_once "../controller/adminController.php";
$res1 = new adminController();
$results = $res1->viewtourguidecount();
foreach($results as $result){
echo $result['tourguide_count'];}
?>
                    </div>

                    
                </span>

                <span class="b">
                   Hotels
                    <div style="margin-top:40px;font-size:40px;">
                                        <?php
                    require_once "../controller/adminController.php";
                    $res1 = new adminController();
                    $results = $res1->viewhotelcount();
                    foreach($results as $result){
                    echo $result['hotel_count'];}
                    ?>
                    </div>
                </span>

                <span class="b">
                    entrepreneurs
                    <div style="margin-top:40px;font-size:40px;">
                                        <?php
                    require_once "../controller/adminController.php";
                    $res1 = new adminController();
                    $results = $res1->viewentrepreneurcount();
                    foreach($results as $result){
                    echo $result['entrepreneur_count'];}
                    ?>
                    </div>
                </span>
            </div>

<!-- 
            2nd row  -->

            <div id="container">
           
            <div style="margin-top:20px;margin-left:10px;" class="dashheading">

                
                <span class="b">
              Tour Packages
                    <div style="margin-top:40px;font-size:40px;"><?php
require_once "../controller/adminController.php";
$res1 = new adminController();
$results = $res1->viewpendingusers();
foreach($results as $result){
echo $result['total_count'] ;}
?>
                    </div>
                </span>
                <span class="b">
                    Today's Pending Payments
                    <div style="margin-top:40px;font-size:40px;">
                 20
                    </div>
                </span>
                <span class="b">
                Tour guides
                    <div style="margin-top:40px;font-size:40px;">
                        <?php
require_once "../controller/adminController.php";
$res1 = new adminController();
$results = $res1->viewtourguidecount();
foreach($results as $result){
echo $result['tourguide_count'];}
?>
                    </div>

                    
                </span>

                <span class="b">
               Available Tour guides
                    <div style="margin-top:40px;font-size:40px;">
                        <?php
require_once "../controller/adminController.php";
$res1 = new adminController();
$results = $res1->viewtourguidecount();
foreach($results as $result){
echo $result['tourguide_count'];}
?>
                    </div>

                    
                </span>
            </div>


            <div class="html2pdf__page-break"></div>
            <div style="margin-top:20px;margin-left:10px;" class="chart">
                <span class="c">

                    Room Booking Chart
                    <br>
                    <!-- pie chart -->
                        <?php
                        $pie = new adminController();
                        $results = $pie->countpackageReservations($id);
                        foreach ($results as $data) 
                        {
                            $type[] = $data['room_type'];
                            $reservations[] = $data['num_reservations'];

                        } ?>

                    <div class="piechart">
                        <canvas id="piechart"></canvas>
                    </div>
                </span>
                <span class="c">
                    Total Revenue
                    <br>
                    <!-- bar chart -->
                    <?php
$pie = new adminController();
$results = $pie->revenue($id);
foreach ($results as $data) {
    $month[] = $data['month'];
    $revenue[] = $data['revenue'];

}
?>
                    <div class="barchart">
                        <canvas id="barchart"></canvas>
                    </div>
                </span>
            </div>

        </div>


    </section>
    <!-- <script>
    document.getElementById("click").onclick = function() {
        window.print()
        setTimeout(function() {
            window.close()
        }, 750)
    };
    </script> -->

    <script>
    const ctx = document.getElementById("piechart");
    new Chart(ctx, {
        type: "pie",
        data: {
            labels: <?php echo json_encode($type) ?>,
            datasets: [{
                label: "No of Reservations",
                data: <?php echo json_encode($reservations) ?>,
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                    "rgb(34, 100, 50)",
                ],
                hoverOffset: 4,
            }, ],
        },
    });

    const cht = document.getElementById("barchart");

    new Chart(cht, {
        type: "bar",
        data: {
            labels: <?php echo json_encode($month) ?>,

            datasets: [{
                label: "Revenue",
                data: <?php echo json_encode($revenue) ?>,
                borderWidth: 1,
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
    </script>
    <script>
    document.getElementById('create_pdf').onclick = function() {
        var element = document.getElementById('container');
        var opt = {
            margin: 0.2,
            filename: 'dashboard.pdf',
            image: {
                type: 'jpeg',
                quality: 1
            },
            html2canvas: {
                scale: 1
            },
            jsPDF: {
                unit: 'mm',
                format: 'letter',
                orientation: 'portrait'
            }
        };
        html2pdf(element, opt);
    };
    </script>
</body>

</html>
