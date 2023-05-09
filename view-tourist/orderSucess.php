<?php
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Success</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourpackage.css">
    <link rel="stylesheet" href="../css/hotel.css">

</head>

<body>
    <?php include "header.php"?>

    <section class="hotel1" id="hotel" style="margin-bottom: 50px;">

    <div>Order is placed</div>
        </setion>

        <?php include "footer.php"?>

        <script src="../view-hotel/js/home.js"></script>
</body>

</html>