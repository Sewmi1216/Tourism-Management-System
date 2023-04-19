<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

        <button type="submit" id="create_pdf" class="btns"
            style="margin-left:80rem;margin-top:1rem;background-color:red;">Download pdf</button>

        <div id="container">
            <div class="page-title" style="margin-left:3vw;">Dashboard Overview</div>
            <div style="margin-top:20px;margin-left:10px;" class="dashheading">

                <span class="b">
                    Today's Reservations
                    <div style="margin-top:60px;font-size:40px;"><?php
require_once "../controller/hotelController.php";
$res1 = new hotelController();
$results = $res1->countReservations();
foreach($results as $result){
echo $result['num_reservations'];}
?>
                    </div>
                </span>
                <span class="b">
                    Cancelled Reservations
                    <div style="margin-top:60px;font-size:40px;"><?php
$res2 = new hotelController();
$results2 = $res2->canceledReservations();
foreach ($results2 as $r) {
    echo $r['num_reservations'];}?>
                    </div>
                </span>
                <span class="b">
                    Today's Pending Payments
                    <div style="margin-top:60px;font-size:40px;">
                        <?php  $res2 = new hotelController();
$results2 = $res2->pendingPayments();
foreach ($results2 as $r) {
    echo $r['pending_payments'];}
?>
                    </div>
                </span>
                <span class="b">
                    Today's Revenue
                    <div style="margin-top:60px;font-size:40px;">
                        <?php
            $res2 = new hotelController();
$results2 = $res2->todayRevenue();
foreach ($results2 as $r) {
    echo '$'. $r['today_revenue'];}
 ?>
                    </div>

                </span>
            </div>
            <div class="html2pdf__page-break"></div>
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

        </div>


    </section>


    <script type="text/javascript">
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