
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/tourguide.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <script type="text/javascript">
    $(document).ready(function() {

        $('#search').keyup(function() {
            var input = $(this).val();
            //alert(input);
            if (search != '') {
                $.ajax({
                    url: "addpkg.php",
                    method: "POST",
                    data: {
                        input: input
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#results').html(data);
            }
        });
    });
    </script>

</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <!-- <div class="text">Hotel Packages</div> -->
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Registered Tour Guides </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for guides" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                
                </span>
            </div>

        </div>
        <div class="bg">
            <!-- <div class="search">
                <input type="search" class="subfield" style="margin-top:9px;margin-left:160px;" name="pName" />
                <button
                    style="cursor:pointer;margin-top:5px;margin-left:16px;border:0px white;background-color:white;"><i
                        class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>
            </div> -->

            <!-- <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for names.."
                title="Type in a name"> -->


            <div id="result">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Guide Name</th>
                        <th class="tblh">NIC</th>
                        <th class="tblh">E-Mail Address</th>
                        <th class="tblh">Phone Number</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr>



        <?php
require_once("../controller/tourguideController.php") ;
$tourguidecont = new tourguidecontroller();
$res = $tourguidecont->viewAllTourguides();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
      
        ?>

                    <tr class="subtext tblrw">
                        
                        <td class="tbld"><?php echo $row["name"] ?></td>
                        <td class="tbld"><?php echo $row["nic"] ?></td>
                        <td class="tbld"><?php echo $row["email"] ?></td>
                        <td class="tbld"><?php echo $row["phone"] ?></td>
                        <td class="tbld">
                            
                        
                  

                        <a href="tourguideprofile.php?tourguideID='<?php echo $row['tourguideID']; ?>'"><i class="fa-sharp fa-solid fa-bars art"></i></a></td>
                        <td class="tbld">  <a href="edittouristguide.php?tourguideID='<?php echo $row['tourguideID']; ?>'"> <i class="fa-solid fa-pen-to-square art"> </i></a></td>
                        <td class="tbld"><a onclick="openModal('.$row['tourguideID'].')"><i class="fa-solid fa-trash art"></i></a></td>
                 <?php   } } ?>

                    </tr>
                </table>
            </div>

          

        </div>
        </div>
        </div>
    </section>

    <!-- Delete Package  -->
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