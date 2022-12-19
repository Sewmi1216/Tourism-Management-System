<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:hotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="text">Add Hotel Packages</div>

        <div class="registerForm">
            <form method="post" action="../api/addpkg.php" enctype="multipart/form-data">

                <table>
                    <tr class="row">
                        <td>
                            <div class="content">Hotel Package Name</div>
                        </td>
                        <td> <input type="text" class="subfield" name="pName" /></td>
                    </tr>
                    <tr class="row">
                        <td>
                            <div class="content">Description</div>
                        </td>
                        <td>
                            <textarea class="subfield" name="desc" rows="4" cols="50"></textarea>
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <div class="content">Status</div>
                        </td>
                        <td><input type="text" class="subfield" name="status" /></td>
                        <!-- <td> <select class="subfield" name="status" form="carform">
                                <option value="" selected>---Choose availability---</option>
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select></td> -->
                    </tr>
                    <tr class="row">
                        <td>
                            <div class="content">Price</div>
                        </td>
                        <td> <input type="number" min="0" class="subfield" name="price" /></td>
                    </tr>


                    <tr class="row">
                        <td>
                            <div class="content">Upload Image</div>
                        </td>
                        <td> <input type="file" class="subfield" name="file" /></td>
                    </tr>
                    <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->


                </table>

                <input type="submit" class="btn1" value="Save" name="save" />
            </form>
        </div>

    </section>

</body>

</html>