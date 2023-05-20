<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
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
                <div class="page-title"> TOUR PACKAGE BOOKINGS </div>
                <!-- <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for reservations" name="search"
                        id="searcher" onkeyup="searchRes()">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div> -->
               
            </div>

        </div>
        <form action="" method="post">
            <div class="bg">
                <table id="tbl">
                    <tr class="subtext tblrw">
                        <th class="tblh">Date</th>
                        <th class="tblh">Booking ID</th>
                        <th class="tblh">Package Name</th>
                        <th class="tblh">Guest ID</th>
                        <th class="tblh">Guest Name</th>
                        <th class="tblh">Total amount</th>
                        <th class="tblh">Check-in</th>
                        <th class="tblh">Assign Guide</th>

                        <th class="tblh">Assigned Guide</th>

                        <!-- <th class="tblh">View Booking</th> -->
                        <th class="tblh">Booking Status</th>
                        <th class="tblh">Quick View</th>
                    </tr>

                    <?php
  
   require_once "../controller/tourbookingcontroller.php";
   $res = new tourbookingcontroller();
   $results = $res->viewtourreservations();
   
   foreach ($results as $result) {
       ?> <tbody>
                        <tr class="subtext tblrw">
                            <td class="tbld"><?php echo $result["bookingDateTime"] ?></td>
                            <td class="tbld"><?php echo $result["bookingID"] ?></td>
                            <td class="tbld"><?php echo $result["tourPkgID"] ?></td>
                            <td class="tbld"><?php echo $result["touristID"] ?></td>
                            <td class="tbld"><?php echo $result["guestName"] ?></td>
                            <td class="tbld"><?php echo '$' . $result["noOfGuests"] ?></td>
                            <td class="tbld"><?php echo $result["arrivalDate"] ?></td>

                            <td class="tbld"> <a href="assignguide.php?reservation_id=<?php echo $result["bookingID"] ?>&guideID=<?php echo $result["tourGuideId"] ?>"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>
                            
                            <td class="tbld"><?php echo $result["tourGuideId"] ?></td>
                           






















                            <td class="tbld">

                                <select class="subfield" name="Status">


                                    <option value="Pending"
                                        <?php if ($result["bookingStatus"] == "Pending") {echo "selected";}?>>
                                        Pending</option>
                                    <option value="Confirmed"
                                        <?php if ($result["bookingStatus"] == "Confirmed") {echo "selected";}?>>
                                        Confirmed</option>
                                    <option value="Cancelled"
                                        <?php if ($result["bookingStatus"] == "Cancelled") {echo "selected";}?>>
                                        Cancelled</option>
                                </select>
                            </td>


                            <td class="tbld"><a
                                    onclick="document.getElementById('id05').style.display='block';loadData(this.getAttribute('data-id'));"
                                    data-id="<?php echo $result['bookingID']?>">
                                    <i class="fa-solid fa-bars"></i> </a>
                            </td>


                            <?php }

                       

?>
                        </tr>
                </table>
        </form>
        </div>
        <!-- view Reservation-->



        <div id="id05" class="modal">

            <form class="modal-content animate" method="post" action="">
                <div class="imgcontainer" style="background-color:#004581;">
                    <button type="button" onclick="document.getElementById('id05').style.display='none'"
                        class="cancelbtn close">&times;</button>
                    <label for="room" style="color:white"><b>View Booking</b></label>
                </div>
                <hr>
                <div class="container">
                    <table>

                        <?php 
// require('../api/viewtourbooking-admin.php');
// $results = $_SESSION['c'];
?>





                        <tr class="row">
                            <td>
                                <div class="content">Booking Number</div>
                            </td>
                            <td>
                                <div id="bookingid"></div>
                            </td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">Booking Date/ Time</div>
                            </td>
                            <td>
                                <div id="date"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Tour Package Name</div>
                            </td>
                            <td>
                                <div id="packagename"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Guest Name</div>
                            </td>
                            <td>
                                <div id="guestname"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Guest Phone Number</div>
                            </td>
                            <td>
                                <div id="guestphone"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Guest Email Addres</div>
                            </td>
                            <td>
                                <div id="guestemail"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Tour Guide Name</div>
                            </td>
                            <td>
                                <div id="guidename"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Tour Guide Contact Number</div>
                            </td>
                            <td>
                                <div id="guidephone"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Start Date</div>
                            </td>
                            <td>
                                <div id="checkin"></div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">End Date</div>
                            </td>
                            <td>
                                <div id="checkout"></div>
                            </td>
                        </tr>

                    </table>

                </div>

                <div class="container" style="background-color:#f1f1f1; padding:10px;">
                    <button type="button" onclick="document.getElementById('id05').style.display='none'"
                        class="cancelbtn">Ok</button>
                </div>
            </form>
        </div>

        <script type="text/javascript">
        function loadData(id) {
            $.ajax({
                url: "../api/viewtourbooking-admin.php",
                method: "POST",
                data: {
                    get_data: 1,
                    id: id,
                },
                success: function(response) {
                    console.log(response);
                    var res = JSON.parse(response);
                    $("#bookingid").text(res.bookingID);
                    $("#date").text(res.bookingDateTime);
                    $("#guestname").text(res.guestName);
                    $("#guestphone").text(res.guestPhone);
                    $("#guestemail").text(res.guestEmail);
                    $("#checkin").text(res.arrivalDate);
                    $("#checkout").text(res.departureDate);
                    $("#packagename").text(res.packageName);
                    $("#guidename").text(res.name);
                    $("#guidephone").text(res.phone);


                }
            });
        }
        </script>
        <script>
        $('.subfield').on('change', function() {
            var newStatus = $(this).val();
            var bookingId = $(this).closest('tr').find('.tbld:nth-child(2)').text();
            $.ajax({
                url: '../api/update_bookingstatus.php',
                type: 'POST',
                data: {
                    bookingId: bookingId,
                    newStatus: newStatus
                },
                success: function(response) {
                    console.log(response);
                    alert('Status update is successful');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });

        });
        </script>

        <!-- <script>
        $('.tourguide').on('change', function() {
            var newTourguide = $(this).val();
            var bookingID = $(this).closest('tr').find('.tbld:nth-child(2)').text();
            $.ajax({
                url: '../api/assigntourguide.php',
                type: 'POST',
                data: {
                    bookingId: bookingID,
                    newTourguide: newTourguide
                },
                success: function(response) {
                    console.log(response);
                    alert('Assigned Tourgide successfully');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
        </script> -->


</body>

</html>