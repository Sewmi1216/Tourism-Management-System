<?php
include '../controller/tourpackageController.php';

$tourpackagecon = new tourpackageController();
$rows=$tourpackagecon-> viewAllPkgs();

if (isset($_GET['remove']))
{
    $id = $_GET['id'];            

    $rem_package = new tourpackageController();
    $rem_package ->  deletePkg_permenent($id);

    echo "
    <script>
    window.location.href = '../view-admin/trash.php';
    </script>";
}

if (isset($_GET['restore']))
{
    $id = $_GET['id'];


    // print_r($id);
    // die();

    $rem_package = new tourpackageController();
    $rem_package->  restorepackage($id);

    echo "
    <script>
    window.location.href = '../view-admin/trash.php';
    </script>";
}














?>