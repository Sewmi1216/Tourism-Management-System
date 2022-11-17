<?php

include '../model/hotel.php';

class hotelController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($username, $password)
    {
        $hotel = new hotel();
        session_start();

        $res = $hotel->validate($username, $password);

        if (mysqli_num_rows($res) > 0) {
            // echo "print";

            $result = mysqli_fetch_assoc($res);

            if ($result['username'] == $username && $result['password'] == $password) {
                if ($result['status'] == 1) {
                    $_SESSION['username'] = $result['username'];
                    $_session['hotelID'] = $result['hotelID'];

                    header("Location: ../view/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Try again shortly');</script>";
                }
            } else {
                $_SESSION["error"] = "Password does not match";

            }
        } else {
            //header("Location: ../include/login.php?error=The username is taken try another");
           // echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
            //header("Location: ../include/login.php");
            //exit();
            $_SESSION["error"] = "Username does not match";

        }

    }
    public function addHotel($hotelName, $address, $email, $phone, $fileImg, $username, $password ,$mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        $user = new hotel();

        $result = $user->insertHotel($hotelName, $address, $email, $phone, $fileImg, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc);

        if (!$result) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {
            // include "../api/addhotelapi.php";
            // move_uploaded_file($ptempname, $folderImg);
            // move_uploaded_file($dtempname, $folderDoc);

            echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view/login.php';
        </script>";
        }
    }

}
