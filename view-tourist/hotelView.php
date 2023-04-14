<?php
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}


$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
require_once("../controller/touristController.php") ;
$hotel = new touristController();
$results = $hotel->viewHotel($id);
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
                                <h1 class="hotel"><?php echo $result['name'];?></h3><br>

                                    <p class="sub"><i class="fa-solid fa-location-dot"></i>
                                        &nbsp;&nbsp;<?php echo $result['address'];?></p>

                                    <p class="sub"><i class="fa-sharp fa-solid fa-envelope"></i>
                                        &nbsp;&nbsp;<?php echo $result['email'];?></p>

                                    <p class="sub"><i
                                            class="fa-solid fa-phone"></i>&nbsp;&nbsp;<?php echo $result['phone'];?></p>

                                    <!-- <p><?php echo $result['address'];?></p> -->
                            </div>
                        </td>
                    </tr>
            </div>
            <?php }?>
            </table>
        </div>
    </section>


    <section class="popular" id="hotel" style="padding: 2rem 9%;">
        <form action="">
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
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="date" placeholder="check-In" name="search">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="date" placeholder="check-Out" name="search">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <select class="input-field" name="status">
                                    <option value="" selected>---No of Persons---</option>
                                    <?php
require_once "../controller/roomTypeController.php";
$pkg = new roomTypeController();
$results = $pkg->viewPersons($id);
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
                                <select class="input-field" name="status">
                                    <option value="" selected>---Room Type---</option>
                                    <?php
require_once "../controller/roomTypeController.php";
$pkg = new roomTypeController();
$results = $pkg->viewAllTypes($id);
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

                <button type="submit" class="btns" style="margin-left: 1rem;margin-top:20px;"><a href="roomType.php"
                        style="color:white;text-decoration:none;">Search</a></button>

            </div>
            <p id="dem" style="display:none;">***One room can accommodate only 2 people</p>
        </form>


        <!-- <div class="container" style="margin-top:30px;">
            <?php
require_once("../controller/roomTypeController.php") ;
$room = new roomTypeController();
$results = $room->viewAllTypes($id);
           foreach ($results as $result) {
               ?>
            <div class="box">
                <div class="slideshow-container">
                    <?php
require_once("../controller/roomTypeController.php") ;
$tp = new roomTypeController();
$rows = $tp->viewAllImgs( $result['roomTypeId']);
           foreach ($rows as $row) {
               ?>
                    <div class="slider">
                        <?php echo "<img src='../images/" . $row['image'] . "' style='width:100%'>";?>
                    </div>
                    <?php break;} ?>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;"><?php echo $result['typeName'];?></h3>
                    <br>
                    <h2><?php echo $result['description'];?></h2>
                    <br>
                    <h2><?php echo $result['price'];?></h2>
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="reserve.php?typeid=<?php echo $result['roomTypeId'];?>&hotelID=<?php echo $result['hotelID'];?>&price=<?php echo $result['price'];?>"
                        class="btn">Reserve</a>
                </div>
            </div>
            <?php }?>
        </div> -->
    </section>

    <section id="contact" style="padding-bottom: 20px">
        <div style="text-align:center; padding: 10px;">
            <h2 class="" style="color: #70706c;font-size:30px;">CONTACT US</h2>
            <div style="color: #babab3;font-size: 17px;padding-top: 50px">
                <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Telephone</div>
                <div>+94 -11- 2581245/ 7</div>

                <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Fax</div>
                <div>+94-11-2237239</div>

                <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Email</div>
                <div>info@pack2paradise.lk</div>
            </div>
        </div>
    </section>

    <script src="js/home.js"></script>

</body>

</html>