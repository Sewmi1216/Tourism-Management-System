<?php
session_start();

include '../model/admin.php';

class adminController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($username, $password)
    {
        $admin = new admin();
        session_start();

        $res = $admin->validate($username, $password);
        

        if (mysqli_num_rows($res) > 0) {
            

            $result = mysqli_fetch_assoc($res);
            

            if ($result['username'] == $username && $result['password'] == $password) {
                
                $_SESSION['username'] = $result['username'];
             

                header("Location: ../view/dashboard.php");
                exit();
                
            } else {
                header("Location: ../view/login.php");
                exit();
            }

        } 
        
        else 
        {
            header("Location: ../view/login.php");
            echo "<script type='text/javascript'>alert('Incorrect Password')>;</script>";
            exit();

        }

    }
    

}