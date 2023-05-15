<?php 
require('../api/view-entrepreneur.php');
$rows = $_SESSION['c'];
?>


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
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">

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
        <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  /* width: 100%; */
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <!-- <div class="text">Hotel Packages</div> -->
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Registered Entrepreneurs </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for guides" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
               
                <span style="margin-left: 8px;">
                    <a onclick="document.getElementById('id01').style.display='block'"><i
                            class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
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
                        <th class="tblh"> Entrepreneur Name</th>
                        <th class="tblh">NIC</th>
                        <th class="tblh">E-Mail Address</th>
                        <th class="tblh">Phone Number</th>
                        <th class="tblh">View</th>
                       
                        <th class="tblh">Delete</th>
                    </tr>
                    <tr class="subtext tblrw">



<?php 
foreach ($rows as $row) {

echo ' <tr class="subtext tblrw">
                        
                        <td class="tbld">'.$row['businessName'].'</td>
                        <td class="tbld">'.$row['entrepreneurNic'].'</td>
                        <td class="tbld">'.$row['entrepreneurEmail'].'</td>
                        <td class="tbld">'.$row['entrepreneurPhone'].'</td>
                        <td class="tbld">   <a href="entrepreneurprofile2.php?entrepreneur_id='.$row['entID'].'"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>
                      
                     <td class="tbld"><a onclick="openModal('.$row['entID'].')"><i class="fa-solid fa-trash art"></i></a></td>
        </tr>
        '; }  ?>  
         
            </table>
            </div>

           

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

                              <input type="hidden" id="modalIdValue" class="subfield" name="id" value="<?php echo $entID ;?>" />


                              <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete the entrepreneur ?</p>

                              <div class="container" style="padding:10px;">
                                  <button type="button" onclick="document.getElementById('id04').style.display='none'" class="btns"
                                      style="">No</button>
                                  <button type="submit" class="cancelbtn" value="Save" name="delete" style="margin-left:75px;">Yes</button>
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





        
          
        </div>
</section>

</body>

</html>