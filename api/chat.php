
<?php

include '../controller/chatController.php';

$chat = new chatController();

if ($_POST['action'] == 'show_chat') {
    $chat->showUserChat($_SESSION['userId'], $_POST['to_user_id']);
}
