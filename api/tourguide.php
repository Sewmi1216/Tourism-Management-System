
<?php
include '../controller/tourguidecontroller.php';


if (isset($_POST['delete']))
{

    $id = $_POST['id'];
    // print_r($id);
    // die();
    $rem_tourguide = new tourguidecontroller();
    $rem_tourguide->removetourguide($id);

    echo "
    <script>
    window.location.href = '../view-admin/view-tourguide.php';
         </script>";
}

if (isset($_POST['accept']))
{

    $id = $_POST['id'];

    $acc_tourguide = new tourguidecontroller();
    $acc_tourguide-> accepttourguiderequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/manageusers.php';
         </script>";
}

if (isset($_POST['restore']))
{

    $id = $_POST['id'];

    $acc_tourguide = new tourguidecontroller();
    $acc_tourguide-> accepttourguiderequest($id);

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

    $rem_tourguide = new tourguidecontroller();
    $rem_tourguide->removetourguiderequest($id);

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

    $rem_tourguide = new tourguidecontroller();
    $rem_tourguide->removetourguiderequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/trash.php';
         </script>";
}

if (isset($_POST['update']))
{

    $id = $_POST['id'];

    // print_r($id);
    // die();

    $rem_tourguide = new tourguidecontroller();
    $rem_tourguide->removetourguiderequest($id);

    echo "
    <script>
    window.location.href = '../view-admin/manageusers.php';
         </script>";
}

?>