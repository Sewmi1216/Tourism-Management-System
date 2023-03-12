<header>
    <a href="#default" class="logo"><img src="../images/logo.png" alt="Logo" height="40px" width="90px"
            style="margin-left:45px;padding-right:0px;"></a>
    <!-- <div style="font-size: 25px;line-height: 40px;color: rgba(37, 53, 81, 1);margin-top:10px;">Pack2Paradise</div> -->
    <div class="header-right">

        <?php
require_once "../controller/hotelController.php";
$profile = new hotelController();
$results = $profile->viewProfile($id);
foreach ($results as $result) {
    ?>
    <!-- <p>Hello </p> -->
        <a href="profile.php" style="margin-left:60px;margin-top:-8px;">
            <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='logo' height='40px' width='40px'
                    style='padding-right:0px;border-radius:50%;'>";?></a>
            <?php }?>
            <!-- <a href="chat.php" style="margin-left:60px;"><i class="fa-solid fa-message fa-lg"
                style="font-size:18px;color:white;"></i></a> -->
            <!-- <a class="active" href="../api/logout.php" style="padding:10px;margin-left:60px;">LOGOUT</a> -->
    </div>
</header>