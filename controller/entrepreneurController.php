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
    
public function addentrepreneur($bsinessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc)
{
	$user = new entrepreneur();

	$result = $user->insertentrepreneur($bsinessName, $address, $email,$phone, $fileImg, $username, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc);

	if (!$result) {
		echo 'There was a error';
	} else {
		echo "<script>alert('Your form was successfully submitted');
	window.location.href = '../view-hotel/hotelLogin.php';
	</script>";
	}
}
public function viewProfile($id)
    {
        $profile = new entrepreneur();
        $rs = $profile->viewProfile($id);
        return $rs;

    }

public function updateProfile($id,$businessName, $address, $email,$phone,$username, $password, $eName,$eNic,$ePhone, $eEmail)
{
    $result = new entrepreneur();
    $result> updateProfile ($id,$businessName, $address, $email,$phone,$username, $password, $eName,$eNic,$ePhone, $eEmail);

    if (!$result) {
        echo 'There was a error';
      
    } else {

        echo "<script>
    window.location.href = '../view-entrepreneur/profile.php';
    </script>";

    }

}

public function viewAll($id)
    {
        $entrepreneur= new entrepreneur();

        $results= $entrepreneur->viewAll($id);

        // include "../view/product.php";
        return $results;

    }




public function viewAllentrepreneurs(){
        $user = new entrepreneur();

        $result = $user-> viewAllentrepreneurs();

        $_SESSION['c'] = $result;
        return $result;


}

public function removeentrepreneur($id)
{

    $user = new entrepreneur();

    $result = $user-> removeentrepreneur($id);

    $_SESSION['c'] = $result;
    return $result;
}

public function removeentrepreneurrequest($id)
{

    $user = new entrepreneur();

    $result = $user-> removeentrepreneurrequest($id);

    $_SESSION['c'] = $result;
    return $result;
}

public function acceptentrepreneurrequest($id)
{

    $user = new entrepreneur();

    $result = $user-> acceptentrepreneurrequest($id);

    $_SESSION['c'] = $result;
    return $result;
}

public function viewdeletedentrepreneurs(){
    $user = new entrepreneur();

    $result = $user-> viewdeletedentrepreneurs();

    $_SESSION['c'] = $result;
    return $result;
}
}
?>

