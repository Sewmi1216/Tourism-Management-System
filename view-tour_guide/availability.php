<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["tourguideID"])) {
    $id = $_SESSION["tourguideID"];
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="../libs/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Update Tour Guide Availability </div>
            </div>
        </div>

        <div style="margin-top:20px;margin-left:10px;" class="chart">
            <form action="" method="post">
                <span class="c" style="background-color:white;">
                    <?php
require_once "../controller/tourguidecontroller.php";
$guide = new tourguideController();
$results = $guide->viewAvailability($id);
foreach ($results as $result) {
    ?>
                    <table style="margin:auto;margin-top:80px;">
                        <tr>
                            <td>
                                <div class="content">Unavailable From</div>

                            </td>
                            <td style="margin:auto;margin-top:80px;">
                                <input type="date" class="subfield" name="from" id="from"
                                    value="<?php echo $result['unavailable_from']?>" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="content">Unavailable To</div>

                            </td>
                            <td>
                                <input type="date" class="subfield" name="to" id="to"
                                    value="<?php echo $result['unavailable_to']?>" required />
                            </td>
                        </tr>
                    </table>
                    <input type="submit" class="btnRegister" style="width:20%;margin-top:80px;" value="Update"
                        name="update" />
                    <?php } ?>

                    <?php
 if (isset($_POST['update'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];

    $guide = new tourguideController();
    $guide->updateAvailability($from, $to, $id);

    }?>

                </span>
        </div>
        </form>
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