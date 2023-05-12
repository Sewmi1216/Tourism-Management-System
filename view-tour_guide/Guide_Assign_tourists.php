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
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <style>
    td{
        padding:10px;
    }</style>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Assign Tourists </div>
                <div class="input-container">
                    <!-- <input class="input-field" type="text" placeholder="Search for products" name="search"> -->
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for products.."
                        title="Type in a productname">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>

            </div>

        </div>

        <div class="bg" style="overflow-x:auto;">
            <table id="myTable">
                <tr class="header">

                    <th class="tblh">Guest Name</th>

                    <th class="tblh">Arrival Date</th>
                    <th class="tblh">Departure Date</th>

                    <th class="tblh">Number of Passengers</th>
                    <th class="tblh">Tour Package</th>
                    <th class="tblh">View Details</th>
                </tr><?php
                    require_once "../controller/tourguideController.php";
                    $guide = new tourguideController();
                    $results = $guide->viewAssignedBookings($id);
                    foreach ($results as $result) {
                        ?>

                <tr class="header">
                    <td class="tbld"><?php echo $result["guestName"] ?></td>
                    <td class="tbld"><?php echo $result["arrivalDate"] ?></td>
                    <td class="tbld"><?php echo $result["departureDate"] ?></td>
                    <td class="tbld"><?php echo $result["noOfGuests"] ?></td>
                    <td class="tbld"><?php echo $result["packageName"] ?></td>
                    <td class="tbld">
                       <a onclick="document.getElementById('id02').style.display='block';loadData(this.getAttribute('data-ID'), <?php echo $result['tourGuideId']; ?>);"
  data-ID="<?php echo $result['bookingID']; ?>"><i class="fa-solid fa-bars"></i></a>

                </tr>

                <?php }

?>
            </table>
        </div>
        </div>
        </div>
        <div id="id02" class="modal">
            <form class="modal-content animate" method="post">
                <div class="imgcontainer" style="background-color:#004581;">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'"
                        class="cancelbtn close">&times;</button>
                    <label for="room" style="color:white"><b>View Reservation</b></label>
                </div>
                <div style="margin-top:20px;">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Guest Name</div>
                            </td>
                            <td>
                                <div id="guestName"></div>
                            </td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">Guest Phone Number</div>
                            </td>
                            <td>
                                <div id="guestPhone"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Guest Email Address</div>
                            </td>
                            <td>
                                <div id="guestEmail"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Tour Package</div>
                            </td>
                            <td>
                                <div id="packageName"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Description</div>
                            </td>
                            <td>
                                <div id="description"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Preferred Vehicle Type</div>
                            </td>
                            <td>
                                <div id="preferredVehicleType"></div>
                            </td>
                        </tr>
                    </table>

                </div>

                <div style="padding:10px;margin-left:300px;margin-top:30px;">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'"
                        class="cancelbtn">OK</button>
                </div>
            </form>
        </div>



        <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByClassName("header");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        </script>

        <script>
        function loadData(id, tourGuideId) {
            $.ajax({
                url: "../api/guideapi.php",
                method: "POST",
                data: {
                    get_data: 1,
                    id: id,
                    tourGuideId:tourGuideId,
                },
                success: function(response) {
                    console.log(response);
                    var guide = JSON.parse(response);
                    $("#guestName").text(guide.guestName);
                    $("#guestPhone").text(guide.guestPhone);
                    $("#guestEmail").text(guide.guestEmail);
                    $("#packageName").text(guide.packageName);
                    $("#description").text(guide.description);
                    $("#preferredVehicleType").text(guide.preferredVehicleType);

                }
            });
        }
        </script>


    </section>

</body>

</html>