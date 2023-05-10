<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/manageusers.css?v=<?php echo time(); ?>">
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
                <div class="page-title"> MANAGE USERS</div>
            </div>

        </div>

        <div class="searchSec">
            <div class="page-title"> ENTREPRENEUR APPROVAL</div>
            <!-- viewing all the verified Entrepreneurs Button -->
        <button type="submit" class="btns"><a href="view-entrepreneur.php"
                style="color:white;text-decoration:none;">View all Verified Entrepreneur</a></button>

        </div>

        

        <div class="bg">
            <!-- Head of the pending entrepreneur list table -->
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh"> Entrepreneur Name</th>
                    <th class="tblh">NIC</th>
                    <th class="tblh">E-Mail Address</th>
                    <th class="tblh">Phone Number</th>
                    <th class="tblh">View</th>
                    <th class="tblh">Approve</th>
                    <th class="tblh">Remove</th>
                </tr>

                <?php 
require_once("../controller/entrepreneurController.php");
$penentrepreneur = new entrepreneurController();
$results= $penentrepreneur->viewAllpendingentrepreneurs();
foreach ($results as $result) {

        ?>

                <tr class="subtext tblrw">
                    <td class="tbld">
                        <?php echo $result["entrepreneurName"] ?>
                    </td>

                    <td class="tbld">
                        <?php echo $result["entrepreneurNic"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["entrepreneurEmail"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["entrepreneurPhone"] ?>
                    </td>

                    <td class="tbld"> <a href="Approvalentrepreneur.php?entrepreneur_id=<?php echo $result["entID"] ?>">
                            <i class="fa-sharp fa-solid fa-bars art"></i></a></td>

                    <td class="tbld"><a onclick="openaModal('<?php echo $result['entID'] ?>')"><i
                                class="fa-solid fa-circle-check"></i></a></td>

                    <td class="tbld"><a onclick="opendModal('<?php echo $result['entID'] ?>')"><i
                                class="fa-solid fa-trash art"></i></a></td>
                </tr>


                <?php } ?>
            </table>

            <div id="id04" class="modal">

                <form class="modal-content animate" style="width:45%;" method="post" action="../api/entrepreneur.php"
                    enctype="multipart/form-data">
                    <div class="imgcontainer" style="background-color:#004581;">
                        <button type="button" onclick="document.getElementById('id04').style.display='none'"
                            class="cancelbtn close">&times;</button>
                        <label for="room" style="color:white"><b>Remove Entrepreneur</b></label>
                    </div>

                    <div class="container">

                        <input type="hidden" id="modalIdValue" class="subfield" name="id"
                            value=" <?php echo $result["entID"] ?>" />


                        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete
                            the entrepreneur request?</p>

                        <div class="container" style="padding:10px;">
                            <button type="button" onclick="document.getElementById('id04').style.display='none'"
                                class="btns" style="">No</button>
                            <button type="submit" class="cancelbtn" value="Save" name="decline"
                                style="margin-left:75px;">Yes</button>
                        </div>
                    </div>


                </form>
            </div>

            <script>
            function opendModal(id) {
                var modal = document.getElementById("id04");
                var modalIdValue = document.getElementById("modalIdValue");
                modalIdValue.value = id;
                modal.style.display = "block";
            }
            </script>


            <div id="id02" class="modal">

                <form class="modal-content animate" style="width:45%;" method="post" action="../api/entrepreneur.php"
                    enctype="multipart/form-data">
                    <div class="imgcontainer" style="background-color:#004581;">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'"
                            class="cancelbtn close">&times;</button>
                        <label for="room" style="color:white"><b>Accept Entrepreneur</b></label>
                    </div>

                    <div class="container">

                        <input type="hidden" id="modalIdValue" class="subfield" name="id"
                            value="<?php echo $result["entID"] ?>" />


                        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to Accept
                            the entrepreneur request?</p>

                        <div class="container" style="padding:10px;">
                            <button type="button" onclick="document.getElementById('id02').style.display='none'"
                                class="btns" style="">No</button>
                            <button type="submit" class="cancelbtn" value="Save" name="accept"
                                style="margin-left:75px;">Yes</button>
                        </div>
                    </div>


                </form>
            </div>

            <script>
            function openaModal(id) {
                var modal = document.getElementById("id02");
                var modalIdValue = document.getElementById("modalIdValue");
                modalIdValue.value = id;
                modal.style.display = "block";
            }
            </script>
        </div>



        <!-- ----------HotelApproval------------------ -->
        <div class="searchSec">
            <div class="page-title"> HOTEL APPROVAL</div>
            <!-- view all the verified hotels in the system -->
            <button type="submit" style="margin-left:150px;" class="btns"><a href="view-hotelmanager.php"
                    style="color:white;text-decoration:none;">View All Verified Hotel Managers</a></button>

        </div>


        <div class="bg">

            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Hotel Name</th>
                    <th class="tblh">Address</th>
                    <th class="tblh">Email Address</th>
                    <th class="tblh">Phone Number</th>
                    <th class="tblh">Manager Name</th>
                    <th class="tblh">View</th>
                    <th class="tblh">Approve</th>
                    <th class="tblh">Remove</th>
                </tr>

              
           <?php 

require_once("../controller/hotelController.php");
$penmanager= new hotelController();
$results= $penmanager->viewAllpendingmanagers();
foreach ($results as $result) {

        ?>


                <tr class="subtext tblrw">
                    <td class="tbld">
                        <?php echo $result["name"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["address"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["email"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["phone"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["managerName"] ?>
                    </td>

                    <td class="tbld"><a href="Approvehotelmanager.php?hotel_id=<?php echo $result["hotelID"] ?>"><i
                                class="fa-sharp fa-solid fa-bars art"></i></a></td>

                    <td class="tbld"><a onclick="openacceptModal('<?php echo $result['hotelID'] ?>')"><i
                                class="fa-solid fa-circle-check"></i></a></td>

                    <td class="tbld"><a onclick="opendeleteModal('<?php echo $result['hotelID'] ?>')"><i
                                class="fa-solid fa-trash art"></i></a></td>
                </tr>



                <?php }
?>

            </table>
            <div id="id05" class="modal">

                <form class="modal-content animate" style="width:45%;" method="post" action="../api/manager.php"
                    enctype="multipart/form-data">
                    <div class="imgcontainer" style="background-color:#004581;">
                        <button type="button" onclick="document.getElementById('id05').style.display='none'"
                            class="cancelbtn close">&times;</button>
                        <label for="room" style="color:white"><b>Remove Hotel request</b></label>
                    </div>

                    <div class="container">

                        <input type="hidden" id="modalIdValue" class="subfield" name="id"
                            value=" <?php echo $result["hotelID"] ?>" />


                        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete
                            the Hotel request?</p>

                        <div class="container" style="padding:10px;">
                            <button type="button" onclick="document.getElementById('id05').style.display='none'"
                                class="btns" style="">No</button>
                            <button type="submit" class="cancelbtn" value="Save" name="decline"
                                style="margin-left:75px;">Yes</button>
                        </div>
                    </div>


                </form>
            </div>

            <script>
            function opendeleteModal(id) {
                var modal = document.getElementById("id05");
                var modalIdValue = document.getElementById("modalIdValue");
                modalIdValue.value = id;
                modal.style.display = "block";
            }
            </script>


            <div id="id06" class="modal">

                <form class="modal-content animate" style="width:45%;" method="post" action="../api/manager.php"
                    enctype="multipart/form-data">
                    <div class="imgcontainer" style="background-color:#004581;">
                        <button type="button" onclick="document.getElementById('id06').style.display='none'"
                            class="cancelbtn close">&times;</button>
                        <label for="room" style="color:white"><b>Accept Hotel Request</b></label>
                    </div>

                    <div class="container">

                        <input type="hidden" id="modalIdValue" class="subfield" name="id"
                            value="<?php echo $result["hotelID"] ?>" />


                        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to Accept
                            the Hotel request?</p>

                        <div class="container" style="padding:10px;">
                            <button type="button" onclick="document.getElementById('id06').style.display='none'"
                                class="btns" style="">No</button>
                            <button type="submit" class="cancelbtn" value="Save" name="accept"
                                style="margin-left:75px;">Yes</button>
                        </div>
                    </div>


                </form>
            </div>

            <script>
            function openacceptModal(id) {
                var modal = document.getElementById("id06");
                var modalIdValue = document.getElementById("modalIdValue");
                modalIdValue.value = id;
                modal.style.display = "block";
            }
            </script>
        </div>



        </div>





        <!-- ---------------Tourguide Approval-------------------------- -->

        <div class="searchSec">
            <div class="page-title"> TOURGUIDE APPROVAL</div>
             <button type="submit" class="btns"><a href="view-tourguides.php" style="color:white;text-decoration:none;">View
                All Verified Tourguides</a></button>
        </div>
       

        <div class="bg">

            <table>
                <tr class="subtext tblrw">
                    <th class="tblh"> Tourguide Name</th>
                    <th class="tblh">NIC</th>
                    <th class="tblh">E-Mail Address</th>
                    <th class="tblh">Phone Number</th>
                    <th class="tblh">View</th>
                    <th class="tblh">Approve</th>
                    <th class="tblh">Remove</th>
                </tr>

                <?php 
require_once("../controller/tourguidecontroller.php");
$penguide= new tourguidecontroller();
$results= $penguide->viewAllpendingguides();
foreach ($results as $result) {

        ?>

                <tr class="subtext tblrw">
                    <td class="tbld">
                        <?php echo $result["name"] ?>
                    </td>

                    <td class="tbld">
                        <?php echo $result["nic"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["email"] ?>
                    </td>
                    <td class="tbld">
                        <?php echo $result["phone"] ?>
                    </td>

                    <td class="tbld"> <a
                            href="Approvetouristguide.php?tourguideID=<?php echo $result["tourguideID"] ?>"> <i
                                class="fa-sharp fa-solid fa-bars art"></i></a></td>

                    <td class="tbld"><a onclick="openaddModal('<?php echo $result['tourguideID'] ?>')"><i
                                class="fa-solid fa-circle-check"></i></a></td>

                    <td class="tbld"><a onclick="opendeclineModal('<?php echo $result['tourguideID'] ?>')"><i
                                class="fa-solid fa-trash art"></i></a></td>
                </tr>



                <?php }
?>

            </table>

            <div id="id07" class="modal">

                <form class="modal-content animate" style="width:45%;" method="post" action="../api/tourguide.php"
                    enctype="multipart/form-data">
                    <div class="imgcontainer" style="background-color:#004581;">
                        <button type="button" onclick="document.getElementById('id07').style.display='none'"
                            class="cancelbtn close">&times;</button>
                        <label for="room" style="color:white"><b>Remove Tourguide Request</b></label>
                    </div>

                    <div class="container">

                        <input type="hidden" id="modalIdValue" class="subfield" name="id"
                            value=" <?php echo $result["tourguideID"] ?>" />


                        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete
                            the tour guide request?</p>

                        <div class="container" style="padding:10px;">
                            <button type="button" onclick="document.getElementById('id07').style.display='none'"
                                class="btns" style="">No</button>
                            <button type="submit" class="cancelbtn" value="Save" name="decline"
                                style="margin-left:75px;">Yes</button>
                        </div>
                    </div>


                </form>
            </div>

            <script>
            function opendeclineModal(id) {
                var modal = document.getElementById("id07");
                var modalIdValue = document.getElementById("modalIdValue");
                modalIdValue.value = id;
                modal.style.display = "block";
            }
            </script>


            <div id="id08" class="modal">

                <form class="modal-content animate" style="width:45%;" method="post" action="../api/tourguide.php"
                    enctype="multipart/form-data">
                    <div class="imgcontainer" style="background-color:#004581;">
                        <button type="button" onclick="document.getElementById('id08').style.display='none'"
                            class="cancelbtn close">&times;</button>
                        <label for="room" style="color:white"><b>Accept Entrepreneur</b></label>
                    </div>

                    <div class="container">

                        <input type="hidden" id="modalIdValue" class="subfield" name="id"
                            value="<?php echo $result["tourguideID"] ?>" />


                        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to Accept
                            the tourguide request?</p>

                        <div class="container" style="padding:10px;">
                            <button type="button" onclick="document.getElementById('id08').style.display='none'"
                                class="btns" style="">No</button>
                            <button type="submit" class="cancelbtn" value="Save" name="accept"
                                style="margin-left:75px;">Yes</button>
                        </div>
                    </div>


                </form>
            </div>

            <script>
            function openaddModal(id) {
                var modal = document.getElementById("id08");
                var modalIdValue = document.getElementById("modalIdValue");
                modalIdValue.value = id;
                modal.style.display = "block";
            }
            </script>
        </div>


        </div>

        </div>
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