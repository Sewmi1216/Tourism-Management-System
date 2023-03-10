<?php

include '../model/payment.php';

class paymentController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

   
    public function viewAllPayments()
    {
        

        $payment = new payment();

        $result = $payment->viewAllPayments();

        // include "../view/payment.php";
        return $result;

    }

}
