<!-- <?php
require('../api/tourguideprofile.php');
$rows = $_SESSION['c'];

?>  -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
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

require_once "../controller/tourguideController.php";
$profile = new tourguideController();
$results = $profile->viewoneguide($id);
foreach ($results as $result) {

    ?>
        <div class="text">Tour-guide Profile</div>
        <div class="wrapper">

            <div class="left">
                <!-- <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='logo' height='150px' width='150px'
                    style='padding-right:0px;border-radius:50%;'>";?> -->

                <h3><?php echo $result['name'];?></h3>
                <p><?php echo $result['username'];?></p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Tour Guide Details</h3>
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
                            <h4>NIC</h4>
                            <p><?php echo $result['nic'];?></p>
                        </div>

                    </div>
                    <div class="info">
                   
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
                            <h4>Availability</h4>
                            <p><?php echo $result['availability'];?></p>
                        </div>

                    </div>
                </div>
                <div class="projects">
                    <h3>Vehicle Detail Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Vehicle Type</h4>
                            <p><?php echo $result['vehicleType'];?></p>
                        </div>
                        <div class="data">
                            <h4>Vehicle Number</h4>
                            <p><?php echo $result['vehicleNumber'];?></p>
                        </div>
                        <div class="data">
                            <h4>Maximum passesnger</h4>
                            <p><?php echo $result['passenger'];?></p>
                        </div>
                        

                    </div>

                </div>
                <br>
                


                <?php } ?>
            </div>
    </section>


    <div id="id04" class="modal">

<form class="modal-content animate" style="width:45%;" method="post" action="deleteentrepreneur.php"
    enctype="multipart/form-data">
    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id04').style.display='none'"
            class="cancelbtn close">&times;</button>
            <label for="room" style="color:white"><b>Remove Tourist Guide</b></label>
    </div>

    <div class="container">

        <input type="hidden" id="modalIdValue" class="subfield" name="id" value="<?php echo $entID ;?>" />


        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete the Tourist Guide ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id04').style.display='none'" class="btns"
                style="">No</button>
            <button type="submit" class="cancelbtn" value="Save" name="delete"
                style="margin-left:75px;">Yes</button>
        </div>
    </div>


</form>
</div>

<script>
function openModal(id) {
var modal = document.getElementById("id04");
var modalIdValue = document.getElementById("modalIdValue");
modalIdValue.value = id;
modal.style.display = "block";
}
</script>
</body>

</html>