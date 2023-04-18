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
                <div class="page-title"> Guest Reservations[Payment done by tourist]</div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for reservations" name="search"
                        id="searcher" onkeyup="searchRes()">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns" style="margin-left:1rem;">View All</button>

            </div>

        </div>

        <div class="bg">
            <table id="tbl">
                <tr class="subtext tblrw">
                    <th class="tblh">Date</th>
                    <th class="tblh">Reservation ID</th>
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
                                <option value="Pending" <?php if($result["status"]=="Pending"){echo "selected";}?>>
                                    Pending</option>
                                <option value="Confirmed" <?php if($result["status"]=="Confirmed"){echo "selected";}?>>
                                    Confirmed</option>
                                <option value="Checkedin" <?php if($result["status"]=="Checkedin"){echo "selected";}?>>
                                    Checkedin</option>
                                <option value="Cancelled" <?php if($result["status"]=="Cancelled"){echo "selected";}?>>
                                    Cancelled</option>
                            </select>
                        </td>

                        <td class="tbld"><a
                                onclick="document.getElementById('id08').style.display='block';loadData(this.getAttribute('data-id'));"
                                data-id="<?php echo $result['reservationID']; ?>"><i class="fa-solid fa-bars"></i></a>
                        </td>

                        <?php }

?>
                    </tr>
            </table>
        </div>


    </section>

    <!-- view Reservation-->


    <script>
    $('.subfield').on('change', function() {
        var newStatus = $(this).val();
        var reservationId = $(this).closest('tr').find('.tbld:nth-child(2)').text();
        $.ajax({
            url: '../api/reserve.php',
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
                $("#resid").val(res.reservationID);


            }
        });
    }
    </script>
</body>

</html>