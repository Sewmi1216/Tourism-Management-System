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
            </div>
            <button type="submit" class="btns"><a href="view-entrepreneur.php" style="color:white;text-decoration:none;">View all Verified Entrepreneur</a></button>


        <div class="bg">
       
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
                    
                    <td class="tbld">   <a href="Approvalentrepreneur.php? <?php echo $result["entID"] ?>"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>

                    <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                class="fa-solid fa-circle-check"></i></a></td>
                    <td class="tbld"><a onclick="document.getElementById('id04').style.display='block'"><i
                                class="fa-solid fa-trash art"></i></a></td>
                </tr>



                <?php }
?>

            </table>

              
      
        </div>
         
          <div class="searchSec">
                <div class="page-title"> MANAGER APPROVAL</div>
            </div>
            <button type="submit" class="btns"><a href="view-hotelmanager.php" style="color:white;text-decoration:none;">View All Verified Hotels</a></button>

          <div class="bg">
       
       <table>
           <tr class="subtext tblrw">
                   <th class="tblh"> Manager Name</th>
                   <th class="tblh">NIC</th>
                   <th class="tblh">E-Mail Address</th>
                   <th class="tblh">Phone Number</th>
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
                   <?php echo $result["managerName"] ?>
               </td>
               
               <td class="tbld">
               <?php echo $result["managerNic"] ?>
               </td>
               <td class="tbld">
               <?php echo $result["managerEmail"] ?>
               </td>
               <td class="tbld">
               <?php echo $result["managerPhone"] ?>
               </td>
               
               <td class="tbld">   <a href="Approvehotelmanager.php? <?php echo $result["entID"] ?>"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>

               <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                           class="fa-solid fa-circle-check"></i></a></td>
               <td class="tbld"><a onclick="document.getElementById('id04').style.display='block'"><i
                           class="fa-solid fa-trash art"></i></a></td>
           </tr>



           <?php }
?>

       </table>

         
 
   </div>

     <div class="searchSec">
                <div class="page-title"> TOURGUIDE APPROVAL</div>
            </div>
            <button type="submit" class="btns"><a href="view-tourguides.php" style="color:white;text-decoration:none;">View All Verified Tourguides</a></button>

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
               <?php echo $result["nic"] ?>
               </td>
               <td class="tbld">
               <?php echo $result["email"] ?>
               </td>
               <td class="tbld">
               <?php echo $result["phone"] ?>
               </td>
               
               <td class="tbld">   <a href="Approvetouristguide.php? <?php echo $result["entID"] ?>"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>

               <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                           class="fa-solid fa-circle-check"></i></a></td>
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
                    <label for="room"><b>Add Room</b><hr style="margin-top:25px;"></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Room Type</div>
                            </td>
                            <td> <select class="subfield" name="hotelPkgId">
                                    <?php
require_once("../controller/roomTypeController.php") ;
$pkg = new roomTypeController();
$results = $pkg->viewAllTypes();
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
                    <label for="room"><b>Update Room</b><hr style="margin-top:25px;"></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Room Type</div>
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
                                <div class="content">No.of beds</div>
                            </td>
                            <td> <input type="number" min="0" class="subfield" name="price" /></td>
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