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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
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
        <!-- <div class="text">Hotel Packages</div> -->
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Rooms</div>
                <div class="input-container">
                    <input class="input-field" id="myInput" onkeyup="searchTypes()" type="text"
                        placeholder="Search for room types" name="search">
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
            <table id="myTable">
                <tr class="subtext tblrw">
                    <th class="tblh">Room No</th>
                    <th class="tblh">Room Type</th>
                    <th class="tblh">Guest Name</th>
                    <th class="tblh">Reserved_from</th>
                    <th class="tblh">Reserved_to</th>
                    <th class="tblh">Status</th>
                    <th class="tblh">Edit</th>
                    <th class="tblh">Delete</th>
                </tr><?php 
require_once("../controller/roomController.php");
$room = new roomController();
$results= $room->viewAllRooms($id);
foreach ($results as $result) {
        ?>

                <tr class="subtext tblrw">
                    <td class="tbld">
                        <?php echo $result["roomNo"] ?>
                    </td>

                    <td class="tbld">
                        <?php echo $result["typeName"] ?>
                    </td>
                    <td class="tbld">
                        
                    </td>
                    <td class="tbld">
                        <?php echo $result["occupied_from"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["occupied_to"] ?>
                    </td>
                    <td class="tbld">
                        <?php if ($result["status"] == "Vacant") {?>
                        <button class="status1"><?php echo $result["status"]; ?></button>
                        <?php } else if($result["status"] == "Reserved") {?>
                        <button class="status2"><?php echo $result["status"]; ?></button>
                        <?php } else{?>
                        <button class="status3"><?php echo $result["status"]; ?></button>
                        <?php }?>
                    </td>
                    <td class="tbld"><a
                                    onclick="document.getElementById('id02').style.display='block';loadData(this.getAttribute('data-id'));"
                                    data-id="<?php echo $result['roomNo']; ?>"><i
                                        class="fa-solid fa-pen-to-square art"></i></a></td>
                    <!-- <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                class="fa-solid fa-pen-to-square art"></i></a></td> -->
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
                <div class="imgcontainer" style="background-color:#004581;">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn close">&times;</button>
                    <label for="room" style="color:white"><b>Add Room</b></label>
                </div>
                <hr>
                <div class="container">
                    <input type="hidden" class="subfield" name="hotelId" value="<?php echo $id; ?>" />
                    <table>

                        <tr class="row">
                            <td>
                                <div class="content">Room Type</div>
                            </td>
                            <td> <select class="subfield" name="typeId">
                                    <?php
require_once("../controller/roomTypeController.php") ;
$pkg = new roomTypeController();
$results = $pkg->viewAllTypes($id);
           foreach ($results as $result) {
               ?>
                                    <option value="<?php echo $result["roomTypeId"];
                ?>">
                                        <?php echo $result["typeName"];
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
                                <div class="content">No.of beds</div>
                            </td>
                            <td> <input type="number" min="0" class="subfield" name="beds" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status">
                                    <option value="" selected>---Choose availability---</option>
                                    <option value="Available">Reserved</option>
                                    <option value="Available">Vacant</option>
                                    <option value="Unavailable">Occupied</option>
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
                 <div class="imgcontainer" style="background-color:#004581;">
             <button type="button" onclick="document.getElementById('id02').style.display='none'"
                 class="cancelbtn close">&times;</button>
             <label for="room" style="color:white"><b>Update room</b></label>
         </div>
         <hr>
                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Room Type</div>
                            </td>
                            <td><select class="subfield" name="typeId">
                                    <?php
require_once("../controller/roomTypeController.php") ;
$pkg = new roomTypeController();
$results = $pkg->viewAllTypes($id);
           foreach ($results as $result) {
               ?>
                                    <option value="<?php echo $result["roomTypeId"];?>" id="roomtype">
                                        <?php echo $result["typeName"];?>
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
                            <td> <input type="text" class="subfield" name="pName" id="roomno" value=""/></td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">No.of beds</div>
                            </td>
                            <td> <input type="number" min="0" class="subfield" value="" name="price"id="beds" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status" id="status">
                                    <option value="Reserved">Reserved</option>
                                    <option value="Occupied">Occupied</option>
                                    <option value="Vacant">Vacant</option>
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
    function searchTypes() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
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
            url: "../api/addroom.php",
            method: "POST",
            data: {
                get_data: 1,
                id: id,
            },
            success: function(response) {
                console.log(response);
                var room = JSON.parse(response);
                $("#roomno").val(room.roomNo);
                $("#roomtype").val(room.typeName);
                $("#beds").val(room.noOfBeds);
                $('#status').val(room.status);
            }
        });
    }

    function openChat() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeChat() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>
</body>

</html>