<?php
require('../api/entrepreneurprofile.php');
$rows = $_SESSION['c'];


?>
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
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">

</head>

<body>
    

    <?php include "nav.php"?>
   


    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="text">Entrepreneur - Pending Approval</div>
        
        <div class="wrapper">
            <div class="left"> 

            <?php 
        foreach($rows as $row) 
        echo '   
                <img src="../Images/download2.jpg" alt="logo" height="150px" width="150px"
                    style="padding-right:0px;border-radius:50%;">
                <h3>'.$row['businessName'].'</h3>
                <p>'.$row['entrepreneurName'].'</p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Business Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p>'.$row['email'].'</p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p>'.$row['phone'].'</p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p>'.$row['address'].'</p>
                        </div>



                    </div>

                </div>
                <div class="projects">
                    <h3>Entrepreneur Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p>'.$row['entrepreneurName'].'</p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p>'.$row['entrepreneurNic'].'</p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p>'.$row['entrepreneurEmail'].'</p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p>'.$row['entrepreneurPhone'].'</p>
                        </div>



                    </div>

                </div>

                
                <br>  
                '; ?>

                <a onclick="openaModal('<?php echo $row['entID'] ?>')" class="button"> Approve Registration</a>
                <a onclick="opendModal('<?php echo $row['entID'] ?>')" class="button"> Decline</a>
                
            </div>
            </div>
           

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
        
        
    </section>
</body>

</html>