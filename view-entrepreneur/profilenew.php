<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
    header("location:../view-hotel/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/profilenew.css?v=<?php echo time(); ?>">

</head>
<body>
<?php include "nav.php"?> 

<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `entrepreneur` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$result['image'].'">';
         }
      ?> 
      <h3><?php echo $result['name']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="profilenew.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      
   </div>

</div>

</body>
</html>