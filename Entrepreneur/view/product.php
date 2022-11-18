<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <meta charset="utf-8">
    <title>Responsive Navigation Menu</title>
    <link rel="stylesheet" href="../css/pstyle.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<header>
        <a href="#default" class="logo"><img src="../Images/Travel and Tourism Logo.png" alt="Logo" height="40px"
                width="90px" style="margin-left:45px;padding-right:0px;"></a>
        <div style="font-size: 25px;line-height: 40px;color: rgba(37, 53, 81, 1);margin-top:10px;">Pack2Paradise</div>
        <div class="header-right" style="float:right">
        <a href="#home">HOME</a>
        <a href="#contact" style="margin-left:60px;margin-top:-8px;"><img src="../Images/Profile.jpg" alt="Logo"
                height="40px" width="40px" style="padding-right:0px;border-radius:50%;"></a>
        <a class="active" href="login.php" style="padding:10px;margin-left:60px;">LOGOUT</a>
        </div>
    </header>
    <section id="menu">
        <h3>WELCOME</h3>
        <div class="items">
            <li><i class="fas fa-chart-pie"></i><a href="Dashboardnew.php">DASHBOARD</a></li>
            <li><i class="fas fa-star"></i><a href="#">CRAFT PRODUCTS</a></li>
            <li><i class="fas fa-shopping-cart"></i><a href="#">CRAFT ORDERS</a></li>
            <li><i class="fas fa-file-invoice-dollar"></i><a href="#">PAYMENTS</a></li>
        </div>
    </section>
    <section id="interface">
        <div class="content">
            <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
                <input type="text" placeholder="Search.." name="search2">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            
            <a href="Addcraft.php" class="button">ADD PRODUCT</a>
            <a href="#" class="button">VIEW ALL</a>
            <div>
                <table>
                    <tr>
                        
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Available Quantity</th>
                        <th>view</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr><?php
                    include "../controller/productController.php";
                    $productControl =  new productController();
                    $res = $productControl->viewAll();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>
                    <tr>
                        
                        <td><?php echo $row["productID"] ?></td>
                        <td><?php echo $row["productName"] ?></td>
                        <td><?php echo $row["category"] ?></td>
                        <td><?php echo $row["quantity"] ?></td>
                        <td>View</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    <?php }
} else {
    echo "No results";
}
?>
                </table>
            </div>
        </div>
            





    </section>



</body>

</html>