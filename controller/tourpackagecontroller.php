<?php

// This is where the http request hits second.
// This is accessed to create the controller object.
// This is also accessed when a method inside is called.
include '../model/tourpackage.php';

class tourpackageController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

  

    public function addtourpackage($inputs)
    {
        $tourpackage = new tourpackage();
        

        $res = $tourpackage-> inserttourpackage($inputs);
        
        if (!$res) {
            echo 'Error Occured';
        }else{
            echo 'Successfully Added';
            header("Location: ../view-admin/tourpackages.php");
            
        }

    }

    public function updatetourpackage($inputs)
    {
        $tourpackage = new tourpackage();
        

        $res = $tourpackage-> updatetourpackage($inputs);
        
        if (!$res) {
            echo 'Error Occured';
        }else{
            echo 'Successfully updated';
            header("Location: ../view-admin/tourpackages.php");
            
        }

    }

    public function viewAllPkgs()
    {
        
        $pkg = new tourpackage();

        $result = $pkg->viewtourPkgs();

        $_SESSION['c'] = $result;
        return $result;

    }

    public function viewPkg($inputs)
    {
        
        $pkg = new tourpackage();
        

        $result = $pkg->viewtourPkg($inputs[0]);
        

        $_SESSION['c'] = $result;
        return $result;

    }

    public function deletePkg($inputs)
    {
        
        $pkg = new tourpackage();
        

        $result = $pkg->deletetourPkg($inputs[0]);
        

        $_SESSION['c'] = $result;
        return $result;

    }

    public function viewdeletedtourPkg()
    {
        $pkg = new tourpackage();
        
        $result = $pkg->viewdeletedtourPkg();
        
        $_SESSION['c'] = $result;
        return $result;
    }

    public function addtourpackageimg($typeid, $file)
    {
        $typeImg = new tourpackage();

        $result = $typeImg->addtourpackageImg($typeid, $file);

        return $result;
       
    }

    public function viewAllImgs($getid)
    {
        $type = new tourpackage();
        $result = $type->viewAllImgs($getid);
        return $result;
    }

    public function deleteImg($id, $typeid)
    {
        $dl = new tourpackage();
        $dl->deleteImg($id);

        // if (!$dl) {
        //     echo 'There was a error';
        //     // echo "<script>console.log(res)</script>";
        // } else {
        //     echo "<script>
        // window.location.href = '../view-hotel/addPhotos.php?id=$typeid';
        // </script>";

        // }

    }
}