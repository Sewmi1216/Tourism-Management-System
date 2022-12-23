<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:HotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="page-title" style="margin:2vw 3vw;">Dashboard Overview</div>

        <div style="margin-top:20px;margin-left:10px;" class="dashheading">
            <span class="b">
                All Reservations
                <div style="margin-top:60px;font-size:40px;">20</div>
            </span>
            <span class="b">
                Cancelled Reservations
                <div style="margin-top:60px;font-size:40px;">2</div>
            </span>
            <span class="b">
                Reserved Rooms
                <div style="margin-top:60px;font-size:40px;">4</div>
            </span>
            <span class="b">
                Today's Revenue
                <div style="margin-top:60px;font-size:40px;">$250</div>
            </span>
        </div>

        <div style="margin-top:20px;margin-left:10px;" class="chart">
            <span class="c">
                Room Booking Chart
                <br>
                <img src="../images/pie.png" height="300px" width="300px" class="chartimg" />
            </span>
            <span class="c">
                Sales Revenue
                <br>
                <img src="../images/bar.png" alt="" height="300px" width="350px" class="chartimg" />
            </span>
        </div>






        <!-- chat box -->
        <div class="form-popup" id="myForm">
            <form action="#" class="form-container">

                <div id="container">
                    <aside>
                        <span onclick="document.getElementById('myForm').style.display='none'" class="close"
                            style="top:20px;right:2px;" title="Close Modal">&times;</span>
                        <header>
                            <input type="text" placeholder="search">
                        </header>
                        <ul>
                            <li>
                                <img src="../images/avt.png" alt="" height="50px" width="50px;">
                                <div>
                                    <h2>Sachini Perera</h2>
                                    <h3>
                                        <span class="status orange"></span>
                                        offline
                                    </h3>
                                </div>


                            <li>
                                <img src="../images/avt.png" alt="" height="50px" width="50px;">
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
                            <img src="../images/avt.png" alt="" height="50px" width="50px;">
                            <div>
                                <h2>Chat with Sachini Perera</h2>
                            </div>

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
                        <footer>
                            <textarea placeholder="Type your message"></textarea>

                            <a href="#">Send</a>
                        </footer>
                    </main>
                </div>
            </form>
        </div>

    </section>
    <script>
    function openChat() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeChat() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>
</body>

</html>