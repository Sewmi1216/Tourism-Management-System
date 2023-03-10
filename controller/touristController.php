<?php


include '../model/tourist.php';
include '../model/admin.php';


class touristController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($username, $password)
    {
        $tourist = new tourist();
        

        $res = $tourist->validate($username, $password);
        

        if (mysqli_num_rows($res) > 0) {
            

            $result = mysqli_fetch_assoc($res);
            

            if ($result['email'] == $username && $result['password'] == $password) {
                
                $_SESSION['username'] = $result['username'];
                $_SESSION['touristID'] = $result['userID'];
                
                 header("Location: ../view/craft_list.php");

                exit();
                
            } else {
                header("Location: ../view/login.php");
                exit();
            }
        } else {
            header("Location: ../view/login.php");
            echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
            exit();

        }

    }

    public function userSignup($inputs)
    {
        $tourist = new tourist();
        $mailcheck = $tourist->checkmail($inputs[2]);

        if($mailcheck > 0){
            $_SESSION['err']= "Email is already registered";
            header("Location: ../view/sign.php");
        }
        else{
            $res = $tourist->insertTourist($inputs);
            if (!$res) {
                echo 'Error Occured';
            }else{
                echo 'Successfully Added';
                header("Location: ../view/login.php");
                
            }
        }

    }
     public function userLogout()
    {
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: ../view/login.php");

    }

    public function addcart($quantity, $productID,$tourist_id){
        $tourist = new tourist();
        $row = $tourist->checkproid($productID);
        
        if( $row > 0) {
             $res = $tourist->updateToCart($quantity, $productID, $tourist_id);
             if (!$res) {
                echo 'Error Occured';
            }else{
                echo 'Successfully Added';
                header("Location: ../view/cart.php");
                
            }
        }
        else{
            $res = $tourist->insertToCart($quantity, $productID, $tourist_id);
            if (!$res) {
                echo 'Error Occured';
            }else{
                echo 'Successfully Added';
                header("Location: ../view/cart.php");
                
            }
        }
    }
    
    public function viewAlltourist()
    {
        
        $pkg = new tourist();

        $result = $pkg->viewAdmin();

        $_SESSION['c'] = $result;
        return $result;

    }

}
