<?php
include '../controller/touristController.php';


if (isset($_POST['reserve'])) {
    $guestName = $_POST['guestName'];
    $guestPhone = $_POST['guestPhone'];
    $guestEmail = $_POST['guestEmail'];

    $bookingDateTime='2023-03-13 23:12:11.000000';
    $total_amount = 1500;
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];
    //    $touristID = $_POST['touristID'];

    $touristID=3;
    $hotelId=10;
    $typeID=25;
    // $typeID = $_POST['typeID'];
    // $hotelId = $_POST['hotelId'];

    $reserve = new touristController();
    $reserve->insertReservation($bookingDateTime, $guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $typeID, $hotelId);
    if (!$reserve) {
        echo 'There was a error';
    } else {
        echo "
             <script>
        window.location.href = '../view/accommodation.php';
        </script>";
    }
}
