<?php 
require('../api/viewhotelmanager.php');
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
                <div class="page-title"> Registered Hotel Managers </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for guides" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
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
                        <th class="tblh"> Manager Name</th>
                        <th class="tblh">NIC</th>
                        <th class="tblh">E-Mail Address</th>
                        <th class="tblh">Phone Number</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr>
                    <?php 
foreach ($rows as $row) {

echo ' <tr class="subtext tblrw">
                        
                        <td class="tbld">'.$row['managerName'].'</td>
                        <td class="tbld">'.$row['entrepreneurNic'].'</td>
                        <td class="tbld">'.$row['entrepreneurEmail'].'</td>
                        <td class="tbld">'.$row['entrepreneurPhone'].'</td>
                        <td class="tbld"><i class="fa-sharp fa-solid fa-bars art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-pen-to-square art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
        </tr> ';
                             }
?>  
                </table>
            </div>

            <!-- <div id="results">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Hotel Package</th>
                        <th class="tblh">Hotel Package Name</th>
                        <th class="tblh">Room Type</th>
                        <th class="tblh">Status</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr>
                    <tr class="subtext tblrw">
                       
                        <td class="tbld"><?php echo $row["packageName"] ?></td>
                        <td class="tbld"><?php echo $row["price"] ?></td>
                        <td class="tbld"><?php echo $row["price"] ?></td>
                        <td class="tbld"><?php echo $row["price"] ?></td>
                        <td class="tbld"><i class="fa-sharp fa-solid fa-bars art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-pen-to-square art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
                    </tr>
                
                </table>
            </div>
         -->

        </div>
        </div>














        <div id="id01" class="modal">

            <form class="modal-content animate" action="../api/addroomapi.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Add Room</b></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Tourist Guide Name</div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Tourist Guide User Name</div>
                            </td>
                            <td><input type="text" class="subfield" placeholder="Enter Tourist Guide Name" name="guidename" required>
                             
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content"> NIC</div>
                            </td>
                            <td>  <input type="text" class="subfield" placeholder="Enter Tourist Guide ID" name="nic" required>
                
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">E-Mail Address</div>
                            </td>
                            <td> <input type="text" class="subfield" placeholder="Tourist guide's email address" name="guideemail" required>
                            </td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">Address</div>
                            </td>
                            <td> <input type="text"  class="subfield" placeholder="Tourist guide's physical address" name="guideaddress" required>
                            </td>
                        </tr> 
                        
                        </tr>   
                        <tr class="row">
                            <td>
                                <div class="content">Phone Number</div>
                            </td>
                            <td>           <input type="text"  class="subfield"  placeholder="Contact number" name="guidephone" required>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Password</div>
                            </td>
                            <td> <input type="password"  class="subfield"  placeholder="Enter the password" name="guidepassword" required>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Re-Enter Password</div>
                            </td>
                            <td> <input type="password" class="subfield" placeholder="Re-enter the password" name="guidepassword2" required>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <td> <input type="text" class="subfield" name="status" required />
    
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                        <input type="submit" class="btn1" value="Save" name="save"/>
                </div>
            </form>
        </div>
    </section>

</body>

</html>