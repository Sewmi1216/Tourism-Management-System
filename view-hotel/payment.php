<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
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
        <div class="text">Payments</div>
        <div class="bg">
            <!-- <div class="search">
                <input type="search" class="subfield" style="margin-top:9px;margin-left:160px;" name="pName" />
                <button
                    style="cursor:pointer;margin-top:5px;margin-left:16px;border:0px white;background-color:white;"><i
                        class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>
            </div> -->

            <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for payments.."
                title="Type in a name">
                
          
            <div id="result">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Payment ID</th>
                        <th class="tblh">Date</th>
                        <th class="tblh">Reservation ID</th>
                        <th class="tblh">Guest ID</th>
                        <th class="tblh">Type</th>
                        <th class="tblh">Price</th>
                        <th class="tblh">Status</th>
                    
                </table>
            </div>
            </div>
        </div>

    </section>

</body>

</html>