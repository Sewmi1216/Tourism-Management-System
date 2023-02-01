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
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <?php include "nav.php"?>
    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="wrappers" style="margin:auto;transform: translate(-0%, 20%);">
            <section class="users">

                <div class="search">
                    <span class="text">Select an user to start chat</span>
                    <input type="text" placeholder="Enter name to search...">
                    <button><i class="fas fa-search"></i></button>
                </div>




                <div class="users-list">
                    <?php
require_once "../controller/chatController.php";
$ct = new chatController();
$result = $ct->viewAllUsers();
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
                    <a href="showChat.php?user_id=<?php echo $row['hotelID']?>">
                        <div class="content">
                            <?php echo "<img src='../images/" . $row['profileImg'] . "' style=
                    'border-radius: 50%;width:50px;height: 50px;background-size: 100%;
                    background-repeat: no-repeat;'>"; ?>

                            <div class="details">
                                <span><?php echo $row["name"]; ?></span>
                            </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>
                    <?php }
} else {
    echo "No users are available to chat";
}
?>
                </div>
            </section>
        </div>
    </section>
    <!-- <script src="js/chat.js"></script> -->

</body>

</html>