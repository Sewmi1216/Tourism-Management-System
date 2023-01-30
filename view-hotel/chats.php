<div class="form-popup" id="myForm">
    <form action="#" method="post" class="form-container">

        <div id="container">
            <aside>
                <span onclick="document.getElementById('myForm').style.display='none'" class="close"
                    style="top:20px;right:2px;" title="Close Modal">&times;</span>
                <header>
                    <input type="text" placeholder="search">
                </header>
                <ul class="gallery">
                    <?php
require_once "../controller/chatController.php";
$chat = new chatController();
$result = $chat->viewAllUsers();
foreach ($result as $user) {
        ?>
                    <!-- <a href="#sew?userId=<?php echo $userId=$user['userID']; ?>"> -->
                        <li id="<?php $user['userID']?>" data-touserid="<?php $user['userID']?>" data-tousername="<?php $user['username']?>">

                            <?php echo "<img src='../images/" . $user['profileImg'] . "' style=
                    'border-radius: 50%;width:50px;height: 50px;background-size: 100%;
                    background-repeat: no-repeat;'>"; ?>
                            <div>
                                <h2><?php echo $user["name"]?></h2>
                                <h3>
                                    <span class="status orange"></span>
                                    offline
                                </h3>
                            </div>

                        </li>
                    <!-- </a> -->
                    <?php }
?>

                </ul>
            </aside>
            <main>
                <header id="userSection">
                    <?php foreach ($result as $user) { ?>
                    <img src="../images/avt.png" alt="" height="50px" width="50px;">
                    <div>
                        <h2>Chat with <?php echo $user['userID']?></h2>
                    </div>
                    <?php }?>
                </header>
                <ul id="chat">
                    <li class="me">
                        <div class="entete">
                            <h3>10:12AM, Today</h3>
                            <h2>Sachini</h2>
                            <span class="status blue"></span>
                        </div>
                        <div class="triangle"></div>
                        <div class="message">
                            Hello! How can I help you?
                        </div>
                    </li>

                </ul>
                <footer id="conversation">
                    <textarea placeholder="Type your message"></textarea>

                    <a href="#">Send</a>
                </footer>
            </main>
        </div>
    </form>
</div>

</section>
<script type="text/javascript">
function openChat() {
    document.getElementById("myForm").style.display = "block";
}

function closeChat() {
    document.getElementById("myForm").style.display = "none";
}


</script>