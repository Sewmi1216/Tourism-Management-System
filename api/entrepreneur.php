
<?php
include '../controller/entrepreneurcontroller.php';


if (isset($_POST['delete']))
{

    $id = $_POST['id'];
    // print_r($id);
    // die();
    $rem_entrepreneur = new entrepreneurController();
    $rem_entrepreneur->removeentrepreneur($id);

    echo "
    <script>
    window.location.href = '../view-admin/view-entrepreneur.php';
         </script>";
}

if (isset($_POST['accept']))
{

    $id = $_POST['id'];
    // print_r($id);
    // die();
    $acc_entrepreneur = new entrepreneurController();
    $acc_entrepreneur-> acceptentrepreneurrequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/manageusers.php';
         </script>";
}

if (isset($_POST['decline']))
{

    $id = $_POST['id'];

    // print_r($id);
    // die();

    $rem_entrepreneur = new entrepreneurController();
    $rem_entrepreneur->removeentrepreneurrequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/manageusers.php';
         </script>";
}

?>