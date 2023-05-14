<!-- <?php
require('../api/managerprofile.php');
$rows = $_SESSION['c'];



?> -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/managerprofile.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
 
</head>

<body>
    

    <?php include "nav.php"?>
   


    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <?php
require_once "../controller/hotelController.php";
$profile = new hotelController();
$results = $profile->viewProfile($id);
foreach ($results as $result) {
    ?>
        <div class="text">Profile</div>
        <div class="wrapper">

            <div class="left">
                <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='logo' height='150px' width='150px'
                    style='padding-right:0px;border-radius:50%;'>";?>

                <h3><?php echo $result['name'];?></h3>
                <p><?php echo $result['username'];?></p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Hotel Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['email'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['phone'];?></p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p><?php echo $result['address'];?></p>
                        </div>



                    </div>

                </div>
                <div class="projects">
                    <h3>Contact Person Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p><?php echo $result['managerName'];?></p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p><?php echo $result['managerNic'];?></p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['managerEmail'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['managerPhone'];?></p>
                        </div>

                    </div>

                </div>
                <br>
                <!-- <a href="editentrepreneur.php?entrepreneur_id='<?php// echo $result['entrepreneurNic'];?>'" class="button">Update profile</a>
                <a href="editmanager.php" class="button">Delte profile</a> -->


                <?php } ?>

                <div class="bg">
            <div id="result" style="overflow-x:auto;">
                <table id="myTable">
                    <tr class="subtext tblrw">
                        <!-- <th class="tblh">Image</th> -->
                        <th class="tblh">Room Type</th>
                        <th class="tblh">Desciption</th>
                  
                    </tr> <?php
require_once "../controller/roomTypeController.php";
$pkg = new roomTypeController();
$results = $pkg->viewAllTypes($id);
foreach ($results as $result) {
    ?><tbody>
                        <tr class="subtext tblrw">
                            <!-- <td class="tbld">
                                <?php echo "<img src='../images/" . $result['img'] . "' style=
                    'border-radius: 50%;width:50px;height: 50px;background-size: 100%;
                    background-repeat: no-repeat;'>"; ?>
                            </td> -->
                            <td class="tbld"><?php echo $result["typeName"] ?></td>
                            <td class="tbld"><?php echo $result["description"] ?></td>

                        

                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
            </div>
    </section>
</body>

</html>