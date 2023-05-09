<?php 
require('../api/viewtourbooking-admin.php');
$results = $_SESSION['c'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/pkg.css?v=<?php echo time(); ?>">
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

        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> TOUR PACKAGE BOOKINGS </div>
             
               <form method="post" action="../api/reserve.php">
                    <button type="submit" name="create_rpdf" class="btns"
                        style="margin-left:1rem;background-color:red;">Download pdf</button>
                </form>
            </div>

        </div>  

        <div class="bg">
            <table id="tbl">
           

            <?php

foreach($results as $result) 

echo '
   
       
       <tbody>
                 <tr class="subtext tblrw">
                                <th class="tblh">Tour booking Detail</th>
                              <th class="tblh">Description</th>
                    
                         </tr>
                       <tr class="subtext tblrw">
                           <td class="tbld"> Booking ID</td>
                           <td class="tbld">'.$result["bookingID"].'</td>
                        </tr>
                        <tr class="subtext tblrw">
                           <td class="tbld"> Booking Time</td>
                           <td class="tbld">'.$result["bookingDateTime"],'</td>
                        </tr>
                        <tr class="subtext tblrw">
                           <td class="tbld"> Booking status </td>
                           <td class="tbld">'.$result["bookingStatus"].'</td>
                        </tr>



                             <tr class="subtext tblrw">
                                <th class="tblh">Guest Detail</th>
                              <th class="tblh">Description</th>
                    
                         </tr>
                       <tr class="subtext tblrw">
                           <td class="tbld"> Guest ID</td>
                           <td class="tbld">'.$result["touristID"] .'</td>
                        </tr>
                        <tr class="subtext tblrw">
                           <td class="tbld"> Guest Name</td>
                           <td class="tbld">'.$result["guestName"] .'</td>
                        </tr>
                        <tr class="subtext tblrw">
                           <td class="tbld"> Nationality </td>
                           <td class="tbld">'.$result["country"] .'</td>
                        </tr>
                        <tr class="subtext tblrw">
                           <td class="tbld"> Contact Number </td>
                           <td class="tbld">'.$result["guestPhone"] .'</td>
                        </tr>
                        <tr class="subtext tblrw">
                           <td class="tbld"> Passport/NIC Number </td>
                           <td class="tbld">'.$result["nic"] .'</td>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> No of Guests </td>
                           <td class="tbld">'.$result["noOfGuests"] .'</td>
                        </tr>
                        <tr class="subtext tblrw">
                            <th class="tblh">Tour package Detail</th>
                             <th class="tblh">Description</th>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> Tour package ID </td>
                           <td class="tbld">'.$result["packageID"] .'</td>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> Tour package Name </td>
                           <td class="tbld">'.$result["packageName"] .'</td>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> Total Days </td>
                           <td class="tbld">'.$result["no_of_days"] .'</td>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> Travel Locations </td>
                           <td class="tbld">'.$result["touristID"] .'</td>
                        </tr>

                        <tr class="subtext tblrw">
                            <th class="tblh">Tour Guide Detail</th>
                             <th class="tblh">Description</th>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> Tour Guide ID </td>
                           <td class="tbld">'.$result["touristID"] .'</td>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> Tour Guide Name </td>
                           <td class="tbld">'.$result["touristID"] .'</td>
                        </tr>
                        <tr class="subtext tblrw">
                           <td class="tbld"> NIC Number </td>
                           <td class="tbld">'.$result["touristID"] .'</td>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> Contact Number </td>
                           <td class="tbld">'.$result["touristID"] .'</td>
                        </tr>

                        <tr class="subtext tblrw">
                           <td class="tbld"> Vehicle type </td>
                           <td class="tbld">'.$result["touristID"] .'</td>
                        </tr>

'  ?>
                    </tr>
            </table>
        </div>



</body>

</html>