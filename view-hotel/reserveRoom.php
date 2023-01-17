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
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/pkg.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
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
                <div class="page-title"> Reserve Rooms</div>

            </div>

        </div>

        <div class="bg">
            <div class="side">
                <div class="page-title"> Rooms</div>
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Room No</th>
                        <th class="tblh">Package Name</th>
                        <th class="tblh">Room Type</th>
                        <th class="tblh">From</th>
                        <th class="tblh">To</th>
                        <th class="tblh">Status</th>
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld">R101</td>
                        <td class="tbld">Family</td>
                        <td class="tbld">Suit</td>
                        <td class="tbld">2023/02/14</td>
                        <td class="tbld">2023/02/16</td>
                        <td class="tbld">Reserved</td>
                    </tr>
                     <tr class="subtext tblrw">
                        <td class="tbld">R101</td>
                        <td class="tbld">Family</td>
                        <td class="tbld">Suit</td>
                        <td class="tbld">2023/02/14</td>
                        <td class="tbld">2023/02/16</td>
                        <td class="tbld">Reserved</td>
                    </tr>
                     <tr class="subtext tblrw">
                        <td class="tbld">R101</td>
                        <td class="tbld">Family</td>
                        <td class="tbld">Suit</td>
                        <td class="tbld">2023/02/14</td>
                        <td class="tbld">2023/02/16</td>
                        <td class="tbld">Reserved</td>
                    </tr>
                     <tr class="subtext tblrw">
                        <td class="tbld">R101</td>
                        <td class="tbld">Family</td>
                        <td class="tbld">Suit</td>
                        <td class="tbld">2023/02/14</td>
                        <td class="tbld">2023/02/16</td>
                        <td class="tbld">Reserved</td>
                    </tr>
                </table>
            </div>
            <div class="side">
                <div class="page-title"> Reservations</div>
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Reservation ID</th>
                        <th class="tblh">Package Name</th>
                        <th class="tblh">Check-in</th>
                        <th class="tblh">Check-out</th>
                        <th class="tblh">Status</th>
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld">R101</td>
                        <td class="tbld">Family</td>
                        <td class="tbld">2022/02/14</td>
                        <td class="tbld">2022/02/16</td>
                        <td class="tbld">Pending</td>
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld">R101</td>
                        <td class="tbld">Family</td>
                        <td class="tbld">2022/02/14</td>
                        <td class="tbld">2022/02/16</td>
                        <td class="tbld">Pending</td>
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld">R101</td>
                        <td class="tbld">Family</td>
                        <td class="tbld">2022/02/14</td>
                        <td class="tbld">2022/02/16</td>
                        <td class="tbld">Pending</td>
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld">R101</td>
                        <td class="tbld">Family</td>
                        <td class="tbld">2022/02/14</td>
                        <td class="tbld">2022/02/16</td>
                        <td class="tbld">Pending</td>
                    </tr>
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
                        <input type="text" class="subfield" name="mName" required />
                    </td>
                    <td>
                        <div class="content">Reservation ID</div>
                        <input type="text" class="subfield" name="mPhone" required />
                    </td>
                </tr>
            </table>
            <button type="submit" class="btns" style="margin-top:50px; margin-left:600px;">Reserve</button>
        </div>


        <!-- chat box -->
        <?php include_once "chat.php"?>

    </section>
    
</body>

</html>