<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Echat.css?v=<?php echo time(); ?>">

    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>


    <section class="home-section">
        <div id="container">
            <aside>
                <header>
                    <input type="text" placeholder="search">
                </header>
                <ul>
                    <li>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
                        <div>
                            <h2>Malindu Perera</h2>
                            <h3>
                                <span class="status orange"></span>
                                offline
                            </h3>
                        </div>


                    <li>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_06.jpg" alt="">
                        <div>
                            <h2>Udari Sharmila</h2>
                            <h3>
                                <span class="status green"></span>
                                online
                            </h3>
                        </div>
                    </li>
                </ul>
            </aside>
            <main>
                <header>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
                    <div>
                        <h2>Chat with Malindu Perera</h2>
                        <h3>already 1902 messages</h3>
                    </div>

                </header>
                <ul id="chat">
                    <li class="me">
                        <div class="entete">
                            <h3>10:12AM, Today</h3>
                            <h2>Malindu</h2>
                            <span class="status blue"></span>
                        </div>
                        <div class="triangle"></div>
                        <div class="message">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        </div>
                    </li>
                    <li class="me">
                        <div class="entete">
                            <h3>10:12AM, Today</h3>
                            <h2>entrepreneur</h2>
                            <span class="status blue"></span>
                        </div>
                        <div class="triangle"></div>
                        <div class="message">
                            OK
                        </div>
                    </li>
                </ul>
                <footer>
                    <textarea placeholder="Type your message"></textarea>

                    <a href="#">Send</a>
                </footer>
            </main>
        </div>

    </section>

</body>

</html>