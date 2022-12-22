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
                <button type="submit" class="btns">View All</button>
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
                </tr>
                <tr class="subtext tblrw">
                    <td class="tbld">R101</td>
                    <td class="tbld">P111</td>
                    <td class="tbld">Tom</td>
                    <td class="tbld">Single</td>
                    <td class="tbld">2022/02/14</td>
                    <td class="tbld">2022/02/16</td>
                    <td class="tbld">Occupied</td>
                   <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                    class="fa-solid fa-pen-to-square art"></i></a></td>
                    <td class="tbld"><a onclick="document.getElementById('id03').style.display='block'"><i class="fa-solid fa-trash art"></i></a></td>
                </tr>
                <tr class="subtext tblrw">
                    <td class="tbld">R102</td>
                    <td class="tbld">P112</td>
                    <td class="tbld">Jerry</td>
                    <td class="tbld">Double</td>
                    <td class="tbld">2022/02/14</td>
                    <td class="tbld">2022/02/16</td>
                    <td class="tbld">Occupied</td>
                    <td class="tbld"><i class="fa-solid fa-pen-to-square art"></i></td>
                    <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
                </tr>
                <tr class="subtext tblrw">
                    <td class="tbld">R103</td>
                    <td class="tbld">P113</td>
                    <td class="tbld">Dave</td>
                    <td class="tbld">Single</td>
                    <td class="tbld">2022/02/14</td>
                    <td class="tbld">2022/02/16</td>
                    <td class="tbld">Occupied</td>
                    <td class="tbld"><i class="fa-solid fa-pen-to-square art"></i></td>
                    <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
                </tr>
                <!-- <?php
include "../controller/hotelPkgController.php";
$hotelPkgcont = new hotelPkgController();
$res = $hotelPkgcont->viewAllPkgs();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>
                    <tr class="subtext tblrw">
                        <td class="tbld"><?php echo "<img src='../images/" . $row['image'] . "' style=
                    'border-radius: 50%;width:50px;height: 50px;background-size: 100%;
                    background-repeat: no-repeat;'>";?>
                        </td>
                        <td class="tbld"><?php echo $row["packageName"] ?></td>
                        <td class="tbld"><?php echo $row["price"] ?></td>
                        <td class="tbld"><button class="status">
                                <?php if($row["status"]==0){
                            echo "Unavailable";}
                            else{
                             echo "Available";}
                             ?></button>
                        </td>
                        <td class="tbld"><i class="fa-sharp fa-solid fa-bars art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-pen-to-square art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
                    </tr>
                    <?php }
} else {
    echo "No results";
}
?> -->
            </table>
        </div>
        </div>
        </div>


 <!-- add room -->
        <div id="id01" class="modal">

            <form class="modal-content animate" method="post" action="../api/addpkg.php" enctype="multipart/form-data">
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
                    <button type="submit" class="btns" value="Save" name="save" style="margin-left:75px;">Save</button>
                </div>
            </form>
        </div>


       <!-- update room -->
        <div id="id02" class="modal">

            <form class="modal-content animate" method="post" action="../api/addpkg.php" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Updates Room</b></label>
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
                    <button type="submit" class="btns" value="Save" name="save" style="margin-left:75px;">Update</button>
                </div>
            </form>
        </div>
<div id="id03" class="modal">

            <form class="modal-content animate" style="width:45%;" method="post" action="#" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id03').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                </div>

                <div class="container">
                    <p class="text" style="font-size:20px;text-align:center;margin-left:90px;">Do you want to delete this room?</p>

                    <div class="container" style="background-color:#f1f1f1; padding:10px;">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'"
                            class="cancelbtn" style="margin-left:11rem;">Yes</button>
                        <button type="submit" class="btns" value="Save" name="save"
                            style="margin-left:75px;">No</button>
                    </div>
                </div>


            </form>
        </div>
        <!-- chat box -->
        <div class="form-popup" id="myForm">
            <form action="#" class="form-container">

                <div id="container">
                    <aside>
                        <span onclick="document.getElementById('myForm').style.display='none'" class="close"
                            style="top:20px;right:2px;" title="Close Modal">&times;</span>
                        <header>
                            <input type="text" placeholder="search">
                        </header>
                        <ul>
                            <li>
                                <img src="../images/avt.png" alt="" height="50px" width="50px;">
                                <div>
                                    <h2>Sachini Perera</h2>
                                    <h3>
                                        <span class="status orange"></span>
                                        offline
                                    </h3>
                                </div>


                            <li>
                                <img src="../images/avt.png" alt="" height="50px" width="50px;">
                                <div>
                                    <h2>Udari Sharmila</h2>
                                    <h3>
                                        <span class="status green"></span>
                                        online
                                    </h3>
                                </div>
                            </li>
                        </ul>
                    </aside>
                    <main>
                        <header>
                            <img src="../images/avt.png" alt="" height="50px" width="50px;">
                            <div>
                                <h2>Chat with Sachini Perera</h2>
                            </div>

                        </header>
                        <ul id="chat">
                            <li class="me">
                                <div class="entete">
                                    <h3>10:12AM, Today</h3>
                                    <h2>Sachini</h2>
                                    <span class="status blue"></span>
                                </div>
                                <div class="triangle"></div>
                                <div class="message">
                                    Hello! How can I help you?
                                </div>
                            </li>

                        </ul>
                        <footer>
                            <textarea placeholder="Type your message"></textarea>

                            <a href="#">Send</a>
                        </footer>
                    </main>
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