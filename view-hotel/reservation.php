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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
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
                <div class="input-container" style="margin-left:730px;">
                    <input class="input-field" type="text" placeholder="Search for reservations" name="search"
                        id="searcher" onkeyup="searchRes()">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns" style="margin-left:1rem;">View All</button>
                <!-- <form method="post" action="../api/reserve.php"> -->
                <button type="submit" name="create_rpdf" id="create_rpdf" class="btns"
                    style="margin-left:1rem;background-color:red;">Download pdf</button>
                <!-- </form> -->
            </div>
        </div>
        <div id="cont">
            <div class="page-title" style="margin-left:30px;"> Guest Reservations</div>
            <div class="bg">

                <table id="tbl">
                    <tr class="subtext tblrw">
                        <th class="tblh">Date</th>
                        <th class="tblh">Reservation ID</th>
                        <th class="tblh">Room Number</th>
                        <th class="tblh">Guest ID</th>
                        <th class="tblh">Guest Name</th>
                        <th class="tblh">Total amount</th>
                        <th class="tblh">Check-in</th>
                        <th class="tblh">Check-out</th>
                        <th class="tblh">status</th>
                        <th class="tblh">View</th>
                    </tr>

                    <?php
require_once "../controller/hotelController.php";
$res = new hotelController();
$results = $res->viewGuestReservations($id);

foreach ($results as $result) {
    ?><tbody>
                        <tr class="subtext tblrw">
                            <td class="tbld"><?php echo $result["bookingDateTime"] ?></td>
                            <td class="tbld"><?php echo $result["reservationID"] ?></td>
                            <td class="tbld"><?php echo $result["roomID"] ?></td>
                            <td class="tbld"><?php echo $result["touristID"] ?></td>
                            <td class="tbld"><?php echo $result["guestName"] ?></td>
                            <td class="tbld"><?php echo '$' . $result["total_amount"] ?></td>
                            <td class="tbld"><?php echo $result["checkInDate"] ?></td>
                            <td class="tbld"><?php echo $result["checkOutDate"] ?></td>
                            <td class="tbld">
                                <!-- <?php if ($result["status"] == "Confirmed") {?>
                            <button class="status1"><?php echo $result["status"]; ?></button>
                            <?php } else {?>
                            <button class="status2"><?php echo $result["status"]; ?></button>
                            <?php }?> -->
                                <select class="subfield" name="status">
                                    <option value="Pending"
                                        <?php if ($result["status"] == "Pending") {echo "selected";}?>>
                                        Pending</option>
                                    <option value="Confirmed"
                                        <?php if ($result["status"] == "Confirmed") {echo "selected";}?>>
                                        Confirmed</option>
                                    <option value="Checkedin"
                                        <?php if ($result["status"] == "Checkedin") {echo "selected";}?>>
                                        Checkedin</option>
                                    <option value="Cancelled"
                                        <?php if ($result["status"] == "Cancelled") {echo "selected";}?>>
                                        Cancelled</option>
                                </select>
                            </td>
                            <td class="tbld"><a
                                    onclick="document.getElementById('id05').style.display='block';loadData(this.getAttribute('data-id'));"
                                    data-id="<?php echo $result['reservationID']; ?>"><i
                                        class="fa-solid fa-bars"></i></a>
                            </td>

                            <?php }

?>
                        </tr>
                </table>
            </div>
        </div>

 <!-- view Reservation-->
    <div id="id05" class="modal">

        <form class="modal-content animate" method="post" action="../api/">
            <div class="imgcontainer" style="background-color:#004581;">
                <button type="button" onclick="document.getElementById('id05').style.display='none'"
                    class="cancelbtn close">&times;</button>
                <label for="room" style="color:white"><b>View Reservation</b></label>
            </div>
            <hr>
            <div class="container">
                <table>
                    <tr class="row">
                        <td>
                            <div class="content">Reservation Number</div>
                        </td>
                        <td><div id="resid"></div></td>
                    </tr>

                    <tr class="row">
                        <td>
                            <div class="content">Booking Date/ Time</div>
                        </td>
                        <td><div id="date"></div></td>
                    </tr>
                    <tr class="row">
                        <td>
                            <div class="content">Guest Name</div>
                        </td>
                        <td><div id="guestname"></div></td>
                    </tr>
                    <tr class="row">
                        <td>
                            <div class="content">Guest Phone Number</div>
                        </td>
                        <td><div id="guestphone"></div></td>
                    </tr>
                    <tr class="row">
                        <td>
                            <div class="content">Guest Email Addres</div>
                        </td>
                        <td><div id="guestemail"></div></td>
                    </tr>
                </table>

            </div>

            <div class="container" style="background-color:#f1f1f1; padding:10px;">
                <button type="button" onclick="document.getElementById('id05').style.display='none'"
                    class="cancelbtn">Ok</button>
            </div>
        </form>
    </div>

    </section>

   

    <script type="text/javascript">
    function loadData(id) {
        $.ajax({
            url: "../api/reserve.php",
            method: "POST",
            data: {
                get_data: 1,
                id: id,
            },
            success: function(response) {
                console.log(response);
                var res = JSON.parse(response);
                $("#resid").text(res.reservationID);
                $("#date").text(res.bookingDateTime);
                $("#guestname").text(res.guestName);
                $("#guestphone").text(res.guestPhone);
                $("#guestemail").text(res.guestEmail);

            }
        });
    }
    document.getElementById('create_rpdf').onclick = function() {
        var element = document.getElementById('cont');
        var opt = {
            margin: 0.2,
            filename: 'reservation.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 1
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'landscape'
            }
        };
        html2pdf(element, opt);
    };
    </script>

    <script>
    $('.subfield').on('change', function() {
        var newStatus = $(this).val();
        var reservationId = $(this).closest('tr').find('.tbld:nth-child(2)').text();
        $.ajax({
            url: '../api/update_status.php',
            type: 'POST',
            data: {
                reservationid: reservationId,
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

    function searchRes() {
        console.log(print);
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searcher");
        filter = input.value.toUpperCase();
        table = document.getElementById("tbl");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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
</body>

</html>