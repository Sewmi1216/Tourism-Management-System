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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
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
        <button type="submit" id="create_pdf" class="btns"
            style="margin-left:80rem;margin-top:1rem;background-color:red;">Download pdf</button>
        <div class="text">Dashboard Overview</div>

        <div style="margin-top:20px;margin-left:10px;" class="dashheading">
            <span class="b">
               Today's Orders
               <div style="margin-top:60px;font-size:40px;">
               <?php
require_once "../controller/productController.php";
$res1 = new productController();
$results = $res1->countOrders($id);
foreach($results as $result){
echo $result['count'];}
?>
            </div>
            </span>
            <span class="b">
                Cancelled Orders
                <div style="margin-top:60px;font-size:40px;">
                <?php
$res2 = new productController();
$results2 = $res2->cancelledOrders($id);
foreach ($results2 as $r) {
    echo $r['cancelled'];}?>
            </div>
            </span>
            <span class="b">
                Today's Revenue
                <div style="margin-top:60px;font-size:40px;">
                <?php
            $res2 = new productController();
$results2 = $res2->todayRevenue($id);
foreach ($results2 as $r) {
    echo '$'. $r['amount'];}
 ?>
            </div>
            </span>
        </div>
        <div class="html2pdf__page-break"></div>
        <div style="margin-top:20px;margin-left:10px;" class="chart">
            <span class="c">
                Craft Ordering Chart
                <br>
                 <!-- pie chart -->
                <?php
$pie = new productController();
$results= $pie->countProductOrders($id);
foreach ($results as $data) {
    $category[]=$data['categoryName'];
    $orders[]=$data['orderCount'];

}
?>
                    <div class="piechart">
                        <canvas id="piechart"></canvas>
                    </div>   
            </span>
            <span class="c">
                Total Revenue
                <br>
                <!-- bar chart -->
                <?php
$pie = new productController();
$results= $pie->revenue();
foreach ($results as $data) {
    $month[]=$data['month'];
    $revenue[]=$data['revenue'];

}
?>
        <div class="barchart">
            <canvas id="barchart"></canvas>
        </div>  
            </span>
        </div>
</div>
</section>
<script>
    document.getElementById("click").onclick = function() {
        window.print()
        setTimeout(function() {
            window.close()
        }, 750)
    };
    </script>
<script>
    const ctx = document.getElementById("piechart");
    new Chart(ctx, {
        type: "pie",
        data: {
            labels: <?php echo json_encode($category) ?>,
            datasets: [{
                label: "No of Orders",
                data: <?php echo json_encode($orders) ?>,
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

     datasets: [
       {
         label: "Revenue",
         data: <?php echo json_encode($revenue) ?>,
         borderWidth: 1,
       },
     ],
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
    
    </script>













   

</body>

</html>