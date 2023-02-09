<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:hotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/Type.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <script type="text/javascript">
    $(document).ready(function() {
        $("#example").on('click', '.spnSelected', function() {
            var self = $(this).closest("tr");
            var col1_value = self.find("#D1").text();
            $("#d1").val(col1_value);
            var col2_value = self.find("#R1").text();
            $("#r1").val(col2_value);
            // console.log('hello');


        });
    });
    </script>
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Reserve Rooms</div>
            </div>

        </div>

        <div class="bg">

            <div class="side">
                <div class="page-title"> Reservations</div>
                <table id="example">
                    <thead>
                        <tr class="subtext tblrw">
                            <th class="tblh">Room No</th>
                            <th class="tblh">Package Name</th>
                            <th class="tblh">Room Type</th>
                            <th class="tblh">From</th>
                            <th class="tblh">To</th>
                            <th class="tblh">select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
require_once "../controller/roomController.php";
$room = new roomController();
$results = $room->viewAllRooms();
foreach ($results as $result) {
    ?>
                        <tr class="subtext tblrw">
                            <td class="tbld" id="R1"> <?php echo $result["roomNo"] ?></td>
                            <td class="tbld">Family</td>
                            <td class="tbld">Suit</td>
                            <td class="tbld">2023/02/14</td>
                            <td class="tbld">2023/02/16</td>
                            <td class="tbld"><span class="spnSelected">Select</span></td>
                        </tr>

                        <?php }
?>

                    </tbody>
                </table>
            </div>
            <div class="side">
                <div class="page-title"> Rooms</div>
                <table id="example">
                    <thead>
                        <tr class="subtext tblrw">
                            <th class="tblh">Room No</th>
                            <th class="tblh">Package Name</th>
                            <th class="tblh">Room Type</th>
                            <th class="tblh">From</th>
                            <th class="tblh">To</th>
                            <th class="tblh">select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
require_once "../controller/roomController.php";
$room = new roomController();
$results = $room->viewAllRooms();
foreach ($results as $result) {
    ?>
                        <tr class="subtext tblrw">
                            <td class="tbld" id="D1"> <?php echo $result["roomNo"] ?></td>
                            <td class="tbld">Family</td>
                            <td class="tbld">Suit</td>
                            <td class="tbld">2023/02/14</td>
                            <td class="tbld">2023/02/16</td>
                            <td class="tbld"><span class="spnSelected">Select</span></td>
                        </tr>

                        <?php }
?>

                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>

        <div class="bg">
            <table>
                <tr>
                    <td>
                        <div class="content">Room ID</div>
                        <input type="text" class="subfield" name="mName" id="r1" required />
                    </td>
                    <td>
                        <div class="content">Reservation ID</div>
                        <input type="text" class="subfield" name="mPhone" id="d1" required />
                    </td>
                </tr>
            </table>
            <button type="submit" class="btns" style="margin-top:50px; margin-left:600px;">Reserve</button>
        </div>

    </section>


</body>

</html>