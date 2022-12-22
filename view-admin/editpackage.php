<html lang="en">
<head>
   <link rel="stylesheet" href="../css/addpackage.css">
    <title>Document</title>
</head>
<body>
    <div class="add"> <h2>EDIT PACKAGE</h2> </div>

    <form action="../api/addtourpackage.php" method="POST">
        <div class="container">
          <label for="pckgname"><b>Package Name</b></label> <br>
          <input type="text" placeholder="Enter Package Name" value="<?php echo $name?>" name="pckgname" required>
      <br>
          <label for="pckgid"><b>Package ID</b></label> <br>
          <input type="text" placeholder="Enter Package ID (Eg : PKG XX) " value="<?php echo $name?>" name="pckgid" required>
          <br>
          <label for="pckgprice"><b>Package Price</b></label><br>
          <input type="text" placeholder="Package Price" value="<?php echo $name?>" name="pckgprice" required>
          <br>  
          <label for="pckgdesc"><b>Package Description</b></label><br>
          <input type="text" placeholder="Describe the Tour package (E.g : No of Days, Travel Destinations)" value="<?php echo $name?>" name="pckgdesc" required>
          <br>
          <label for="pckgimg"><b>Package Images</b></label><br>
          <input type="file" id="myFile" name="pckgimg">
          <br>
          <div class="clearfix">
          <button type="button" class="cancelbtn">CANCEL</button>
          <button type="submit" class="signupbtn">UPDATE PACKAGE</button>
          </div>
        </div>
      </form>
</body>
</html>