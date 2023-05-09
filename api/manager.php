
<?php
include '../controller/hotelController.php';


if (isset($_POST['delete']))
{

    $id = $_POST['id'];
    // print_r($id);
    // die();
    $rem_hotel = new hotelController();
    $rem_hotel->removehotel($id);

    echo "
    <script>
    window.location.href = '../view-admin/view-hotelmanagers.php';
         </script>";
}

if (isset($_POST['accept']))
{

    $id = $_POST['id'];

    // print_r($id);
    // die();

    $acc_hotel = new hotelController();
    $acc_hotel-> accepthotelrequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/manageusers.php';
         </script>";
}

if (isset($_POST['restore']))
{

    $id = $_POST['id'];

    // print_r($id);
    // die();

    $acc_hotel = new hotelController();
    $acc_hotel-> accepthotelrequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/trash.php';
         </script>";
}

if (isset($_POST['decline']))
{

    $id = $_POST['id'];

    // print_r($id);
    // die();

    $rem_hotel = new hotelController();
    $rem_hotel->removehotelrequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/manageusers.php';
         </script>";
}

if (isset($_POST['remove']))
{

    $id = $_POST['id'];

    // print_r($id);
    // die();

    $rem_hotel = new hotelController();
    $rem_hotel->removehotelrequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/trash.php';
         </script>";
}

?>