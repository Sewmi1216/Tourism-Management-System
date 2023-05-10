<?php



include '../db/db_connection.php';
session_start();
$entID = $_SESSION['entID'];

if(isset($_POST['update_profile'])){

   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $entrepreneurName = mysqli_real_escape_string($conn, $_POST['entrepreneurName']);
   mysqli_query($conn, "UPDATE `entrepreneur` SET  address = '$address',email = '$email', phone = '$phone WHERE id = '$entID'") or die('query failed');

   

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/profilenew.css">
   <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">

</head>
<body>
   
<div class="update-profile">

   <?php
   $conn = mysqli_connect('localhost','root','','pack2paradise') or die('connection failed');
      $select = mysqli_query($conn, "SELECT * FROM `entrepreneur` WHERE entID = 'id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['profileImg'] == ''){
            echo '<img src="../images/default-avatar.png">';
         }else{
            echo '<img src="../uploaded_img/'.$fetch['profileImg'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
      
         <div class="inputBox">
         <div class="subheading" style="margin-top:15px;">Business Details</div>
         <span>Business Name :</span>
            <input type="text" name="bName" value="<?php echo $fetch['businessName']; ?>" class="box">
            <span>Address :</span>
            <input type="text" name="address" value="<?php echo $fetch['address']; ?>" class="box">
            <span>Email :</span>
            <input type="email" name="email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>Phone :</span>
            <input type="number" name="phone" value="<?php echo $fetch['phone']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
         <div class="subheading" style="margin-top:15px;">Personal Details</div>
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Name :</span>
            <input type="text" name="entrepreneurName" value="<?php echo $fetch['entrepreneurName']; ?>" class="box">
            <span>Phone :</span>
            <input type="text" name="entrepreneurPhone" value="<?php echo $fetch['entrepreneurPhone']; ?>" class="box">
            <span>Email :</span>
            <input type="text" name="entrepreneurEmail" value="<?php echo $fetch['entrepreneurEmail']; ?>" class="box">
            <span>NIC :</span>
            <input type="text" name="entrepreneurNic" value="<?php echo $fetch['entrepreneurNic']; ?>" class="box">
            <span>Password :</span>
            <input type="password" name="password" value="<?php echo $fetch['password']; ?>" class="box">
            <span>Update your pic :</span>
            <input type="file" name="proImg" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="profile2.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>