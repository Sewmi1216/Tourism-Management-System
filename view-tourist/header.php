 <div class="nav" id="topnav">
     <a href="home.php" class="logo"><img src="../images/logo.png" alt="Logo" height="50px" width="90px"
             style="padding-left:10px;"></a>
     <div style="padding-top:15px;" class="middle">
         <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

         <?php
require_once "../controller/touristController.php";
$profile = new touristController();
$results = $profile->viewTouristProfile($id);
foreach ($results as $result) {
    ?>
         <a href="profile.php" style="margin-top:-8px;">
             <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='#' height='40px' width='40px'
                    style='padding-right:0px;border-radius:50%;'>"; ?></a>
         <?php }?>
         <a href="chat.php" style="margin-left:0px;"><i class="fa-solid fa-message fa-lg"
                style="font-size:18px;color:white;"></i></a>

         <a href="../api/logout.php">Log out</a>
         <a href="home.php#contact">Contact Us</a>
         <a href="home.php#about">About</a>
         <a href="accommodation.php">Accommodation</a>
         <a href="craftlist.php">Handicrafts</a>
         <a href="tourpackagelist.php">Tour Packages</a>
         <a href="home.php">Home</a>
     </div>
 </div>