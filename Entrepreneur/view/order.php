
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/add.css?v=<?php echo time(); ?>">
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
            <button style="cursor:pointer;margin-top:5px;margin-left:16px;border:0px white;background-color:white;"><i class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>
        <a href="addcraft.php"><i class="fa-regular fa-square-plus"
                style="font-size:30px;margin-left:950px;color:black;"></i></a>

        <div>
            <table>
                <tr class="heading tblrw">
                    <th class="tblh">Product ID</th>
                    <th class="tblh">Product Name</th>
                    <th class="tblh">Category</th>
                    <th class="tblh">Available Quantity</th>
                    <th class="tblh">View</th>
                    <th class="tblh">Edit</th>
                    <th class="tblh">Delete</th>
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
                    <td class="tbld"><?php echo $row["qunatity"] ?></td>
                    <td class="tbld"><i class="fa-sharp fa-solid fa-bars art"></i></td>
                    <td class="tbld"><i class="fa-solid fa-pen-to-square art"></i></td>
                    <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
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