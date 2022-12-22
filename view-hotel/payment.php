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
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title">Payments</div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for rooms" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
                <span style="margin-left: 8px;">
                    <a href="addHotelPkg.php"><i class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span>
            </div>

        </div>
        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Payment ID</th>
                    <th class="tblh">Date</th>
                    <th class="tblh">Reservation ID</th>
                    <th class="tblh">Guest ID</th>
                    <th class="tblh">Type</th>
                    <th class="tblh">Price</th>
                    <th class="tblh">Status</th>
                </tr>
                <tr class="subtext tblrw">
                    <td class="tbld">R101</td>
                    <td class="tbld">P111</td>
                    <td class="tbld">Tom</td>
                    <td class="tbld">Single</td>
                    <td class="tbld">2022/02/14</td>
                    <td class="tbld">2022/02/16</td>
                    <td class="tbld">Occupied</td>
                </tr>
                <tr class="subtext tblrw">
                    <td class="tbld">R101</td>
                    <td class="tbld">P111</td>
                    <td class="tbld">Tom</td>
                    <td class="tbld">Single</td>
                    <td class="tbld">2022/02/14</td>
                    <td class="tbld">2022/02/16</td>
                    <td class="tbld">Occupied</td>
                </tr>
                <tr class="subtext tblrw">
                    <td class="tbld">R101</td>
                    <td class="tbld">P111</td>
                    <td class="tbld">Tom</td>
                    <td class="tbld">Single</td>
                    <td class="tbld">2022/02/14</td>
                    <td class="tbld">2022/02/16</td>
                    <td class="tbld">Occupied</td>
                </tr>
                <tr class="subtext tblrw">
                    <td class="tbld">R101</td>
                    <td class="tbld">P111</td>
                    <td class="tbld">Tom</td>
                    <td class="tbld">Single</td>
                    <td class="tbld">2022/02/14</td>
                    <td class="tbld">2022/02/16</td>
                    <td class="tbld">Occupied</td>
                </tr>
            </table>
        </div>
        </div>
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