<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location: http://localhost/Tourism-Management-System/view-hotel/login.php");
}
if (isset($_GET['u']) && isset($_GET['e'])) {
    $user = $_GET['u'];
    $mail = $_GET['e'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>
    <div class="wrappers1" style="margin-top:-45px;transform: translate(20%, 10%);">
        <section class="users">
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search..." onkeyup="search()" id="find">
                <button><i class="fas fa-search"></i></button>
            </div>

            <div class="users-list" style="height:485px;">
                <span class="text" style="font-size: 20px;">Administrator</span>
                <hr>
                <?php
require_once "../controller/messageController.php";
$hotel = new messageController();
$results = $hotel->viewAdmin();
foreach ($results as $result) {
    ?>
                <div class="finder">
                    <a href="chat.php?u=<?php echo $result['name'] ?>&e=<?php echo $result['email'] ?>">
                        <div class="content">
                           
                            <div class="details">
                                <span><?php echo $result["email"]; ?></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>
                </div>

                <?php }
?>
                <span class="text" style="font-size: 20px;">Hotels</span>
                <hr>
                <?php
require_once "../controller/messageController.php";
$hotel = new messageController();
$results = $hotel->viewAllHotels();
foreach ($results as $result) {
    ?>
                <div class="finder">
                    <a href="chat.php?u=<?php echo $result['name'] ?>&e=<?php echo $result['email'] ?>">
                        <div class="content">
                          

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

                <span class="text" style="font-size: 20px;">Local Entrepreneurs</span>
                <hr>
                <?php
require_once "../controller/messageController.php";
$hotel = new messageController();
$results = $hotel->viewAllEnts();
foreach ($results as $result) {
    ?>
                <div class="finder">
                    <a href="chat.php?u=<?php echo $result['businessName'] ?>&e=<?php echo $result['email'] ?>">
                        <div class="content">
                            

                            <div class="details">
                                <span><?php echo $result["businessName"]; ?></span>
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

    <div class="wrappers2" style="margin-top:-50px;transform: translate(-5%, 10%);max-width: 900px;">
        <section class="chat-area">
            <div class="chatTop">

                <!-- <a href="chat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a> -->
                <!-- <img src="" alt=""> -->
                <div class="details">
                    <span><?php echo $user; ?></span>
                </div>
            </div>
            <div class="chat-box" style="max-height:480px;min-height:480px;">
                <?php
$msg = new messageController();
echo $msg->getMessages($_SESSION["email"], $mail);

?>
            </div>
            <form action="../api/chat.php" method="post" class="typing-area">
                <input type="hidden" class="incoming_id" name="userLoggedIn" value="<?php echo $_SESSION["email"]; ?>">
                <input type="hidden" class="incoming_id" name="user_to" value="<?php echo $mail; ?>">
                <input type="hidden" name="user" value="<?php echo $user; ?>">
                <input type="text" name='message_body' id='message_textarea' class="input-field"
                    placeholder="Type a message here..." autocomplete="off">
                <input type='submit' name='tourist_post_message' class='info' id='message_submit' value='Send'>
                <!-- <button><i class="fab fa-telegram-plane"></i></button> -->
            </form>
        </section>
    </div>


    <div style="margin-top:700px;">
        <?php include "footer.php"?>
    </div>

    <script src="../view-hotel/js/chat.js"></script>
</body>

</html>