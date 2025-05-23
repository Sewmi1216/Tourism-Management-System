<?php
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}

if (isset($_GET['hid'])) {$hid = $_GET['hid'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourist.css">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <style>
    html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-padding-top: 6rem;
        scroll-behavior: smooth;
    }
    </style>
</head>

<body>
    <?php include "header.php"?>


    <section class="hotel1" id="hotel" style="padding: 2rem 9%;">
        <div class="container">
            <?php
require_once "../controller/touristController.php";
$hotel = new touristController();
$results = $hotel->viewHotel($hid);
foreach ($results as $result) {
    ?>
            <div class="box">
                <table>
                    <tr>
                        <td>
                            <?php echo "<img src='../images/" . $result['profileImg'] . "' style='width:80rem;height:50rem;'>"; ?>
                        </td>

                        <td style="padding:50px;">
                            <div>
                                <h1 class="hotel"><?php echo $result['name']; ?></h1><br>
                                <p class="sub"><i class="fa-solid fa-location-dot"></i>
                                    &nbsp;&nbsp;<?php echo $result['address']; ?></p>

                                <p class="sub"><i class="fa-sharp fa-solid fa-envelope"></i>
                                    &nbsp;&nbsp;<?php echo $result['email']; ?></p>

                                <p class="sub"><i
                                        class="fa-solid fa-phone"></i>&nbsp;&nbsp;<?php echo $result['phone']; ?>
                                </p>

                                <!-- <p><?php echo $result['address']; ?></p> -->
                            </div>
                        </td>
                    </tr>
            </div>
            <?php }?>
            </table>
        </div>
    </section>


    <section class="popular" id="hotel" style="padding: 2rem 9%;">
        <form action="" method="post">
            <div class="searchSec" style="margin-top:20px;">
                <table>
                    <tr>
                        <th>
                            <div class="search">Check-In</div>
                        </th>
                        <th>
                            <div class="search">Check-Out</div>
                        </th>
                        <th>
                            <div class="search">No.of persons</div>
                        </th>
                        <th>
                            <div class="search">Accommodation</div>
                        </th>
                    </tr>
                    <tr>
                        <input type="hidden" value="<?php echo $hid ?>" name="hotel">
                        <td> <?php $currentDate = date("Y-m-d");?>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="date" id="checkin" placeholder="check-In" min="<?php echo $currentDate;?>"
                                    name="checkin">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="date" id="checkout" placeholder="check-Out" min="<?php echo $currentDate;?>"
                                    name="checkout">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <select class="input-field" name="person" id="person">
                                    <option value="" selected>---No of Persons---</option>
                                    <?php
require_once "../controller/roomTypeController.php";
$pkg = new roomTypeController();
$results = $pkg->viewPersons($hid);
foreach ($results as $result) {
    ?>
                                    <option value="<?php echo $result["NumberPerson"];
    ?>">
                                        <?php echo $result["NumberPerson"];
    ?>
                                    </option>
                                    <?php
}
?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <select class="input-field" name="room" id="room">
                                    <option value="" selected>---Room Type---</option>
                                    <?php
require_once "../controller/roomTypeController.php";
$pkg = new roomTypeController();
$results = $pkg->viewAllTypes($hid);
foreach ($results as $result) {
    ?>
                                    <option value="<?php echo $result["typeName"];
    ?>">
                                        <?php echo $result["typeName"];
    ?>
                                    </option>
                                    <?php
}
?>

                                </select>
                            </div>

                        </td>
                    </tr>

                </table>

                <button type="submit" class="btns" style="margin-left: 1rem;margin-top:20px;"
                    name="search">Check Availability</button>
            </div>




        </form>

        <?php
if (isset($_POST['search'])) {
    $hid = $_POST['hotel'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $person = $_POST['person'];
    $room = $_POST['room'];
    $search = new touristController();
    $rs = $search->searchRoom($hid, $person, $room);
    if ($rs) {
        foreach ($rs as $result) {
            // echo $result['roomNo'];
            $av = new touristController();
            $rows = $av->availability($checkin, $checkout, (int) $result['roomNo']);
            if ($rows) {
                foreach ($rows as $row) {
                    $status = $row['status'];?>

        <input class="input-field" type="hidden" value="<?php echo $row['status'] ?>">

        <?php
if ($status == 'Confirmed') {
                        $btn = '<div style="margin-top:10px; color: red; font-size:16px;"><strong>Fully Reserve!</strong></div>';
                    } else if ($status == 'Checkedin') {
                        $btn = '<div style="margin-top:10px; color: red; font-size:16px;"><strong>Fully Book!</strong></div>';
                    } else {
                        $btn = '<div style="display: flex; justify-content: center;">
                  <a href="reserve.php?hid=' . $hid . '&roomno=' . $result['roomNo'] . '&typeID=' . $result['typeID'] . '&price=' . $result['price'] . '&checkin=' . $checkin . '&checkout=' . $checkout . '"
        class="btn" target="_blank">Reserve</a>
        </div>';}
                }} else {
                $btn = '<div style="display: flex; justify-content: center;">
             <a href="reserve.php?hid=' . $hid . '&roomno=' . $result['roomNo'] . '&typeID=' . $result['typeID'] . '&price=' . $result['price'] . '&checkin=' . $checkin . '&checkout=' . $checkout . '"
        class="btn" target="_blank">Reserve</a>
        </div>';

            }

            ?>
        <div class="container" style="margin-top:30px;display:block;">

            <div class="box">
                <div class="slideshow-container">
                    <?php
require_once "../controller/roomTypeController.php";
            $tp = new roomTypeController();
            $outputs = $tp->viewAllImgs($result['typeID']);
            foreach ($outputs as $output) {
                ?>
                    <div class="slider">
                        <?php echo "<img src='../images/" . $output['image'] . "' style='width:100%'>"; ?>
                    </div>
                    <?php break;}?>
                </div>

                <div class="content-container">
                    <input type="hidden" value="<?php echo $result['typeID'] ?>" name="type">
                    <input type="hidden" value="<?php echo $result['roomNo'] ?>" name="room">
                    <h3 style="display: inline;"><?php echo $result['typeName']; ?></h3>
                    <br>
                    <h2><?php echo $result['description']; ?></h2>
                    <br>
                    <h2><?php echo $result['view']; ?></h2>
                    <br>
                    <h1>$<?php echo $result['price']; ?>/Night</h1>
                </div>
                <?php echo $btn; ?>

            </div>

        </div>

        <?php }
    } else {?>
        <div class="content-container" style="font-size:20px;text-align:center;">
            No results
        </div>
        <?php }}?>



    </section>

    <!-- <?php include "footer.php"?> -->

    <script src="js/home.js">
    </script>
    <script>
    $("#checkout").change(function() {
        var startDate = document.getElementById("checkin").value;
        var endDate = document.getElementById("checkout").value;

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alert("Checkout date should be greater than Checkin date");
            document.getElementById("checkout").value = "";
        }
    });
    </script>
</body>

</html>