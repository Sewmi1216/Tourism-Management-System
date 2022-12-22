<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
    header("location:Login.php");
}
?>
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
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Craft Products </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for packages" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
                <span style="margin-left: 8px;">
                    <a href="addcraft.php"><i class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span>
            </div>

        </div>

            <div class="bg">
                <table>
                    <tr class="subtext tblrw">
                    
                        <th class="tblh">Product ID</th>
                        <th class="tblh">Product</th>
                        <th class="tblh">Product Name</th>
                        <th class="tblh">Category</th>
                        <th class="tblh">Available Quantity</th>
                        <th class="tblh">Price</th>
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
                    <tr class="subtext tblrw">
                        
                        <td class="tbld"><?php echo $row["productID"] ?></td>
                        <td class="tbld"><?php echo "<img src='../images/" . $row['productImg'] . "' style=
                    'border-radius: 50%;width:30px;height: 30px;background-size: 100%;
                    background-repeat: no-repeat;margin: 20px auto 15px;'>";?></td>
                        <td class="tbld"><?php echo $row["productName"] ?></td>
                        <td class="tbld"><?php echo $row["category"] ?></td>
                        <td class="tbld"><?php echo $row["quantity"] ?></td>
                        <td class="tbld"><?php echo $row["price"] ?></td>
                        <td class="tbld"><a onclick="document.getElementById('id03').style.display='block';"><i
                                    class="fa-sharp fa-solid fa-bars art"></i></a></td>
                        <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                    class="fa-solid fa-pen-to-square art"></i></a></td>
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
     
        <!-- view pkg -->
        <div id="id03" class="modal">

            <form class="modal-content animate" method="post" action="#" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id03').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Product Details</b></label>
                </div>
                <div>
                <img src="../images/bathik saree.jpg" height="300px" width="350px" class="chartimg" />
                </div>
                <div class="content">Saree

                </div>

            </form>
        </div>


        <!-- update product -->
        <div id="id02" class="modal">

            <form class="modal-content animate" method="post" action="#" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Update Product</b></label>
                </div>

                
                
       


                
                    
                
            </form>
        </div>

    </section>

</body>

</html>

