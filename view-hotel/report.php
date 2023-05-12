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
                                    <input class="input-field" type="date" id="from" placeholder="from" name="from">
                                </div>
                            </td>
                            <td>
                                <div class="input-container" style="margin-left: 1rem;">
                                    <input class="input-field" type="date" id="to" placeholder="to" name="to">
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



        <!-- add cash payement -->
        <div id="id01" class="modal">

            <form class="modal-content animate" method="post" action="../api/addpkg.php" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Add Payments</b></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Reservation ID</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Guest Name</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName" /></td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status">
                                    <option value="" selected>---Choose availability---</option>
                                    <option value="Available">Pending</option>
                                    <option value="Unavailable">Completed</option>
                                    <option value="Unavailable">Cancelled</option>
                                </select></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Price</div>
                            </td>
                            <td> <input type="number" min="10" class="subfield" name="price" /></td>
                        </tr>



                        <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->


                    </table>

                </div>

                <div class="container" style="background-color:#f1f1f1; padding:10px;">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="btns" value="Save" name="save" style="margin-left:75px;">Save</button>
                </div>
            </form>
        </div>



    </section>

</body>

</html>