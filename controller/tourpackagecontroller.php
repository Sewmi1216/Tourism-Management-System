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
        
        $updtourpackage = new tourpackage();
        
        $result = $updtourpackage-> updatetourpackage($inputs);
        
         $_SESSION['c'] = $result;
        return $result; 
            
            
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

    public function deletePkg($id)
    {
        
        $pkg = new tourpackage();
        

        $result = $pkg->deletetourPkg($id);
        

        $_SESSION['c'] = $result;
        return $result;

        if ($result) {
            echo 'Error Occured';
        }else{
            echo 'Successfully Added';
            header("Location: ../view-admin/tourpackages.php");
            
        }

    }

    
    public function deletePkg_permenent($id)
    {
        
        $pkg = new tourpackage();
        

        $result = $pkg->deletePkg_permenent($id);
        

        $_SESSION['c'] = $result;
        return $result;

    }

    public function restorepackage($id)
    {
        
        $pkg = new tourpackage();
        

        $result = $pkg->restorepackage($id);
        

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

    public function addtourpackageimg($package_id, $file)
    {
        $typeImg = new tourpackage();

        $result = $typeImg->addtourpackageimg($package_id, $file);

        return $result;
       
    }
   

    public function viewAllImgs($getid)
    {
        $type = new tourpackage();
        $result = $type->viewAllImgs($getid);
        return $result;
    }

    
    public function viewAllpckgImgs($getid)
    {
        $type = new tourpackage();
        $result = $type->viewAllImgs($getid);
        return $result;
    }
    
   

    public function deleteImg($id)
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