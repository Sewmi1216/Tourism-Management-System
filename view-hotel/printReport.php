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
    <link rel="stylesheet" href="../css/tourist.css?v=<?php echo time(); ?>">

    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <style>
    HTML,
    body {
        max-width: 100%;
        overflow-x: hidden;
    }
    </style>
    <section class="">

        <div class="page-title" style="margin-left:30px;margin-top: 20px;font-size: 30px;">Monthly Sales Report</div>
        <div id="cont" style="margin-top: 0px;">


            <div class="searchSec">
                <p style="margin-left:480px;font-size: 20px;margin-bottom: 20px;font-weight: 200;line-height: 1.4;">
                    From: <?php if (isset($_POST['txt_from'])){
                            echo $_POST['txt_from'];
                        }?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    To: <?php if (isset($_POST['txt_to'])){
                            echo $_POST['txt_to'];
                        }?></p>
            </div>



            <div class="bg">
                <table id="tbl">
                    <tr class="subtext tblrw">
                        <th class="tblh">Payment ID</th>
                        <th class="tblh">Payment Date/Time</th>
                        <th class="tblh">Reservation ID</th>
                        <th class="tblh">Total amount</th>
                    </tr>

                    <?php
if (isset($_POST['submit'])) {
    $from = $_POST['txt_from'];
    $to = $_POST['txt_to'];
$id =$_POST['hotelid'];
    include_once '../controller/reservationController.php';
    $report = new reservationController();
    $total = 0;
    $rs = $report->searchForReport($from, $to, $id);
    if ($rs) {
        foreach ($rs as $result) {?>
                    <tbody>
                        <tr class="subtext tblrw">
                            <td class="tbld"><?php echo $result["paymentID"] ?></td>
                            <td class="tbld"><?php echo $result["paymentDateTime"] ?></td>
                            <td class="tbld"><?php echo $result["reservationID"] ?></td>
                            <td class="tbld"><?php echo '$' . $result["amount"] ?></td>
                        </tr>

                        <?php
$total += $result["amount"];}
    } else {?>
                        <tr class="subtext tblrw">
                            <td class="tbld" colspan="4" align="center">
                                <h2 style="font-size:15px;"> No results have found for this time period</h2>
                            </td>

                        </tr>
                    </tbody>
                    <?php
}}
?>

                </table>
                <div style="">
                    <p style="margin-left:720px;font-size: 25px;margin-bottom: 20px;font-weight: 200;line-height: 1.4;">
                        Total Amount</p>

                    <table style="margin-bottom: 20px;margin-left:415px;">
                        <tr style="border-top: 1px solid #ddd;">
                            <hr width="100%" style="margin-bottom:30px;">
                            <th style="width:50%;">Total:</th>
                            <td style="font-size:25px;font-weight: 200;">$<?php echo $total; ?></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </section>

    <script>
    window.onload = function() {
        window.print()
        setTimeout(function() {
            window.close()
        }, 750)
    }
    </script>
</body>

</html>