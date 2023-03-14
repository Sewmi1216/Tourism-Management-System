<?php 
require('../api/viewtourpackage.php');
$rows = $_SESSION['c'];
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
                <div class="page-title"> Tour packages </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for Tour packages" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                
                <span style="margin-left: 8px;">
                    <a href="addpackage.php"><i
                            class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span>
            </div>

        </div>
        <div class="bg">


            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Package ID</th>
                    <th class="tblh">Package Name</th>
                    <th class="tblh"> No of Participant</th>
                    <th class="tblh"> Package price</th>
                    <th class="tblh">View</th>
                    <th class="tblh">Edit</th>
                    <th class="tblh">Delete</th>
                </tr>
                
                <?php                   
foreach ($rows as $row) {  

echo '

                <tr class="subtext tblrw">
                    <td class="tbld">
                    '.$row['packageID'].'  
                    </td>
                    
                    <td class="tbld">
                    '.$row['packageName'].' 
                    </td>
                    <td class="tbld">
                    '.$row['participant_count'].'  
                    </td>
                    <td class="tbld">
                    '.$row['price'].'  
                    </td>
                  
                    <td class="tbld">  <a href="packagedescription2.php?package_id='.$row['packageID'].'"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>
                    <td class="tbld"> <a href="editpackage2.php?package_id='.$row['packageID'].'"> <i class="fa-solid fa-pen-to-square art"> </i></a></td>
                      
                    <td class="tbld"> <a href="deletetourpackage.php?package_id='.$row['packageID'].'"> <i class="fa-solid fa-trash art"></i></td>
                </tr>

    
                ' ;
            }
            
            ?>  
            </table>
            


 


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