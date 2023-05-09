<?php

include_once '../model/productCategory.php';

class productCategoryController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function addProductCategory($ctgName, $desc, $id)
    {
        $ctgs = new productCategory();

        $res = $ctgs->insertProductCategory($ctgName,$desc, $id);
        return $res;

    }
    public function addProductCategoryImg($categoryid, $file)
    {
        $categoryImg = new productCategory();

        $result = $categoryImg->addProductCategoryImg($categoryid, $file);

        return $result;
       

    }
    public function viewAllCategories($id)
    {
        $ctg = new productCategory();
        $result = $ctg->viewAllCategories($id);
        return $result;
    }
    public function viewAllImgs($getid)
    {
        $category = new productCategory();
        $result = $category->viewAllImgs($getid);
        return $result;
    }

    public function deleteImg($id, $typeid)
    {
        $cl= new productCategory();
        $cl->deleteImg($id);

      

    }
    public function viewCategory($pId)
    {
        $productctg = new productCategory();

        $results = $productctg->viewCategory($pId);
        return $results;

    }
    //  public function search($input)
    // {
    //     $hpkg = new hotelPkg();

    //     $results = $hpkg->searchPkg($input);

    //     // include "../view/room.php";
    //     return $results;

    // }

    public function updateCategory($id, $ctgName, $desc)
    {
        $pc = new productCategory();
        $pc->updateCategory($id, $ctgName, $desc);

        if (!$pc) {
            echo 'There was a error';
            // echo "<script>console.log(res)</script>";
        } else {

            echo "<script>
        window.location.href = '../view-entrepreneur/productCategory.php';
        </script>";

        }

    }
    public function deleteCategory($id)
    {
        $pc = new productCategory();
        $pc->deleteCategory($id);

       

    }
       public function viewPersons($id)
    {
        $productctg = new productCategory();

        $results = $productctg->viewPersons($id);

        return $results;

    }
}
