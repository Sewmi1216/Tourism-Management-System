<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:hotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

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
  width: 80%; /* Could be more or less, depending on screen size */
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
        <div class="text">Rooms
            <div class="bg">
                <input type="search" class="search" style="margin-top:9px;margin-left:160px;" name="pName" />
                <button
                    style="cursor:pointer;margin-top:5px;margin-left:16px;border:0px white;background-color:white;"><i
                        class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>

                <button class="add" onclick="document.getElementById('id01').style.display='block'"><i class="fa-regular fa-square-plus" style="font-size:30px;"></i>
</button>
                </button>



                <div>
                    <table>
                        <tr class="heading tblrw">
                            <th class="tblh">Room Number</th>
                            <th class="tblh">Hotel Package ID</th>
                            <th class="tblh">Guest Name</th>
                            <th class="tblh">Room type</th>
                            <th class="tblh">From</th>
                            <th class="tblh">To</th>
                            <th class="tblh">Status</th>
                            <th class="tblh">Edit</th>
                            <th class="tblh">Delete</th>
                        </tr><?php
include "../controller/roomController.php";
$roomControl = new roomController();
$res = $roomControl->viewAllRooms();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>
                        <tr class="subheading tblrw">
                            <td class="tbld"><?php echo $row["roomNo"] ?></td>
                            <td class="tbld"><?php echo $row["hotelPkgID"] ?></td>
                            <td class="tbld"><?php echo $row["guestName"] ?></td>
                            <td class="tbld"><?php echo $row["type"] ?></td>
                            <td class="tbld"><?php echo $row["occupied_from"] ?></td>
                            <td class="tbld"><?php echo $row["occupied_to"] ?></td>
                            <td class="tbld"><?php echo $row["status"] ?></td>
                            <td class="tbld">Edit</td>
                            <td class="tbld">Delete</td>
                        </tr>
                        <?php }
} else {
    echo "No results";
}
?>
                    </table>
                </div>
            </div>

            <!-- <div class="model-container">
                <div class="model">
                    <div class="heading">Add Room</div>
                    <div class="close"> <i class="fa-sharp fa-solid fa-circle-xmark"
                            style="float:right;margin-top:-35px;font-size:25px;margin-left:395px;"></i>
                    </div>
                    <form action="../api/addroomapi.php" method="post">
                        <table>
                            <tr class="row">
                                <td>
                                    <div class="content">Hotel Package Name</div>
                                </td>
                                <td>
                                    <select id="cars" class="subfield" name="carlist" form="carform">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                                    <input type="text" class="subfield" name="hotelPkgId" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td>
                                    <div class="content">Room Number</div>
                                </td>
                                <td><input type="text" class="subfield" name="roomNo" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td>
                                    <div class="content">Room Type</div>
                                </td>
                                <td> <input type="text" class="subfield" name="type" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td>
                                    <div class="content">Number of beds</div>
                                </td>
                                <td> <input type="number" class="subfield" name="beds" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td>
                                    <div class="content">Status</div>
                                </td>
                                <td> <input type="text" class="subfield" name="status" required />
                                    <div class="subcontent">Room Number is required</div>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" class="btn" style="padding:10px;margin-left:150px;" value="ADD ROOM"
                            name="add">
                    </form>

                </div>
            </div> -->
            
    <div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
        </section>
    <!-- <script>
    var model = $('.model');

    $('.add').click(function() {
        model.show();
    })
    $('.close').click(function() {
        model.hide();
    })
    $('.btn').click(function() {
        model.hide();
    })
    </script> -->
    <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>

</html>