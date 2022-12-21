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
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                <div class="page-title"> Hotel Packages </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for packages" name="search">
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
            <!-- <div class="search">
                <input type="search" class="subfield" style="margin-top:9px;margin-left:160px;" name="pName" />
                <button
                    style="cursor:pointer;margin-top:5px;margin-left:16px;border:0px white;background-color:white;"><i
                        class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>
            </div> -->

            <!-- <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for names.."
                title="Type in a name"> -->


            <div id="result">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Hotel Package</th>
                        <th class="tblh">Hotel Package Name</th>
                        <th class="tblh">Room Type</th>
                        <th class="tblh">Status</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr><?php
require_once("../controller/hotelPkgController.php") ;
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
                        <td class="tbld"><a onclick="document.getElementById('id03').style.display='block';"><i
                                    class="fa-sharp fa-solid fa-bars art"></i></a></td>
                        <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                    class="fa-solid fa-pen-to-square art"></i></a></td>
                        <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
                    </tr>
                    <?php }
} else {
    echo "No results";
}
?>
                </table>
            </div>


        </div>
        </div>


        <div id="id01" class="modal">

            <form class="modal-content animate" method="post" action="../api/addpkg.php" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Add Hotel Package</b></label>
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
                                <div class="content">Description</div>
                            </td>
                            <td>
                                <textarea class="subtextfield" name="desc" rows="8" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <td><input type="text" class="subfield" name="status" /></td>
                            <!-- <td> <select class="subfield" name="status" form="carform">
                                <option value="" selected>---Choose availability---</option>
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select></td> -->
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Price</div>
                            </td>
                            <td> <input type="number" min="10" class="subfield" name="price" /></td>
                        </tr>


                        <tr class="row">
                            <td>
                                <div class="content">Upload Image</div>
                            </td>
                            <td> <input type="file" class="subfield" name="file" /></td>
                        </tr>
                        <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->


                    </table>

                </div>

                <div class="container" style="background-color:#f1f1f1; padding:10px;">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="btns" value="Save" name="save" style="margin-left:75px;">Save</button>
                </div>
            </form>
        </div>
        <!-- view pkg -->
        <div id="id03" class="modal">

            <form class="modal-content animate" method="post" action="#" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id03').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Family Package</b></label>
                </div>

                <div class="container">


                </div>


            </form>
        </div>


        <!-- update pkg -->
        <div id="id02" class="modal">

            <form class="modal-content animate" method="post" action="#" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Update Hotel Package</b></label>
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
                                <div class="content">Description</div>
                            </td>
                            <td>
                                <textarea class="subtextfield" name="desc" rows="8" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <td><input type="text" class="subfield" name="status" /></td>
                            <!-- <td> <select class="subfield" name="status" form="carform">
                                <option value="" selected>---Choose availability---</option>
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select></td> -->
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Price</div>
                            </td>
                            <td> <input type="number" min="10" class="subfield" name="price" /></td>
                        </tr>


                        <tr class="row">
                            <td>
                                <div class="content">Upload Image</div>
                            </td>
                            <td> <input type="file" class="subfield" name="file" /></td>
                        </tr>
                        <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->


                    </table>

                </div>

                <div class="container" style="background-color:#f1f1f1; padding:10px;">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="btns" value="Save" name="save"
                        style="margin-left:75px;">Update</button>
                </div>
            </form>
        </div>
    </section>

</body>

</html>