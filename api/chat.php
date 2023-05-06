
<?php

include '../controller/messageController.php';

if (isset($_POST['post_message'])) {
    if (isset($_POST['message_body'])) {
        $body = $_POST['message_body'];
        $user_to = $_POST['user_to'];
        $user = $_POST['user'];
        $userLoggedIn = $_POST['userLoggedIn'];
        $date = date("Y-m-d H:i:s");
        $chat = new messageController();
        $chat->sendMessage($user_to, $userLoggedIn, $body, $date);

        header("Location: ../view-hotel/chat.php?u=$user&e=$user_to");
        exit();
    }
}
if (isset($_POST['tourist_post_message'])) {
    if (isset($_POST['message_body'])) {
        $body = $_POST['message_body'];
        $user_to = $_POST['user_to'];
        $user = $_POST['user'];
        $userLoggedIn = $_POST['userLoggedIn'];
        $date = date("Y-m-d H:i:s");
        $chat = new messageController();
        $chat->tsendMessage($user_to, $userLoggedIn, $body, $date);

        header("Location: ../view-tourist/chat.php?u=$user&e=$user_to");
        exit();
    }
}
if (isset($_POST['ent_post_message'])) {
    if (isset($_POST['message_body'])) {
        $body = $_POST['message_body'];
        $user_to = $_POST['user_to'];
        $user = $_POST['user'];
        $userLoggedIn = $_POST['userLoggedIn'];
        $date = date("Y-m-d H:i:s");
        $chat = new messageController();
        $chat->tsendMessage($user_to, $userLoggedIn, $body, $date);

        header("Location: ../view-entrepreneur/chat.php?u=$user&e=$user_to");
        exit();
    }
}
if (isset($_POST['admin_post_message'])) {
    if (isset($_POST['message_body'])) {
        $body = $_POST['message_body'];
        $user_to = $_POST['user_to'];
        $user = $_POST['user'];
        $userLoggedIn = $_POST['userLoggedIn'];
        $date = date("Y-m-d H:i:s");
        $chat = new messageController();
        $chat->tsendMessage($user_to, $userLoggedIn, $body, $date);

        header("Location: ../view-admin/chat.php?u=$user&e=$user_to");
        exit();
    }
}




