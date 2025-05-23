<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:login.php");
}
if(isset($_GET['id'])){
$getid = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>

    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">


</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Add Room Type Images</div>

            </div>

        </div>
        <div class="bg">
            <form class="" action="../api/addType.php" method="post" autocomplete="off" enctype="multipart/form-data">

                <input type="hidden" class="subfield" name="id" value="<?php if (isset($getid)) {echo $getid;}?>" />


                <label class="txt" for="image">Upload Image</label>
                <input type="file" class="subfield" style="width:30%;margin-left:25px;" name="file" accept=".jpg, .jpeg, .png" required />
                <button class="btnRegister" style="font-size:13px;width:10%;margin-left:20px;" type="submit" name="submitImg">Insert Image</button>
            </form>


            <table class="styled-table1" cellspacing=0px cellpadding=5px>
                <?php
require_once "../controller/roomTypeController.php";
$typeimg = new roomTypeController();

if (isset($getid)) { $id= $getid;}
$results = $typeimg->viewAllImgs($id);
foreach ($results as $result) {
    ?>
                <td>
                    <?php echo "<img src='../images/" . $result['image'] . "' style=
                    'width:150px;height: 150px;background-size: 100%;
                    background-repeat: no-repeat;'>"; ?>

                    <form action="../api/addType.php" method="post">

                        <input type="hidden" class="subfield" name="typeid"
                            value="<?php if (isset($getid)) {echo $getid;}?>" />

                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                        <input type="hidden" name="imgname" value="<?php echo $result['image']; ?>">
                        <button type="submit" name="deleteimg" class="btnDel-icon"><i
                                class="fas fa-trash-alt"></i></button>

                    </form>
                </td>

                <?php }

?>
            </table>




        </div>
        </div>



    </section>


</body>

</html>