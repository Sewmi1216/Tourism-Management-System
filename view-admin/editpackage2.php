<?php 
require('../api/viewonetourpackage.php');
$rows = $_SESSION['c'];

// print_r($rows); die();
// The http request hits here 4th.
// Using the data from previously execute code, the view is prepared
// A response to the http request is sent from here as html file.
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/package.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="text">Edit Tour Packages</div>

        <div class="registerForm">
        <form action="../api/updatetourpackage.php" method="POST">
            <input type="hidden" name = "packageID" value=<?php foreach($rows as $row)echo $row['packageID']; ?>>
         <?php

        foreach($rows as $row) 
        echo '<table>

        
       
            <tr class="row">
                <td>
                    <div class="content">Package Name</div>
                </td>
                <td>  <input type="text" placeholder="Enter Package Name" value="<?php echo $name?>" name="pckgname" required></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Package Price</div>
                </td>
                <td> <input type="text" placeholder="Package Price" value="<?php echo $name?>" name="pckgprice" required> </td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Package Description</div>
                </td>
                <td> <input type="text" placeholder="Describe the Tour package (E.g : No of Days, Travel Destinations)" value="<?php echo $name?>" name="pckgdesc" required> </td>
            </tr>

            <tr class="row">
                <td>
                    <div class="content">Package Images</div>
                </td>
                <td><input type="file" id="myFile" value="" name="pckgimg"> </td>
            </tr>

            
           
           
             
           
            <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->
            
         
            </table>'  ?>
       
        <input type="submit" class="btn1" value="Save" name="UPDATE"/>
        </form>
    </div>

    </section>

</body>

</html>