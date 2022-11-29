<?php

include '../model/entrepreneur.php';

class entrepreneurController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($username, $password)
    {
        $entrepreneuruser = new entrepreneur();
        $res = $entrepreneuruser->validate($username);

        if (mysqli_num_rows($res) > 0) {
            // echo "print";

            $result = mysqli_fetch_assoc($res);

            if ($result['password'] == $password) {
                if ($result['status'] == 1) {
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['enrepreneurID'] = $result['entrepreneurID'];

                    header("Location: ../view/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Try again shortly');</script>";

                }
            } else {
                // $_SESSION["error"] = "Password does not match";
                // $_SESSION["attempts"]+= 1;
                echo "<script type='text/javascript'>alert('Password does not match');</script>";


            }
        } else {
            //header("Location: ../include/Login.php?error=The username is taken try another");
           // echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
            //header("Location: ../include/Login.php");
            //exit();
            // $_SESSION["attempts"] += 1;
            echo "<script type='text/javascript'>alert('Username does not match');</script>";

            // $_SESSION["error"] = "Username does not match";

        }

    }
public function addentrepreneur($bussinessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc)
{
	$user = new entrepreneur();

	$result = $user->insertentrepreneur($bussinessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc);

	if (!$result) {
		echo 'There was a error';
	} else {
		echo "<script>alert('Your form was successfully submitted');
	window.location.href = '../view/Login.php';
	</script>";
	}
}



}