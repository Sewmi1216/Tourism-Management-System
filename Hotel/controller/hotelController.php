<?php
include '../model/hotel.php';

$hotel = new hotel();

if(isset($_POST['signIn'])){
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];


    $res = $hotel->validate($username, $password);


    if(mysqli_num_rows($res)>0){
        // echo "print";

        $result = mysqli_fetch_assoc($res);

        if($result['username']==$username && $result['password'] == $password){
            $_SESSION['username'] = $result['username'];
            $_session['hotelID'] = $result['hotelID'];

            header("Location: ../include/recoverPwd.php");
            exit();
        }
        else{
            exit();
        }
    } else {
        //header("Location: ../include/login.php?error=The username is taken try another");
        echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
        exit();

    }
   
   
}

