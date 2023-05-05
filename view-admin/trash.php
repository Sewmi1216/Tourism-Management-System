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
         
        <div id="id01" class="modal">

        
<!-- Delete the tour package -->

<form class="modal-content animate" style="width:45%;" method="GET" action="../api/deletetourpackage.php" enctype="multipart/form-data">

<input type="hidden" id="modalIdValue" class="subfield"  name = "packageID" value="<?php echo $row['packageID']; ?>"/>

    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id02').style.display='none'"  class="cancelbtn close">&times;</button>
            <label for="room" style="color:white"><b>Permemntly delete Tour Package</b></label>
    </div> 

<div class="container">




        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete the tourpackage permenently ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="btns" style="">No</button>
            <button type="submit" class="cancelbtn" style="margin-left:75px;">Yes</button>
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

                    <td class="tbld"><a onclick="openaModal('<?php echo $result['entID'] ?>')"><i class="fa-solid fa-circle-check"></i></a></td>
                                
                    <td class="tbld"><a onclick="opendModal('<?php echo $result['entID'] ?>')"><i class="fa-solid fa-trash art"></i></a></td>
                </tr>


                <?php } ?>
            </table>
</body>

</html>