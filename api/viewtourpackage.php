<?php
include '../controller/tourpackageController.php';

$tourpackagecon = new tourpackageController();
$rows=$tourpackagecon-> viewAllPkgs();

if (isset($_POST['remove']))
{
    $id = $_POST['id'];

    $rem_package = new tourpackageController();
    $rem_package->deletePkg_permenent($id);

    echo "
    <script>
    window.location.href = '../view-admin/trash.php';
    </script>";
}















?>