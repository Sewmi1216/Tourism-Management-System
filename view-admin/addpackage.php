<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
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

        <div class="text">Add Tour Packages</div>

        <div class="registerForm">
        <form action="../api/addtourpackage.php" method="POST">
        
        
        <table>
            <tr class="row">
                <td>
                    <div class="content">Package Name</div>
                </td>
                <td>  <input type="text" placeholder="Enter Package Name" name="pckgname" required></td>
            </tr>

            
            <tr class="row">
                <td>
                    <div class="content">Package Price</div>
                </td>
                <td> <input type="text" placeholder="Package Price" name="pckgprice" required> </td>
            </tr>


            <tr class="row">
                <td>
                    <div class="content">Package Description</div>
                </td>
                <td> <input type="text" placeholder="Describe the Tour package (E.g : No of Days, Travel Destinations)" name="pckgdesc" required> </td>
            </tr>


            <tr class="row">
                <td>
                    <div class="content">Max No of participants</div>
                </td>
                <td> <input type="number" placeholder="number of guests" name="nooftourist" required> </td>
            </tr>


            <tr class="row">
                <td>
                    <div class="content">Package Images</div>
                </td>
                <td><input type="file" id="myFile" name="pckgimg"> </td>
            </tr>
            
           
            <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->
            
         
        </table>
       
        <input type="submit" class="btn1" value="Save" name="save"/>
        </form>
    </div>

    </section>

</body>

</html>