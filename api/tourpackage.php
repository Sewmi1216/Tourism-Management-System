<?php
include '../controller/tourpackageController.php';

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


  

    $rem_package = new tourpackageController();
    $rem_package->  restorepackage($id);

    echo "
    <script>
    window.location.href = '../view-admin/trash.php';
    </script>";
}

if (isset($_GET['delete']))
{
    $id = $_GET["packageID"];


    $tourpackagecon = new tourpackageController();
    $tourpackagecon-> deletePkg($id);

    echo "
    <script> window.location.href = '../view-admin/tourpackage.php';
    </script>";
}













?>