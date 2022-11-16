<?php

include '../model/hotel.php';

class hotelController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($username, $password){
		$hotel = new hotel();
		session_start();

			$res = $hotel->validate($username, $password);

			if(mysqli_num_rows($res)>0){
				// echo "print";

				$result = mysqli_fetch_assoc($res);
				

				if($result['username']==$username && $result['password'] == $password){
					if($result['status']==1){
						$_SESSION['username'] = $result['username'];
						$_session['hotelID'] = $result['hotelID'];

						header("Location: ../view/recoverPwd.php");
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
				//header("Location: ../include/login.php?error=The username is taken try another");
				echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
				//header("Location: ../include/login.php");
				exit();

			}

}



}

