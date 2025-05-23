<?php
session_start();
$user = "";

if (isset($_SESSION["email"]) && isset($_SESSION["adminID"])) {
    $id = $_SESSION["adminID"];
} else {
    header("location:../view-hotel/login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/admindashboard.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&display=swap" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Days+One&family=Montserrat:wght@500&display=swap');
</style>

</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">DASHBOARD OVERVIEW</div>

        <div style="margin-top:20px;margin-left:14px; margin-right:20px;" class="dashheading">
          <a href="manageusers.php"> <span class="b">
                User Requests
                <div style="margin-top:60px;font-size:40px;">     <?php
                      require_once "../controller/adminController.php";
                      $res1 = new adminController();
                      $results = $res1->viewpendingusers();
                      foreach($results as $result){
                      echo $result['total_count'] ;}
                      ?></div>
            </span>
          </a> 

          <a href="tourbooking.php">
            <span class="b">
                Tour Bookings
                <div style="margin-top:60px;font-size:40px;">
                      <?php
                      require_once "../controller/tourbookingController.php";
                      $res1 = new tourbookingController();
                      $results = $res1->countBooking();
                      foreach($results as $result){
                      echo $result['num_bookings'];}
                      ?>
                    </div>
                </div>
            </span>
          </a>

          <a href="view-tourguides.php">
            <span class="b">
                Tour guides
                <div style="margin-top:60px;font-size:40px;"> <?php
                      require_once "../controller/adminController.php";
                      $res1 = new adminController();
                      $results = $res1->viewtourguidecount();
                      foreach($results as $result){
                      echo $result['tourguide_count'];}
                      ?></div>
            </span>
          </a>

          <a href="payment.php">
            <span class="b">
                Monthly Revenue
                <div style="margin-top:60px;font-size:40px;">$18,130</div>
            </span>
          </a>
        </div>

        <div style="margin-top:20px;margin-left:40px;" class="chart">
            <span class="c">
                <br>
                Tour package Booking Chart
                <br>
                                    <?php
$pie = new hotelController();
$results= $pie->countRoomTypeReservations();
foreach ($results as $data) {
    $type[]=$data['room_type'];
    $reservations[]=$data['num_reservations'];

}
?>
                    <div class="piechart">
                        <canvas id="piechart"></canvas>
                    </div>
                </span>
                <span class="c">
                    Total Revenue
                    <br>
                    <!-- bar chart -->
                    <?php
$pie = new hotelController();
$results= $pie->revenue();
foreach ($results as $data) {
    $month[]=$data['month'];
    $revenue[]=$data['revenue'];

}
?>
                    <div class="barchart">
                        <canvas id="barchart"></canvas>
                    </div>
            </span>
            <span class="c">
                <br>
                Sales Revenue
                <br>
                <img src="../images/dashboard/piechart.png" alt="" style="width: 300px; height: auto">
            </span>
        </div>
    </section>


    <section>

    <div class="todo">

  
    <div id="myDIV" class="header">
                <h2 style="margin:5px">My To Do List</h2>
                <input type="text" id="myInput" placeholder="Title...">
                <span onclick="newElement()" class="addBtn">Add</span>
    </div>

        <ul id="myUL">
                <li>Contact the drivers</li>
                <li class="checked">Meeting with Tourism Bureu</li>
                <li>Meet George</li>
                <li>Camping tent set purchase </li>
                <li>Read a book</li>
                <li>Organize Tour packages to Galle</li>
        </ul>
  </div>


  
    <script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName(",todo LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('.todo ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement(".todo li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById(".todo myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>
  
    </section>
</body>
</html>