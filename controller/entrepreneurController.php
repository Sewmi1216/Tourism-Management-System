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
           

            $result1 = mysqli_fetch_assoc($res);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['username'] = $result1['username'];
                    $_SESSION['userID'] = $result1['userID'];

                    header("Location: ../view-entrepreneur/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Try again shortly');</script>";

                }
            } else {
                // $_SESSION["error"] = "Password does not match";
                $_SESSION["pwderror"] = "Password does not match";
                $_SESSION["attempts"]+= 1;
               

            }
        }
        

    }
    public function viewAll()
    {
        $entrepreneur = new entrepreneur();

        $result = $entrepreneur->viewAll();

        // include "../view/proedit.php";
        return $result;

    }
public function addentrepreneur($bsinessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc)
{
	$user = new entrepreneur();

	$result = $user->insertentrepreneur($bsinessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc);

	if (!$result) {
		echo 'There was a error';
	} else {
		echo "<script>alert('Your form was successfully submitted');
	window.location.href = '../view-entrepreneur/Login.php';
	</script>";
	}
}

public function updateentrepreneur($businessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc)
{
    $result = new entrepreneur();
    $result> updateentrepreneur ($businessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc);

    if (!$result) {
        echo 'There was a error';
      
    } else {

        echo "<script>
    window.location.href = '../view-entrepreneur/proedit.php';
    </script>";

    }

}


public function viewAllentrepreneurs(){
        $user = new entrepreur();

        $result = $user-> viewAllentrepreneurs();

        $_SESSION['c'] = $result;
        return $result;


}

}