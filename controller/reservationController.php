<?php

include '../model/reservation.php';

class reservationController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function insertReservation($email, $guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId)
    {
        $reservation = new tourist();
        $res = $reservation->insertReservation($guestName, $guestPhone, $guestEmail, $total_amount, $checkInDate, $checkOutDate, $touristID, $roomno, $hotelId);

        require "../libs/PHPMailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        // h-hotel account
        $mail->Username = 'sewmi.rotaract3220@gmail.com';
        $mail->Password = 'uaqgejykofzquoaf';

        // send by h-hotel email
        $mail->setFrom('sewmi.rotaract3220@gmail.com', 'Reservation');
        // get email from input
        $mail->addAddress($email);
        //$mail->addReplyTo('lamkaizhe16@gmail.com');

        // HTML body
        $mail->isHTML(true);
        $mail->Subject = "Your have placed a reservation";
        $mail->Body = "<b>Dear User</b>
                    <h3>Your have placed a reservation</h3>";

        if (!$mail->send()) {?>
        <script>
        alert("<?php echo "Error sending email to " . $email ?>");
        </script>
        <?php
}
    }
    public function searchForReport($from, $to, $id)
    {
        $reservation = new reservation();
        return $reservation->searchForReport($from, $to, $id);
    }
     public function viewhotelPayments($id)
    {
        $hoteluser3 = new reservation();
        return $hoteluser3->viewhotelPayments($id);
    }

}