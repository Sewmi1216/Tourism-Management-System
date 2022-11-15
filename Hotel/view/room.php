<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/room.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">Rooms</div>
        <a href="addRoom.php"><i class="fa-regular fa-square-plus" style="font-size:30px;margin-left:950px;"></i></a>
        <div class="model1">
            <div class="heading">Add Room</div>
            <i class="fa-sharp fa-solid fa-circle-xmark"
                style="float:right;margin-top:-35px;font-size:25px;margin-left:395px;"></i>
            <table>
                <tr class="row">
                    <td>
                        <div class="content">Hotel Package Name</div>
                    </td>
                    <td>
                        <select id="cars" class="subfield" name="carlist" form="carform">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                        </select>
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Room Number</div>
                    </td>
                    <td><input type="text" class="subfield" name="username" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Room Type</div>
                    </td>
                    <td> <input type="text" class="subfield" name="username" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Number of beds</div>
                    </td>
                    <td> <input type="number" class="subfield" name="username" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Status</div>
                    </td>
                    <td> <input type="text" class="subfield" name="username" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
            </table>
            <input type="submit" class="btn" style="padding:10px;margin-left:150px;" value="ADD ROOM" name="add">

        </div>
    </section>

</body>

</html>