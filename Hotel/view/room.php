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
            <div class="add"><i class="fa-regular fa-square-plus" style="font-size:30px;margin-left:950px;"></i>
            </div>
            <div>
                <table>
                    <tr>
                        <th>Room Number</th>
                        <th>Hotel Package ID</th>
                        <th>Guest Name</th>
                        <th>Room type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr><?php
                    include "../controller/roomController.php";
                    $roomControl =  new roomController();
                    $res = $roomControl->viewAllRooms();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>
                    <tr>
                        <td><?php echo $row["roomNo"] ?></td>
                        <td><?php echo $row["hotelPkgID"] ?></td>
                        <td><?php echo $row["guestName"] ?></td>
                        <td><?php echo $row["type"] ?></td>
                        <td><?php echo $row["occupied_from"] ?></td>
                        <td><?php echo $row["occupied_to"] ?></td>
                        <td><?php echo $row["status"] ?></td>
                        <td>Edit</td>
                        <td>Delete</td>
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