<?php
include '../controller/touristController.php';


if (isset($_POST['reserve'])) {
    $touristID = $_POST['id'];
    $hotelId = $_POST['hotelId'];
    $typeID = $_POST['typeid'];


    $total_amount =$_POST['total-amount'];
    $guestName = $_POST['guestName'];
    $guestPhone = $_POST['guestPhone'];
    $guestEmail = $_POST['guestEmail'];

    // $bookingDateTime='2023-03-13 23:12:11.000000';
    // $bookingDateTime=$_POST[]
    // $total_amount = 1500;
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];
    //    $touristID = $_POST['touristID'];

    // $touristID=3;
    // $hotelId=10;
    // $typeID=25;
    // $typeID = $_POST['typeID'];
    // $hotelId = $_POST['hotelId'];

    $reserve = new touristController();
    $reserve->insertReservation($bookingDateTime, $guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $typeID, $hotelId);
    if (!$reserve) {
        echo 'There was a error';
    } else {
        echo "
             <script>alert('Your reservation is successful');
        window.location.href = '../view/accommodation.php';
        </script>";
    }
}
