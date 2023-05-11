<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
               <form method="post" action="../api/reserve.php">
                    <button type="submit" name="create_rpdf" class="btns"
                        style="margin-left:1rem;background-color:red;">Download pdf</button>
                </form>
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
                    <th class="tblh">View Booking</th>
                    <th class="tblh">Booking Status</th>
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
                           <td class="tbld"> <a href="tourbookingdetail.php?reservation_id=<?php echo $result["bookingID"] ?>&touristId=<?php echo $result["touristID"] ?>&packageID=<?php echo $result["tourPkgID"] ?>"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>
                           <td class="tbld">
                                <!-- <?php if ($result["bookingStatus"] == "Confirmed") {?>
                            <button class="status1"><?php echo $result["bookingStatuss"]; ?></button>
                            <?php } else {?>
                            <button class="status2"><?php echo $result["bookingStatus"]; ?></button>
                            <?php }?> -->
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
   
   
                           <?php }

                       

?>
                    </tr>
            </table>
            </form>
        </div>

        <script>
    $('.subfield').on('change', function() {
        var newStatus = $(this).val();
        var bookingId = $(this).closest('tr').find('.tbld:nth-child(2)').text();
        $.ajax({
            url: '../api/update_bookingstatus.php',
            type: 'POST',
            data: {
                bookingid: bookingId,
                newstatus: newStatus
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

</body>

</html>