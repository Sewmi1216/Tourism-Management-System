<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/add.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
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
            <li><i class="fas fa-chart-pie"></i><a href="#">DASHBOARD</a></li>
            <li><i class="fas fa-star"></i><a href="#">CRAFT PRODUCTS</a></li>
            <li><i class="fas fa-shopping-cart"></i><a href="#">CRAFT ORDERS</a></li>
            <li><i class="fas fa-file-invoice-dollar"></i><a href="#">PAYMENTS</a></li>
       </div>

        </section>

    <section class="home-section">
    <form action="../api/productapi.php" method="post" enctype="multipart/form-data">   
        <div class="text">Hand Crafts</div>
        <a href="addproduct.php"><i class="fa-regular fa-square-plus" style="font-size:30px;margin-left:950px;"></i></a>
        <div class="model1">
            <div class="heading">Add Product</div>
            <i class="fa-sharp fa-solid fa-circle-xmark"
                style="float:right;margin-top:-35px;font-size:25px;margin-left:395px;"></i>
            <table>
            <tr class="row">
                    <td>
                        <div class="content">Product Name</div>
                    </td>
                    <td> <input type="text" class="subfield" name="pName" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Product Category</div>
                    </td>
                    <td>
                    <input type="text" class="subfield" name="pCategory" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
                
                
                <tr class="row">
                    <td>
                        <div class="content">Available Quantity</div>
                    </td>
                    <td><input type="text" class="subfield" name="avaquantity" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Price</div>
                    </td>
                    <td> <input type="text" class="subfield" name="price" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
                
                <tr class="row">
                    <td>
                        <div class="content">Image</div>
                    </td>
                    <td> <input type="file" class="subfield" name="Img" required />
                        <div class="subcontent">Room Number is required</div>
                    </td>
                </tr>
            </table>
            <input type="submit" class="btn" style="padding:10px;margin-left:350px;" value="ADD PRODUCT" name="addproduct">

        </div>
</form>
    </section>
    

</body>

</html>