<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dash.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
            <li><i class="fas fa-star"></i><a href="product.php">CRAFT PRODUCTS</a></li>
            <li><i class="fas fa-shopping-cart"></i><a href="#">CRAFT ORDERS</a></li>
            <li><i class="fas fa-file-invoice-dollar"></i><a href="#">PAYMENTS</a></li>
        </div>

    </section>
    <section id="interface">

        <h2 class="i-name">
            Dashboard
        </h2>

        <div class="values">
            <div class="val-box">
                <i class="fas fa-users"></i>

                <div>
                    <h3>200</h3>
                    <span> New Users</span>
                </div>

            </div>
            <div class="val-box">
                <i class="fas fa-shopping-cart"></i>

                <div>
                    <h3>100</h3>
                    <span>Total Orders</span>
                </div>

            </div>
            <div class="val-box">
                <i class="fas fa-star"></i>

                <div>
                    <h3>500</h3>
                    <span> Products Sell </span>
                </div>

            </div>
            <div class="val-box">
                <i class="fas fa-dollar-sign"></i>

                <div>
                    <h3>$200</h3>
                    <span>This Month</span>
                </div>

            </div>




    </section>







</body>

</html>