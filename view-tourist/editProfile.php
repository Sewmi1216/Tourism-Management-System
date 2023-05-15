<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location: http://localhost/Tourism-Management-System/view-hotel/login.php");
}
$id = $_GET['id'];

$name = $_GET['name'];
$address = $_GET['address'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$dob = $_GET['dob'];
$country = $_GET['country'];
$nic_passportNo = $_GET['nic_passportNo'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/profiles.css">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include "header.php"?>


    <div class="wrapper">
        <div class="main_content">
            <div class="info">
                <?php
require_once "../controller/touristController.php";
$tp = new touristController();
$results = $tp->viewProfile($id);
foreach ($results as $result) {?>
                <div class="polygons">
                    <div class="square">
                        <br /><br /><br /><br /><br /><br />


                        <form id="upload-form" method="POST" enctype="multipart/form-data">
                            <figcaption class="txtpp"><a href="#" id="file-link">Change Profile Picture</a><br />
                            </figcaption>
                            <input type="file" name="file" id="file-input" accept="image/*">
                            <input type="hidden" name="ppUpdate" value="1">
                        </form>
                        <br /><br /><br /><br /><br />

                        <!-- Code for hide the submit button -->
                        <script>
                        $(document).ready(function() {
                            $('#file-link').click(function() {
                                $('#file-input').click();
                            });

                            $('#file-input').change(function() {
                                $('#upload-form').submit();
                            });
                        });
                        </script>
                        <?php
                    // Check if the profile photo has been submitted
                    if (isset($_POST['ppUpdate'])) 
                    {
                        // Check if a file has been selected
                        if (isset($_FILES['file'])) 
                        {
                            $fileImg = $_FILES['file']['name'];
$fileImgname = $_FILES['file']['name'];
$ptempname = $_FILES["file"]["tmp_name"];
$pfolder = "../images/" . $fileImgname;
$upload = move_uploaded_file($ptempname, $pfolder);

                            

                            //Check whether the Profile Picture is uploaded or not
                            if($upload == FALSE)
                            {
                               echo "Failed to upload Profile Picture! Please Retry";
//Redirect to edit profile page
header('location:profile.php');
//Stop the process
die();

                            }
                            else
                            {
                               $pro = new touristController();
$respp = $pro->updateProfileImg($fileImg, $id);

                                
//Check the execution of query
if ($respp == true) {?>
                        <div class="ppUp">Profile Picture Updated Successfully</div>
                        //Redirect to edit profile
                        <?php
header('location:profile.php');

} else {?>
                        <div class="ppUpEr">Failed to Update Profile Picture! Please Retry</div>
                        //Redirect to edit profile page
                        <?php
header('location:profile.php');

}

                       
        }
    }
}
?>

                        </figure>
                        <span>
                            <form action="" method="post">
                                <table class="tbl-square">
                                    <tr>
                                        <td class="type1">Name :</td>
                                        <td class="type2"><input type="text" class="subfield" name="name"
                                                value="<?php echo $name;?>" /></td>
                                    </tr>
                                    <tr>
                                        <td class="type1">Address :</td>
                                        <td class="type2"><input type="text" class="subfield" name="address"
                                                value="<?php echo $address;?>" /></td>
                                    </tr>
                                    <tr>
                                        <td class="type1">Email Address :</td>
                                        <td class="type2"><input type="text" class="subfield" name="email"
                                                value="<?php echo $email;?>" /></td>
                                    </tr>
                                    <tr>
                                        <td class="type1">NIC/Passport Number :</td>
                                        <td class="type2"><input type="text" class="subfield" name="nic_passportNo"
                                                value="<?php echo $nic_passportNo;?>" /></td>
                                    </tr>
                                    <tr>
                                        <td class="type1">Contact Numer :</td>
                                        <td class="type2"><input type="text" class="subfield" name="phone"
                                                value="<?php echo $phone;?>" /></td>
                                    </tr>
                                    <tr>
                                        <td class="type1">Date of Birth :</td>
                                        <td class="type2"><input type="date" class="subfield" name="dob"
                                                value="<?php echo $dob;?>" /></td>
                                    </tr>
                                    <tr>
                                        <td class="type1">Country :</td>
                                        <td class="type2"><input type="text" class="subfield" name="country"
                                                value="<?php echo $country;?>" /></td>
                                    </tr>

                                </table>
                                <button class="btn-editP" name="update"
                                    style="margin-top:20px;margin-left:50px;margin-bottom:50px;"> &nbsp; Update
                                    Profile</button>
                            </form>
                    </div>

                    <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='user' class='circle'>"; ?></a>

                    <div id="overlap"></div>
                </div>
                <?php }?>
            </div>
        </div>
    </div><?php

if(isset($_POST['update'])) {
       
        $name = $_POST['name'];
        // $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $nic = $_POST['nic_passportNo'];
        $dob = $_POST['dob'];
        $country = $_POST['country'];
        $profile = new touristController();
$profile->updateProfile($id, $name, $address, $phone, $nic, $dob, $country);
if ($profile) {
    echo "<script>alert('Profile updated successfully');
         window.location.href = 'profile.php';</script>";
}else{
    echo "<script>alert('Profile updated unsuccessfully');
         window.location.href = 'profile.php';</script>";

}


}?>
    <div style="margin-top:10px;">
        <?php include "footer.php"?>
    </div>
</body>

</html>