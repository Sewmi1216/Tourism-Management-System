<?php
include_once '../controller/productCategoryController.php';

if (isset($_POST['save'])) {
    $ctgName = $_POST['cName'];
    // $price = $_POST['price'];
    $desc = $_POST['desc'];

    $id = $_POST['id'];

    $ctgcon = new productCategoryController();
    $ctgcon->addProductCategory($ctgName, $desc, $id);
    if (!$ctgcon) {
        echo 'There was a error';
    } else {
        echo "
             <script>
        window.location.href = '../view-entrepreneur/productCategory.php';
        </script>";
    }

    //  move_uploaded_file($tempname, $folder);
}

if (isset($_POST['submitImg'])) {
    $categoryid = $_POST['id'];

    $file = $_FILES['file']['name'];

    $filename = $_FILES["file"]["name"];

    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../images/" . $filename;

    $categorycon = new productCategoryController();
    $categorycon->addProductCategory($categoryid, $file);

    move_uploaded_file($tempname, $folder);
    if (!$categorycon) {
        echo 'There was a error';
    } else {
        echo "
             <script>
             window.location.href = '../view-entrepreneur/addPhotos.php?id=$categoryid';

        </script>";


    }
}
if (isset($_POST['deleteimg'])) {
    $id = $_POST['id'];
    $imgname = $_POST['imgname'];
    $categoryid = $_POST['categoryid'];

    $pk = new productCategoryController();
    $pk->deleteImg($id, $categoryid);
    unlink("../images/" . $imgname);
     echo "
             <script>
             window.location.href = '../view-entrepreneur/addPhotos.php?id=$categoryid';
                  </script>";

}

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $ctgName = $_POST['cName'];
    // $price = $_POST['price'];
    $desc = $_POST['desc'];
    // $status = $_POST['status'];

    $pk = new productCategoryController();
    $pk->updateCategory($id, $ctgName, $desc);

}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $pk = new productCategoryController();
    $pk->deleteCategory($id);
}

if (isset($_POST["get_data"])) {
    // Get the ID of customer user has selected
    $id = $_POST["id"];

    $category = new productCategoryController();
    $result = $category->viewCategory($id);
    $row = mysqli_fetch_object($result);

    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
}


?>