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
if (isset($_POST['create_ppdf'])) {
    require_once '../libs/tcpdf/tcpdf.php';
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Payments");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(true, 10);
    $obj_pdf->SetFont('helvetica', '', 12);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '
      <h3 align="center">Payments</h3><br /><br />
      <table border="1" cellspacing="0" cellpadding="5">
           <tr>
                <th>Payment ID</th>
                    <th>Date</th>
                    <th>Reservation ID</th>
                    <th>Guest Phone number</th>
                    <th>Type</th>
                    <th>Total amount</th>
                    <th>Status</th>
           </tr>
      ';
    // $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);

    // Set headers to force download
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=\"Payments.pdf\"");

    // Output the PDF file contents
    $obj_pdf->Output('Payments.pdf', 'D');

    // Redirect back to the page where the button is located
    header("Location: ../view-hotel/payment.php");
    exit();
}

if (isset($_POST['create_rpdf'])) {
    require_once '../libs/tcpdf/tcpdf.php';
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Reservations");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(true, 10);
    $obj_pdf->SetFont('helvetica', '', 12);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '
      <h3 align="center">Reservations</h3><br /><br />
      <table border="1" cellspacing="0" cellpadding="5">
           <tr>
                    <th>Date</th>
                    <th>Reservation ID</th>
                    <th>Guest ID</th>
                    <th>Guest Name</th>
                    <th>Total amount</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Status</th>
                    <th>View</th>
           </tr>
      ';
    // $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);

    // Output the PDF content to the browser in a new tab
    $obj_pdf->Output('Reservations.pdf', 'I');

    // Redirect back to the page where the button is located
    header("Location: ../view-hotel/reservation.php");
    exit();
}
