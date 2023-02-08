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
        <div class="wrappers" style="margin:auto;transform: translate(-0%, 10%);">
            <section class="chat-area">
                <div class="chatTop">
                    
                    <a href="chat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <img src="" alt="">
                    <div class="details">
                        <span>Sewmi</span>
                    </div>
                </div>
                <div class="chat-box">

                </div>
                <form action="#" class="typing-area">
                    <input type="text" class="incoming_id" name="incoming_id" value="" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here..."
                        autocomplete="off">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
            <script src="js/chat.js"></script>
        </div>
    </section>
</body>

</html>