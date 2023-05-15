
<?php
include '../controller/tourpackagecontroller.php';


$id = $_GET["packageID"];


$tourpackagecon = new tourpackageController();
$tourpackagecon-> deletePkg($id);

echo "
             <script>alert('Tour package deletation is successful');
        window.location.href = '../view-admin/tourpackages.php';
        </script>";

?>