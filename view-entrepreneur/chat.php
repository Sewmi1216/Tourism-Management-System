<?php
session_start();
$user = "";

if (isset($_SESSION["email"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
    header("location:../view-hotel/login.php");
}
if (isset($_GET['u']) && isset($_GET['e'])) {
    $user = $_GET['u'];
    $mail = $_GET['e'];
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
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

                <div class="users-list load_conversations" style="height:485px;" id="scroll_messages">
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

                    <span class="text" style="font-size: 20px;">Tourists</span>
                    <hr>
                    <?php
require_once "../controller/messageController.php";
$hotel = new messageController();
$results = $hotel->viewAllTourists();
foreach ($results as $result) {
    ?>
                    <div class="finder">
                        <a href="chat.php?u=<?php echo $result['name'] ?>&e=<?php echo $result['email'] ?>">
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

        <div class="wrappers2" style="margin-top:-40px;transform: translate(-1%, 10%);">
            <section class="chat-area">
                <div class="chatTop">
                    <div class="details">
                        <span><?php echo $user; ?></span>
                    </div>
                </div>
                <div class="chat-box" id="scroll_messages" style="min-height:490px;">
                    <?php
$msg = new messageController();
echo $msg->getMessages($_SESSION["email"], $mail);

?>
                </div>
                <form action="../api/chat.php" method="post" class="typing-area">
                    <input type="hidden" class="incoming_id" name="userLoggedIn"
                        value="<?php echo $_SESSION["email"]; ?>">
                    <input type="hidden" class="incoming_id" name="user_to" value="<?php echo $mail; ?>">
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                    <input type="text" name='message_body' id='message_textarea' class="input-field"
                        placeholder="Type a message here..." autocomplete="off">
                    <input type='submit' name='ent_post_message' class='info' id='message_submit' value='Send'>
                    <!-- <button><i class="fab fa-telegram-plane"></i></button> -->
                </form>
            </section>
        </div>
    </section>

    <script src="../view-hotel/js/chat.js"></script>
</body>

</html>