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

     function select(id) {
        console . log(id);
        var modal = document.getElementById("r1");
        modal.value = id;
        console.log(modal);
    }
 function selecter(id) {
        var modal = document.getElementById("d1");
        modal.value = id;
        console.log(modal);
    }


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
                <table id="example1">
                    <thead>
                        <tr class="subtext tblrw">
                            <th class="tblh">Reservation ID</th>
                            <th class="tblh">Room Type</th>
                            <th class="tblh">From</th>
                            <th class="tblh">To</th>
                            <th class="tblh">select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
require_once "../controller/hotelController.php";
$hotel = new hotelController();
$results = $hotel->viewPendingReservations($id);
foreach ($results as $result) {
    ?>
                        <tr class="subtext tblrw">
                            <td class="tbld"> <?php echo $result["reservationID"] ?></td>
                            <td class="tbld"> <?php echo $result["typeName"] ?></td>
                            <td class="tbld"> <?php echo $result["checkInDate"] ?></td>
                           <td class="tbld"> <?php echo $result["checkOutDate"] ?></td>
                            <td class="tbld"><span class="spnSelected" onclick="select(<?php echo $result['reservationID']; ?>)">Select</span></td></tr>

                        <?php }
?>

                    </tbody>
                </table>
            </div>
            <div class="side">
                <div class="page-title"> Rooms</div>
                <table id="example2">
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
$results2 = $room->viewAvailableRooms($id);
foreach ($results2 as $result) {
    ?>
                        <tr class="subtext tblrw">
                            <td class="tbld" id="D1"> <?php echo $result["roomNo"] ?></td>
                            <td class="tbld">Family</td>
                            <td class="tbld">Suit</td>
                            <td class="tbld">2023/02/14</td>
                            <td class="tbld">2023/02/16</td>
                            <td class="tbld"><span class="spnSelected" onclick="selecter(<?php echo $result['roomNo']; ?>)">Select</span></td>
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