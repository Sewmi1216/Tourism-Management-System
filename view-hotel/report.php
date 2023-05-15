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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/tourist.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
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
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="page-title" style="margin-left:30px;margin-top: 20px;">Monthly Sales Report</div>
        <div id="cont" style="margin-top: 20px;">

            <form action="" method="post">
                <div class="searchSec" style="margin-left:520px;margin-top:20px;width:200px;">
                    <table>
                        <tr>
                            <th>
                                <div class="search">From</div>
                            </th>
                            <th>
                                <div class="search">To</div>
                            </th>
                        </tr>
                        <tr>
                            <input type="hidden" value="<?php echo $hid ?>" name="hotel">
                            <td>
                                <div class="input-container" style="margin-left: 1rem;">
                                    <input class="input-field" type="date" id="from" placeholder="from" name="from" required>
                                </div>
                            </td>
                            <td>
                                <div class="input-container" style="margin-left: 1rem;">
                                    <input class="input-field" type="date" id="to" placeholder="to" name="to" required>
                                </div>
                            </td>
                        </tr>

                    </table>

                    <button type="submit" class="btns" style="margin-left: 1rem;margin-top:20px;"
                        name="submit">Submit</button>
                </div>
            </form>


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
    $from = $_POST['from'];
    $to = $_POST['to'];

    include_once '../controller/reservationController.php';
    $report = new reservationController();
    $total=0;
    $rs=$report->searchForReport($from, $to, $id);
    if ($rs) {
        foreach ($rs as $result) { ?>
                    <tbody>
                        <tr class="subtext tblrw">
                            <td class="tbld"><?php echo $result["paymentID"] ?></td>
                            <td class="tbld"><?php echo $result["paymentDateTime"] ?></td>
                            <td class="tbld"><?php echo $result["reservationID"] ?></td>
                            <td class="tbld"><?php echo '$' . $result["amount"] ?></td>
                        </tr>

                        <?php  
                        $total +=  $result["amount"]; }
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
                            <td style="font-size:25px;font-weight: 200;">$<?php echo $total ; ?></td>
                        </tr>
                    </table>

                    <form action="printreport.php" method="POST" target="_blank">
                        <input type="hidden" name="txt_to"
                            value="<?php echo (isset($_POST['to'])) ? $_POST['to'] : ''; ?>">
                        <input type="hidden" name="txt_from"
                            value="<?php echo (isset($_POST['from'])) ? $_POST['from'] : ''; ?>">
                        <input type="hidden" name="hotelid" value="<?php echo (isset($id)) ? $id : '';?>">
                        <button type="submit" class="btns"
                            style="margin-left: 80rem;margin-top:20px;margin-bottom:20px;" name="submit">Print</button>
                    </form>

                </div>
            </div>
        </div>




    </section>
    <script>
    $("#to").change(function() {
        var startDate = document.getElementById("from").value;
        var endDate = document.getElementById("to").value;

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alert("End date should be greater than Start date");
            document.getElementById("to").value = "";
        }
    });
    </script>
</body>

</html>