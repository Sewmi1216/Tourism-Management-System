<?php

include '../model/order.php';

class orderController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }
    
    public function insertCraftOrder($touristID, $orderItems, $name, $phone, $address, $total, $email)
    {
        $booking = new order();
        $res = $booking->insertCraftOrder($touristID, $orderItems, $name, $phone, $address, $total);

        require "../libs/PHPMailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'sewmi.rotaract3220@gmail.com';
        $mail->Password = 'uaqgejykofzquoaf';

        $mail->setFrom('sewmi.rotaract3220@gmail.com', 'Craft Order');

        $mail->addAddress($email);

        // HTML body
        $mail->isHTML(true);
        $mail->Subject = "Your have placed a craft order";
        $mail->Body = "<b>Dear User</b>
                    <h3>Your have placed a craft order</h3>";

        if (!$mail->send()) {?>
        <script>
        alert("<?php echo "Error sending email to " . $email ?>");
        </script>
        <?php
}
    }
}
