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
                <div class="page-title"> RECENTLY DELETED </div>
            </div>

        </div> 
        
        <div class="searchSec">
                <div class="page-title"> Recently Deleted Tour Packages </div>
            </div>
            <button type="submit" class="btns"><a href="tourpackages.php" style="color:white;text-decoration:none;">View all Tour packages</a></button>


        <div class="bg">
       
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Package ID</th>
                    <th class="tblh">Package Name</th>
                    <th class="tblh">View</th>
                    <th class="tblh">Restore Package</th>
                    <th class="tblh">Permemnerntly Deslete</th>
                </tr>
                
                                    <?php 
                                    require_once("../controller/tourpackagecontroller.php");
                                    $del_tourpackage = new tourpackagecontroller();
                                    $results= $del_tourpackage-> viewdeletedtourPkg();
                                    foreach ($results as $result) {

                                    ?>

                <tr class="subtext tblrw">
                    <td class="tbld">
                        <?php echo $result["packageID"] ?>
                    </td>
                    
                    <td class="tbld">
                    <?php echo $result["packageName"] ?>
                    </td>
                    
                    <td class="tbld">   <a href="packagedescription2.php? <?php echo $result["packageID"] ?>"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>

                    <td class="tbld"><a onclick="document.getElementById('id01').style.display='block'"><i
                           class="fa-solid fa-circle-check"></i></a></td>
                    <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i class="fa-solid fa-trash art"></i></a></td>
                </tr>

                <?php } ?>

            </table>

        </div>
         
<!-- Restore tour package popup -->

<div id="id01" class="modal">

<form class="modal-content animate" style="width:45%;" method="GET" action="../api/viewtourpackage.php" enctype="multipart/form-data">

<input type="hidden" id="modalIdValue" class="subfield"  name = "packageID" value="<?php echo $row['packageID']; ?>"/>

    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id01').style.display='none'"  class="cancelbtn close">&times;</button>
            <label for="room" style="color:white"><b>Restore Tour Package</b></label>
    </div> 

<div class="container">




        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to restore the tourpackage ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btns" style="">No</button>
            <button type="submit" class="cancelbtn" style="margin-left:75px;" name="restore" >Yes</button>
        </div>
    </div>


</form>
</div>




<script>
function openModal(id) {
var modal = document.getElementById("id01");
var modalIdValue = document.getElementById("modalIdValue");
modalIdValue.value = id;
modal.style.display = "block";
}
</script>

 </div>   

<!-- Delete tour package popup -->

 <div id="id02" class="modal">

<form class="modal-content animate" style="width:45%;" method="GET" action="../api/viewtourpackage.php" enctype="multipart/form-data">

<input type="hidden" id="modalIdValue" class="subfield"  name = "packageID" value="<?php echo $row['packageID']; ?>"/>

    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id02').style.display='none'"  class="cancelbtn close">&times;</button>
            <label for="room" style="color:white"><b>Delete Tour Package</b></label>
    </div> 

<div class="container">

        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete the tourpackage permemnently ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btns" style="">No</button>
            <button type="submit" class="cancelbtn" style="margin-left:75px;" name="remove">Yes</button>
        </div>
    </div>
</form>
</div>




<script>
function openModal(id) {
var modal = document.getElementById("id02");
var modalIdValue = document.getElementById("modalIdValue");
modalIdValue.value = id;
modal.style.display = "block";
}
</script>

 </div>  


          <div class="searchSec">
                <div class="page-title"> Recently deleted Hotel Managers </div>
            </div>
            <button type="submit" class="btns"><a href="view-hotelmanager.php" style="color:white;text-decoration:none;">View All Verified Hotel Managers</a></button>

          <div class="bg">
       
       <table>
           <tr class="subtext tblrw">
                   <th class="tblh"> Manager Name</th>
                   <th class="tblh">NIC</th>
                   <th class="tblh">E-Mail Address</th>
                   <th class="tblh">Phone Number</th>
                   <th class="tblh">View</th>
                   <th class="tblh">Restore</th>
                   <th class="tblh">Permenently Delete</th>
           </tr>
           
           <?php 
require_once("../controller/hotelController.php");
$penmanager= new hotelController();
$results= $penmanager->viewdeletedmanagers();
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

               <td class="tbld"><a onclick="document.getElementById('id03').style.display='block'"><i
                           class="fa-solid fa-circle-check"></i></a></td>
               <td class="tbld"><a onclick="document.getElementById('id04').style.display='block'"><i
                           class="fa-solid fa-trash art"></i></a></td>
           </tr>



           <?php }
?>

       </table>

<!-- Delete hotel popup -->
<div id="id04" class="modal">

                <form class="modal-content animate" style="width:45%;" method="post" action="../api/manager.php"
                    enctype="multipart/form-data">
                    <div class="imgcontainer" style="background-color:#004581;">
                        <button type="button" onclick="document.getElementById('id04').style.display='none'"
                            class="cancelbtn close">&times;</button>
                        <label for="room" style="color:white"><b>Remove Hotel request</b></label>
                    </div>

                    <div class="container">

                        <input type="hidden" id="modalIdValue" class="subfield" name="id"
                            value=" <?php echo $result["hotelID"] ?>" />


                        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete
                            the Hotel permenently ?</p>

                        <div class="container" style="padding:10px;">
                            <button type="button" onclick="document.getElementById('id05').style.display='none'"
                                class="btns" style="">No</button>
                            <button type="submit" class="cancelbtn" value="Save" name="remove"
                                style="margin-left:75px;">Yes</button>
                        </div>
                    </div>


                </form>
            </div>

            <script>
            function opendeleteModal(id) {
                var modal = document.getElementById("id04");
                var modalIdValue = document.getElementById("modalIdValue");
                modalIdValue.value = id;
                modal.style.display = "block";
            }
            </script>

 </div>  

 <!-- Restore hotel popup -->

 <div id="id03" class="modal">

<form class="modal-content animate" style="width:45%;" method="post" action="../api/manager.php"
    enctype="multipart/form-data">
    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id03').style.display='none'"
            class="cancelbtn close">&times;</button>
        <label for="room" style="color:white"><b>Restore Hotel Request</b></label>
    </div>

    <div class="container">

        <input type="hidden" id="modalIdValue" class="subfield" name="id"
            value="<?php echo $result["hotelID"] ?>" />


        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to restore the Hotel ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id06').style.display='none'"
                class="btns" style="">No</button>
            <button type="submit" class="cancelbtn" value="Save" name="restore"
                style="margin-left:75px;">Yes</button>
        </div>
    </div>


</form>
</div>

<script>
function openacceptModal(id) {
var modal = document.getElementById("id03");
var modalIdValue = document.getElementById("modalIdValue");
modalIdValue.value = id;
modal.style.display = "block";
}
</script>
</div>

 </div>  
         
 

 <!-- Recently deleted tour guides -->
   </div>

     <div class="searchSec">
                <div class="page-title"> Recently deleted Tour guides</div>
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
                   <th class="tblh">Restore</th>
                   <th class="tblh">Permenently Delete</th>
           </tr>
           
           <?php 
require_once("../controller/tourguidecontroller.php");
$penguide= new tourguidecontroller();
$results= $penguide->viewdeletedguides();
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

               <td class="tbld"><a onclick="document.getElementById('id05').style.display='block'"><i
                           class="fa-solid fa-circle-check"></i></a></td>
               <td class="tbld"><a onclick="document.getElementById('id06').style.display='block'"><i
                           class="fa-solid fa-trash art"></i></a></td>
           </tr>

           <?php } ?>

       </table>
   </div>

<!-- Restore the Tour guide    -->
<div id="id05" class="modal">

<form class="modal-content animate" style="width:45%;" method="GET" action="../api/deletetourpackage.php" enctype="multipart/form-data">

<input type="hidden" id="modalIdValue" class="subfield"  name = "packageID" value="<?php echo $row['packageID']; ?>"/>

    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id05').style.display='none'"  class="cancelbtn close">&times;</button>
            <label for="room" style="color:white"><b>Restore the Tour guide</b></label>
    </div> 

<div class="container">

        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to restore the Tour guide ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id05').style.display='none'" class="btns" style="">No</button>
            <button type="submit" class="cancelbtn" style="margin-left:75px;" name="restore">Yes</button>
        </div>
    </div>
</form>
</div>

<script>
function openModal(id) {
var modal = document.getElementById("id05");
var modalIdValue = document.getElementById("modalIdValue");
modalIdValue.value = id;
modal.style.display = "block";
}
</script>

 </div>  

 <!-- Delete the Tour guide permenently -->
 <div id="id06" class="modal">

<form class="modal-content animate" style="width:45%;" method="post" action="../api/tourguide.php"
    enctype="multipart/form-data">
    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id06').style.display='none'"
            class="cancelbtn close">&times;</button>
        <label for="room" style="color:white"><b>Remove Entrepreneur permenently</b></label>
    </div>

    <div class="container">

        <input type="hidden" id="modalIdValue" class="subfield" name="id"
            value="<?php echo $result["tourguideID"] ?>" />


        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete the tourguide permenently ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id08').style.display='none'"
                class="btns" style="">No</button>
            <button type="submit" class="cancelbtn" value="Save" name="remove" style="margin-left:75px;">Yes</button>
        </div>
    </div>


</form>
</div>

<script>
function openaddModal(id) {
var modal = document.getElementById("id06");
var modalIdValue = document.getElementById("modalIdValue");
modalIdValue.value = id;
modal.style.display = "block";
}
</script>

 </div>  








   

 <!-- Recently deleted entrepreneurs -->
        <div class="searchSec">
                <div class="page-title"> Recently deleted entrepreneurs </div>
            </div>

            <!-- viewing all the verified Entrepreneurs Button -->
            <button type="submit" class="btns"><a href="view-entrepreneur.php" style="color:white;text-decoration:none;">View all Verified Entrepreneur</a></button>


        <div class="bg">
       <!-- Head of the pending entrepreneur list table -->
            <table>
                <tr class="subtext tblrw">
                        <th class="tblh"> Entrepreneur Name</th>
                        <th class="tblh">NIC</th>
                        <th class="tblh">E-Mail Address</th>
                        <th class="tblh">Phone Number</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Restore</th>
                        <th class="tblh">Permenently Delete</th>
                </tr>
                
        <?php 
require_once("../controller/entrepreneurController.php");
$penentrepreneur = new entrepreneurController();
$results= $penentrepreneur->viewdeletedentrepreneurs();
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
                    
                    <td class="tbld">   <a href="Approvalentrepreneur.php?entrepreneur_id=<?php echo $result["entID"] ?>"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>

                    <td class="tbld"><a onclick="document.getElementById('id07').style.display='block'"><i
                           class="fa-solid fa-circle-check"></i></a></td>
                    <td class="tbld"><a onclick="document.getElementById('id08').style.display='block'"><i
                           class="fa-solid fa-trash art"></i></a></td>
                </tr>


                <?php } ?>
            </table>

            <!-- Restore entrepreneur -->

            <div id="id07" class="modal">

<form class="modal-content animate" style="width:45%;" method="post" action="../api/entrepreneur.php"
    enctype="multipart/form-data">
    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id07').style.display='none'"
            class="cancelbtn close">&times;</button>
        <label for="room" style="color:white"><b>Restore Entrepreneur</b></label>
    </div>

    <div class="container">

        <input type="hidden" id="modalIdValue" class="subfield" name="id"
            value="<?php echo $result["entID"] ?>" />


        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to Restore
            the deleted entrepreneur ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id02').style.display='none'"
                class="btns" style="">No</button>
            <button type="submit" class="cancelbtn" value="Save" name="restore"
                style="margin-left:75px;">Yes</button>
        </div>
    </div>


</form>
</div>

<script>
function openaModal(id) {
var modal = document.getElementById("id07");
var modalIdValue = document.getElementById("modalIdValue");
modalIdValue.value = id;
modal.style.display = "block";
}
</script>
</div>

 <!-- Delete entrepreneur permenently -->
            <div id="id08" class="modal">

                <form class="modal-content animate" style="width:45%;" method="post" action="../api/entrepreneur.php"
                    enctype="multipart/form-data">
                    <div class="imgcontainer" style="background-color:#004581;">
                        <button type="button" onclick="document.getElementById('id08').style.display='none'"
                            class="cancelbtn close">&times;</button>
                        <label for="room" style="color:white"><b>Remove Entrepreneur</b></label>
                    </div>

                    <div class="container">

                        <input type="hidden" id="modalIdValue" class="subfield" name="id"
                            value=" <?php echo $result["entID"] ?>" />


                        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete
                            the entrepreneur permenently?</p>

                        <div class="container" style="padding:10px;">
                            <button type="button" onclick="document.getElementById('id08').style.display='none'"
                                class="btns" style="">No</button>
                            <button type="submit" class="cancelbtn" value="Save" name="remove"
                                style="margin-left:75px;">Yes</button>
                        </div>
                    </div>


                </form>
            </div>

            <script>
            function opendModal(id) {
                var modal = document.getElementById("id08");
                var modalIdValue = document.getElementById("modalIdValue");
                modalIdValue.value = id;
                modal.style.display = "block";
            }
            </script>

 </div>  
</body>

</html>