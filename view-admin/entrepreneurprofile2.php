<!-- <?php
require('../api/entrepreneurprofile.php');
$rows = $_SESSION['c'];



?> -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/managerprofile.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    

    <?php include "nav.php"?>
   


    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <?php
require_once "../controller/entrepreneurController.php";
$profile = new entrepreneurController();
$results = $profile->viewProfile($id);
foreach ($results as $result) {
    ?>
        <div class="text">Entrereneur Profile</div>
        <div class="wrapper">

            <div class="left">
                <?php echo "<img src='../images/" . $result['profileImg'] . "'alt='logo' height='150px' width='150px'
                    style='padding-right:0px;border-radius:50%;'>";?>

                <h3><?php echo $result['entrepreneurName'];?></h3>
                <p><?php echo $result['username'];?></p>
            </div>
            <div class="right">

                <div class="info">
                    <h3>Hotel Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['email'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['phone'];?></p>
                        </div>
                        <div class="data">
                            <h4>Address</h4>
                            <p><?php echo $result['address'];?></p>
                        </div>



                    </div>

                </div>
                <div class="projects">
                    <h3>Contact Person Details</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Name</h4>
                            <p><?php echo $result['entrepreneurName'];?></p>
                        </div>
                        <div class="data">
                            <h4>NIC</h4>
                            <p><?php echo $result['entrepreneurNic'];?></p>
                        </div>
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $result['entrepreneurEmail'];?></p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $result['entrepreneurPhone'];?></p>
                        </div>

                    </div>

                </div>
                <br>
                <?php } ?>
            </div>


            
    </section>

    <div class="bg" style="overflow-x:auto;">
                <table id="myTable">
                    <tr class="header">
                         <th class="tblh">Product Name</th>
                        <th class="tblh">Category</th>
                        <th class="tblh">Available Quantity</th>
                        <th class="tblh">Price</th>

                    </tr><?php
                    require_once "../controller/productController.php";
                    $product = new productController();
                    $results = $product->viewAll($id);
                    foreach ($results as $result) {
                        ?>

                    <tr class="header">
                    
                    <!-- <td class="tbld"><?php echo "<img src='../images/" . $result['productImg'] . "' style=
                    'border-radius: 10%;width:70px;height: 70px;background-size: 100%;
                    background-repeat: no-repeat;margin: 20px auto 15px;'>";?></td> -->
                    <td class="tbld"><?php echo $result["productName"] ?></td>
                        <td class="tbld"><?php echo $result["category"] ?></td>
                        <td class="tbld"><?php echo $result["quantity"] ?></td>
                        <td class="tbld"><?php echo $result["price"] ?></td>
                       
                    </tr>

                    <?php }

?>
                </table>
            </div>
</body>

</html>