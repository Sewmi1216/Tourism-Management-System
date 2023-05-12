<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["tourguideID"])) {
    $id = $_SESSION["tourguideID"];
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="../libs/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
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
                <div class="page-title"> Update availability </div>
            </div>
        </div>
        <div class="guide" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Update availability </div>
            </div>
        </div>
    </section>

</body>

</html>