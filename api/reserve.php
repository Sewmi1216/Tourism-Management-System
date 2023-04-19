<?php
include '../controller/touristController.php';
include '../controller/hotelController.php';

// $reservationid = $_POST['reservationid'];
// $newStatus = $_POST['newstatus'];

// $update = new hotelController();
// $update->updateStatus($reservationid, $newStatus);

if (isset($_POST['search'])) {
    $id = $_POST['hotel'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $person = $_POST['person'];
    $room = $_POST['room'];

    $search = new touristController();
    $result = $search->availability($id, $checkin, $checkout, $person, $room);

//     //echo $result;
//      $row = mysqli_fetch_object($result);

// // Important to echo the record in JSON format
//     echo json_encode($row);
//     //echo 'print';

// // Important to stop further executing the script on AJAX by following line
// exit();

}
// if (isset($_POST['reserve'])) {
//     $touristID = $_POST['tid'];
//     $hotelId = $_POST['hid'];
//     $roomno = $_POST['roomno'];

//     $total_amount =$_POST['totalamount'];
//     $guestName = $_POST['guestName'];
//     $guestPhone = $_POST['guestPhone'];
//     $guestEmail = $_POST['guestEmail'];

//     // $bookingDateTime='2023-03-13 23:12:11.000000';
//     // $bookingDateTime=$_POST[]
//     // $total_amount = 1500;
//     $checkInDate = $_POST['checkInDate'];
//     $checkOutDate = $_POST['checkOutDate'];
//     $reserve = new touristController();
//     $reserve->insertReservation($guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId);
//     if (!$reserve) {
//         echo 'There was a error';
//     } else {
//         echo "
//              <script>alert('Your reservation is successful');
//         window.location.href = '../view/accommodation.php';
//         </script>";
//     }
if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];

    $type = new touristController();
    $result = $type->viewReservation($id);

    $row = mysqli_fetch_object($result);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}