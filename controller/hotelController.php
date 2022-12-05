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
        $hoteluser = new hotel();
        $res = $hoteluser->validate($username);

        if (mysqli_num_rows($res[0]) > 0) {

            $result1 = mysqli_fetch_assoc($res[0]);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['username'] = $result1['username'];
                    $_SESSION['hotelID'] = $result1['hotelID'];

                    header("Location: ../view-hotel/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please try again shortly');</script>";

                }
            } else {
                // $_SESSION["error"] = "Password does not match";
                $_SESSION["attempts"] += 1;
                echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else if (mysqli_num_rows($res[1]) > 0) {

            $result1 = mysqli_fetch_assoc($res[1]);
            if ($result1['password'] == $password) {

                $_SESSION['username'] = $result1['username'];
                $_SESSION['touristID'] = $result1['touristID'];

                // header("Location: ../view-hotel/home.php");
                exit();

            } else {
                $_SESSION["attempts"] += 1;
                echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else if (mysqli_num_rows($res[2]) > 0) {

            $result1 = mysqli_fetch_assoc($res[2]);
            if ($result1['password'] == $password) {

                $_SESSION['username'] = $result1['username'];
                $_SESSION['adminID'] = $result1['adminID'];

                header("Location: ../view-hotel/resetPwd.php");
                exit();

            } else {
                $_SESSION["attempts"] += 1;
                echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else if (mysqli_num_rows($res[3]) > 0) {

            $result1 = mysqli_fetch_assoc($res[3]);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['username'] = $result1['username'];
                    $_SESSION['entID'] = $result1['entID'];

                    // header("Location: ../view-hotel/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please try again shortly');</script>";

                }
            } else {
                $_SESSION["attempts"] += 1;
                echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        }
        else if (mysqli_num_rows($res[4]) > 0) {

            $result1 = mysqli_fetch_assoc($res[4]);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['username'] = $result1['username'];
                    $_SESSION['tourguideID'] = $result1['tourguideID'];

                    // header("Location: ../view-hotel/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please try again shortly');</script>";

                }
            } else {
                $_SESSION["attempts"] += 1;
                echo "<script type='text/javascript'>alert('Password is incorrect');</script>";

            }
        } else {
            $_SESSION["attempts"] += 1;
            echo "<script type='text/javascript'>alert('Username is incorrect');</script>";

        }

    }
    public function addHotel($hotelName, $address, $email, $phone, $fileImg, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc)
    {
        $user = new hotel();

        $result = $user->insertHotel($hotelName, $address, $email, $phone, $fileImg, $username, $password, $mName, $mPhone, $mEmail, $mNic, $fileDoc);

        if (!$result) {
            echo 'There was a error';
        } else {
            echo "<script>alert('Your form was successfully submitted');
        window.location.href = '../view-hotel/hotelLogin.php';
        </script>";
        }
    }

}
