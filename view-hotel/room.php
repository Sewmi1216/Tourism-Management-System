<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:hotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <!-- <script src="../libs/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <!-- <div class="text">Hotel Packages</div> -->
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Rooms</div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for rooms" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns"><a href="room.php" style="color:white;text-decoration:none;">View
                        All</a></button>
                <span style="margin-left: 8px;">
                    <a onclick="document.getElementById('id01').style.display='block'"><i
                            class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span>
            </div>

        </div>
        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Room No</th>
                    <th class="tblh">Hotel Package ID</th>
                    <th class="tblh">Guest Name</th>
                    <th class="tblh">Room type</th>
                    <th class="tblh">From</th>
                    <th class="tblh">To</th>
                    <th class="tblh">Status</th>
                    <th class="tblh">Edit</th>
                    <th class="tblh">Delete</th>
                </tr><?php 
require_once("../controller/roomController.php");
$room = new roomController();
$results= $room->viewAllRooms();
foreach ($results as $result) {
        ?>

                <tr class="subtext tblrw">
                    <td class="tbld">
                        <?php echo $result["roomNo"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["hotelPkgID"] ?>
                    </td>
                    <td class="tbld">
                        John
                    </td>
                    <td class="tbld">
                        <?php echo $result["type"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["occupied_from"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["occupied_to"] ?>
                    </td>
                    <td class="tbld">
                        <?php if ($result["status"] == "Available") {?>
                        <button class="status1"><?php echo $result["status"]; ?></button>
                        <?php } else {?>
                        <button class="status2"><?php echo $result["status"]; ?></button>
                        <?php }?>
                    </td>
                    <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                class="fa-solid fa-pen-to-square art"></i></a></td>
                    <td class="tbld"><a onclick="document.getElementById('id04').style.display='block'"><i
                                class="fa-solid fa-trash art"></i></a></td>
                </tr>



                <?php }
?>

            </table>
        </div>
        </div>
        </div>


        <!-- add room -->
        <div id="id01" class="modal">

            <form class="modal-content animate" method="post" action="../api/addroom.php" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Add Room</b></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Hotel Package Name</div>
                            </td>
                            <td> <select class="subfield" name="hotelPkgId">
                                    <?php
require_once("../controller/hotelPkgController.php") ;
$pkg = new hotelPkgController();
$results = $pkg->viewAllPkgs();
           foreach ($results as $result) {
               ?>
                                    <option value="<?php echo $result["packageID"];
                ?>">
                                        <?php echo $result["packageName"];
                    ?>
                                    </option>
                                    <?php
           }
            ?>
                                </select></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Room Number</div>
                            </td>
                            <td> <input type="text" class="subfield" name="roomNo" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Room Type</div>
                            </td>
                            <td> <input type="text" class="subfield" name="type" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">No.of beds</div>
                            </td>
                            <td> <input type="number" min="10" class="subfield" name="beds" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status">
                                    <option value="" selected>---Choose availability---</option>
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select></td>
                        </tr>

                    </table>

                </div>

                <div class="container" style="background-color:#f1f1f1; padding:10px;">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="btns" value="Save" name="add" style="margin-left:75px;">Save</button>
                </div>
            </form>
        </div>


        <!-- update room -->
        <div id="id02" class="modal">

            <form class="modal-content animate" method="post" action="../api/addpkg.php" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Update Room</b></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Hotel Package Name</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Room Number</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Room Type</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">No.of beds</div>
                            </td>
                            <td> <input type="number" min="10" class="subfield" name="price" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status">
                                    <option value="" selected>---Choose availability---</option>
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select></td>
                        </tr>

                    </table>

                </div>

                <div class="container" style="background-color:#f1f1f1; padding:10px;">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="btns" value="Save" name="save"
                        style="margin-left:75px;">Update</button>
                </div>
            </form>
        </div>
        <div id="id03" class="modal">

            <form class="modal-content animate" style="width:45%;" method="post" action="#"
                enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id03').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                </div>

                <div class="container">
                    <p class="text" style="font-size:20px;text-align:center;margin-left:90px;">Do you want to delete
                        this room?</p>

                    <div class="container" style="background-color:#f1f1f1; padding:10px;">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'"
                            class="cancelbtn" style="margin-left:11rem;">Yes</button>
                        <button type="submit" class="btns" value="Save" name="save"
                            style="margin-left:75px;">No</button>
                    </div>
                </div>


            </form>
        </div>



    </section>
    <script>
    function openChat() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeChat() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>
</body>

</html>