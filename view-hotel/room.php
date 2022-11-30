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
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <!-- <script src="../libs/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <script type="text/javascript">
    $(function() {
        $("btn-add").click(function() {
            $("mo").dialog({
                title: "Add new room",
                width: 430,
                height: 200,
                modal: true,
                buttons: {
                    Close: function() {
                        $(this).dialog('close');
                    }
                }
            });
        });
    })
    </script>
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">Rooms
            <div class="bg">
                <input type="search" class="search" style="margin-top:9px;margin-left:160px;" name="pName" />
                <button
                    style="cursor:pointer;margin-top:5px;margin-left:16px;border:0px white;background-color:white;"><i
                        class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>

                <button id="btn-add" style="margin-left:950px;"><i class="fa-regular fa-square-plus"
                        style="font-size:30px;"></i>
                </button>

                <div id="mo" style="display:none;">This</div>

                    <table>
                        <tr class="heading tblrw">
                            <th class="tblh">Room Number</th>
                            <th class="tblh">Hotel Package ID</th>
                            <th class="tblh">Guest Name</th>
                            <th class="tblh">Room type</th>
                            <th class="tblh">From</th>
                            <th class="tblh">To</th>
                            <th class="tblh">Status</th>
                            <th class="tblh">Edit</th>
                            <th class="tblh">Delete</th>
                        </tr><?php
                                include "../controller/roomController.php";
                                $roomControl = new roomController();
                                $res = $roomControl->viewAllRooms();
                                if ($res->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($res)) {
                                        ?>
                        <tr class="subheading tblrw">
                            <td class="tbld"><?php echo $row["roomNo"] ?></td>
                            <td class="tbld"><?php echo $row["hotelPkgID"] ?></td>
                            <td class="tbld"><?php echo $row["guestName"] ?></td>
                            <td class="tbld"><?php echo $row["type"] ?></td>
                            <td class="tbld"><?php echo $row["occupied_from"] ?></td>
                            <td class="tbld"><?php echo $row["occupied_to"] ?></td>
                            <td class="tbld"><?php echo $row["status"] ?></td>
                            <td class="tbld">Edit</td>
                            <td class="tbld">Delete</td>
                        </tr>
                        <?php }
                                } else {
                                    echo "No results";
                                }
                                ?>
                    </table>
            </div>
        </div>
    </section>
</body>

</html>