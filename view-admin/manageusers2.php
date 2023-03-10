<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/dashboard.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="../css/manageusers.css">

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
        <div class="text">MANAGE USERS</div>
        <div class="content">

        <div class="booked-packages">
          <div class="add">  
           
            <a href="view-entrepreneur.php"><i class=""></i> VIEW ENTREPRENEURS</a>
        </div>

            <div class="booked-packages-list">
                <div class="booked-packages-card">
                  <a href=""> <img src="../images/admin/admin.png" alt="images" id="myBtn"></a> 
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="tourguideprofile2.php.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="booked-packages-card">
                 <a href="">  <img src="../images/admin/admin.png" alt="images"></a> 
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="tourguideprofile2.php.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="booked-packages-card">
                   <a href=""><img src="../images/admin/admin.png" alt="images"></a> 
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="tourguideprofile2.php.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="booked-packages-card">
                   <a href=""><img src="../images/admin/admin.png" alt="images"></a> 
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="tourguideprofile2.php.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="add">  
                    <h3>HOTEL MANAGER APPROVAL</h3> 
                 <a href="view-hotelmanager.php"><i class=""></i> VIEW HOTEL MANAGERS</a>
                </div>
                <div class="booked-packages-card">
                  <a href="">  <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i>


                          <div class="btn">
                          <a href="tourguideprofile2.php.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                            <button type="button" class="editbtn">APPROVE</button>
                            <button type="button" class="deletebtn">DELETE</button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="booked-packages-card">
                   <a href=""> <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="tourguideprofile2.php.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>

              
                <div class="booked-packages-card">
                   <a href=""> <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="touristprofile2.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="booked-packages-card">
                   <a href=""> <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="touristprofile2.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="booked-packages-card">
                   <a href=""> <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="touristprofile2.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>


                <div class="add">  
                    <h3>TOURIST GUIDE APPROVAL</h3> 
                 <a href="tourguides.php"><i class=""></i> VIEW TOURIST GUIDE</a>
                </div>

                <div class="booked-packages-card">
                   <a href=""> <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="touristprofile2.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="booked-packages-card">
                   <a href=""> <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="touristprofile2.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="booked-packages-card">
                   <a href=""> <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="touristprofile2.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="booked-packages-card">
                   <a href=""> <img src="../images/admin/admin.png" alt="images"></a>
                    <div class="details">
                        <h5>Passikudah</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                            <a href="touristprofile2.php?package_id='.$row['package_id'].'"> <button type="button" class="viewbtn"> VIEW </button></a> 
                                <button type="button" class="editbtn">APPROVE</button>
                                <button type="button" class="deletebtn">DELETE</button>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>









            </div>

            
        </div>
    </div>

    

    </section>


    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


</body>

</html>