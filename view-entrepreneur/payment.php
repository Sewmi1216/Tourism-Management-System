<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">Craft Products</div>
        <div class="bg">
            <input type="search" class="subfield" style="margin-top:9px;margin-left:160px;"name="pName" />
            <button style="cursor:pointer;margin-top:-10px;margin-left:16px;border:0px white;background-color:white;"><i class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>
        <a href="addcraft.php"><i class="fa-regular fa-square-plus"
                style="font-size:30px;margin-left:950px;margin-top:-15x;color:black;"></i></a>

        <div>
            <table>
                <tr class="heading tblrw">
                    <th class="tblh">Payment ID</th>
                    <th class="tblh">Date</th>
                    <th class="tblh">Order ID</th>
                    <th class="tblh">Type</th>
                    <th class="tblh">Price</th>
                    <th class="tblh">Status</th>
                </tr><?php
include "../controller/productController.php";
$productcont = new productController();
$res = $productcont->viewAll();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>
                <tr class="subheading tblrw">
                    <td class="tbld"><?php echo $row["productID"] ?></td>
                    <td class="tbld"><?php echo $row["productName"] ?></td>
                    <td class="tbld"><?php echo $row["category"] ?></td>
                    <td class="tbld"><?php echo $row["quantity"] ?></td>
                    
                </tr>
                
                <?php }
} else {
    echo "No results";
}
?>
            </table>
        </div>
        </div>
        </div>

    </section>
    <script>
    var model = $('.model');

    $('.add').click(function() {
        model.show();
    })
    $('.close').click(function() {
        model.hide();
    })
    // $('.btn').click(function() {
    //     model.hide();
    // })
    </script>
</body>

</html>