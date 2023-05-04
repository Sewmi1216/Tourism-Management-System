
<?php

include '../controller/messageController.php';

if (isset($_POST['post_message'])) {
    if (isset($_POST['message_body'])) {
        $body = $_POST['message_body'];
        $user_to = $_POST['user_to'];
        $userLoggedIn = $_POST['userLoggedIn'];
        $date = date("Y-m-d H:i:s");
        $chat = new messageController();
        $chat->sendMessage($user_to, $userLoggedIn, $body, $date);

        header("Location: ../view-hotel/chat.php?u=$user_to");
        exit();
    }
}

