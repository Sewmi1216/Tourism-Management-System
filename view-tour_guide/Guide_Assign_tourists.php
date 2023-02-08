<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title">Assign Tourists </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for products" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
                
            </div>

        </div>
        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Profile</th>
                    <th class="tblh">Guest Name</th>
                    <th class="tblh">Email</th>
                    <th class="tblh">Phone</th>
                    <th class="tblh">Country</th>
                    <th class="tblh">Language</th>
                </tr>
                <tr class="subtext tblrw">
                    <td class="tblh"><img src="../images/profile.jpg" alt="Profile" width="90" height="60"></td>
                    <td class="tblh">Devid Frank</td>
                    <td class="tblh">devid@gmail.com</td>
                    <td class="tblh">0715624059</td>
                    <td class="tblh">England</td>
                    <td class="tbld">English</td>
                </tr>
                <?php
include "../controller/productController.php";
$productcont = new productController();
$res = $productcont->viewAll();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>
                
                
                <?php }
} else {
    echo "No results";
}
?>
            </table>
        </div>
        </div>
        </div>

    </section>
    <script>
    var model = $('.model');

    $('.add').click(function() {
        model.show();
    })
    $('.close').click(function() {
        model.hide();
    })
    // $('.btn').click(function() {
    //     model.hide();
    // })
    </script>
</body>

</html>




