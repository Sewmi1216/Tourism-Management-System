
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/add.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="text">Add Craft Products</div>

        <div class="registerForm">
        <form method="post" action="../api/productapi.php" enctype="multipart/form-data">
        
        <table>
            <tr class="row">
                <td>
                    <div class="content">Product Name</div>
                </td>
                <td> <input type="text" class="subfield" name="pName" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Category</div>
                </td>
                <td> <input type="text" class="subfield" name="pCategory" /></td>
            </tr>
            
            <tr class="row">
                <td>
                    <div class="content">Price</div>
                </td>
                <td><input type="text" class="subfield" name="price" /></td>
                 <!-- <td> <select class="subfield" name="status" form="carform">
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select></td>  -->
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Available Quantity</div>
                </td>
                <td> <input type="number" min="10" class="subfield" name="avaquantity" /></td>
            </tr>
            
            
            <tr class="row">
                <td>
                    <div class="content">Upload Image</div>
                </td>
                <td> <input type="file"
                        style="margin-top:20px;background: #cfcaff;  box-sizing: border-box;border: 5px solid rgba(0, 0, 0, 0.25);border-radius: 36px;"
                        name="fileImg" /></td>
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