<?php

include '../model/entrepreneur.php';

class entrepreneurController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($username, $password){
		$entrepreneur = new entrepreneur();
		session_start();

			$res = $entrepreneur->validate($username, $password);

			if(mysqli_num_rows($res)>0){
				// echo "print";

				$result = mysqli_fetch_assoc($res);
				

				if($result['username']==$username && $result['password'] == $password){
					if($result['status']==1){
						$_SESSION['username'] = $result['username'];
						$_session['userID'] = $result['userID'];

						header("Location: ../view/Dashboardnew.php");
						exit();
					}
					else{
						echo "<script type='text/javascript'>alert('Try again shortly');</script>";
					}
				}
				else{
					exit();
				}
			} else {
				//header("Location: ../view/Login.php?error=The username is taken try another");
				echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
				//header("Location: ../view/Login.php");
				exit();

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
	window.location.href = '../view/login.php';
	</script>";
	}
}



}