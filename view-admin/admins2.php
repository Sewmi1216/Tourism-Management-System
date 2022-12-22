<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/admins.css">
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
        <div class="text">ADMINISTRATION</div>

        <div class="content">

        <div class="booked-packages">
          <div class="add">  
            <h3>ADMIN DETAILS</h3> 
            <a href="addadmin.php"><i class=""></i> ADD ADMIN</a>
        </div>

            <div class="booked-packages-list">
                <div class="booked-packages-card">
                  <a href=""> <img src="../images/Admin/admin.png" alt="images"></a> 
                    <div class="details">
                        <h5>Peter</h5>
                        <div class="tour-dates">
                            <i class="bi bi-calendar-event"></i> 
                            <div class="btn">
                                <button type="button" class="viewbtn">VIEW</button>
                                <button type="button" class="editbtn">EDIT</button>
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





</body>

</html>