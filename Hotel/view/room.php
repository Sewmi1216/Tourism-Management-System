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
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/room.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
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

                <div class="add"><i class="fa-regular fa-square-plus" style="font-size:30px;margin-left:950px;"></i>
                </div>
                </button>



                <div>
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
                    $roomControl =  new roomController();
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

            <div class="model-container">
                <div class="model">
                    <div class="heading">Add Room</div>
                    <div class="close"> <i class="fa-sharp fa-solid fa-circle-xmark"
                            style="float:right;margin-top:-35px;font-size:25px;margin-left:395px;"></i>
                    </div>
                    <form action="../api/addroomapi.php" method="post">
                        <table>
                            <tr class="row">
                                <td>
                                    <div class="content">Hotel Package Name</div>
                                </td>
                                <td>
                                    <!-- <select id="cars" class="subfield" name="carlist" form="carform">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select> -->
                                    <input type="text" class="subfield" name="hotelPkgId" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td>
                                    <div class="content">Room Number</div>
                                </td>
                                <td><input type="text" class="subfield" name="roomNo" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td>
                                    <div class="content">Room Type</div>
                                </td>
                                <td> <input type="text" class="subfield" name="type" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td>
                                    <div class="content">Number of beds</div>
                                </td>
                                <td> <input type="number" class="subfield" name="beds" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td>
                                    <div class="content">Status</div>
                                </td>
                                <td> <input type="text" class="subfield" name="status" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" class="btn" style="padding:10px;margin-left:150px;" value="ADD ROOM"
                            name="add">
                    </form>

                </div>
            </div>
    </section>
    <script>
    var model = $('.model');

    $('.add').click(function() {
        model.show();
    })
    $('.close').click(function() {
        model.hide();
    })
    // $('.btn').click(function() {
    //     model.hide();
    // })
    </script>
</body>

</html>