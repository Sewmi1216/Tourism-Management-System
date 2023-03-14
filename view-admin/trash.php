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

                    <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i class="fa-sharp fa-solid fa-trash-can-undo"></i></i></a></td>
                    <td class="tbld"><a onclick="document.getElementById('id04').style.display='block'"><i class="fa-solid fa-trash art"></i></a></td>
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


</body>

</html>