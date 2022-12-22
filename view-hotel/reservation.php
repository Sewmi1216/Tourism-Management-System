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
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <!-- <div class="text">Hotel Packages</div> -->
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Guest Reservations</div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for guest reservations" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>

            </div>

        </div>

        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Reservation ID</th>
                    <th class="tblh">Guest ID</th>
                    <th class="tblh">Date</th>
                    <th class="tblh">Price</th>
                    <th class="tblh">Check-in</th>
                    <th class="tblh">Check-out</th>
                    <th class="tblh">Payment</th>
                    <th class="tblh">Status</th>
                </tr>
                <tr>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                </tr>
                <tr>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                </tr>
                <tr>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                </tr>
                <tr>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                </tr>
            </table>
        </div>
        </div>
        </div>

        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Admin Reservations</div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for admin reservations" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>

            </div>

        </div>

        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Reservation ID</th>
                    <th class="tblh">Guest ID</th>
                    <th class="tblh">Date</th>
                    <th class="tblh">Price</th>
                    <th class="tblh">Check-in</th>
                    <th class="tblh">Check-out</th>
                    <th class="tblh">Payment</th>
                    <th class="tblh">Status</th>
                </tr>

                <tr>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                </tr>

                <tr>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                </tr>
                <tr>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                </tr>
                <tr>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                    <td class="tbld">R102</td>
                </tr>
            </table>
        </div>
        </div>
        </div>

    </section>
</body>

</html>