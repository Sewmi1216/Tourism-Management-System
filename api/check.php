<?php
include '../controller/hotelController.php';

if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $hotel = new hotel();  // create a new hotel object
    $result = $hotel->checkUsername($username);  // call the checkUsername method of the hotel class

    $count = mysqli_num_rows($result); // use the $result variable instead of $check
    // var_dump($count);
    if ($count > 0) {
        echo "<span style='color:red;margin-left:15px;'>Hotel already exists</span>";
        echo "<script>$('#signup').prop('disabled',true);</script>";
    } else {
        echo "<span style='color:green;margin-left:15px;'>Hotel available for registration</span>";
        echo "<script>$('#signup').prop('disabled',false);</script>";

    }
}


