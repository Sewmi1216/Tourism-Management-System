<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location: http://localhost/Tourism-Management-System/view-hotel/login.php");
}
if (isset($_GET['u'])) {
    $user = $_GET['u'];
}
// else {
//     $user_to = $message_obj->getMostRecentUser();
//     if ($user_to == false) {
//         $user_to = 'new';
//     }
// }

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

        <div class="wrappers1" style="margin-top:-45px;transform: translate(20%, 10%);">
            <section class="users">
                <div class="search">
                    <span class="text">Select an user to start chat</span>
                    <input type="text" placeholder="Enter name to search..." onkeyup="search()" id="find">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">
                    <?php
require_once "../controller/messageController.php";
$hotel = new messageController();
$results = $hotel->viewAllHotels();
foreach ($results as $result) {
    ?>
                    <div class="finder">
                        <a href="chat.php?u=<?php echo $result['name'] ?>">
                            <div class="content">
                                <?php echo "<img src='../images/" . $result['profileImg'] . "' style=
                    'border-radius: 50%;width:50px;height: 50px;background-size: 100%;
                    background-repeat: no-repeat;'>"; ?>

                                <div class="details">
                                    <span><?php echo $result["name"]; ?></span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="status-dot"><i class="fas fa-circle"></i></div>
                        </a>
                    </div>
                    
                    <?php }
?>
                </div>
            </section>
        </div>

        <div class="wrappers2" style="margin-top:-45px;transform: translate(-8%, 10%);">
            <section class="chat-area">
                <div class="chatTop">

                    <!-- <a href="chat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a> -->
                    <!-- <img src="" alt=""> -->
                    <div class="details">
                        <span><?php echo $user; ?></span>
                    </div>
                </div>
                <div class="chat-box">
                    <?php
$msg = new messageController();
echo $msg->getMessages($_SESSION["email"], $user);

?>
                </div>
                <form action="../api/chat.php" method="post" class="typing-area">
                    <input type="hidden" class="incoming_id" name="userLoggedIn"
                        value="<?php echo $_SESSION["email"]; ?>">
                    <input type="hidden" class="incoming_id" name="user_to" value="<?php echo $user; ?>">
                    <input type="text" name='message_body' id='message_textarea' class="input-field"
                        placeholder="Type a message here..." autocomplete="off">
                    <input type='submit' name='post_message' class='info' id='message_submit' value='Send'>
                    <!-- <button><i class="fab fa-telegram-plane"></i></button> -->
                </form>
            </section>
        </div>
    </section>
    <script src="js/chat.js"></script>
    
</body>

</html>