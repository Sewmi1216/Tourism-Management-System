<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="dash.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Bathik Dresses', '10'],
          ['Cane Products',     30],
          ['Trditional Masks',     15],
          ['Coconut Products',  50],
          ['Pottery Items', 20],
          ['Home Decor',    7]
        ]);

        var options = {
          title: 'Craft Orders'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales', 'Profit'],
          ['January', 1000, 200],
          ['February', 1170, 250],
          ['March', 660,  300],
          ['April', 1030, 350]
        ]);

        var options = {
          chart: {
            title: 'Sales and Profits',
           
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    </head>
    <body>
        <section id="menu">
            <div class="logo">
                <img src="Travel and Tourism Logo.png" alt="logo">
                <h2>PACK2PARADISE</h2>
            </div>
            <h3>WELCOME</h3>
            <div class="items">
            <li><i class="fas fa-chart-pie"></i><a href="#">DASHBOARD</a></li>
            <li><i class="fas fa-acorn"></i><a href="#">CRAFT PRODUCTS</a></li>
            <li><i class="fas fa-shopping-cart"></i><a href="#">CRAFT ORDERS</a></li>
            <li><i class="fas fa-file-invoice-dollar"></i><a href="#">PAYMENTS</a></li>
       </div>

        </section>
        <section id="interface">
            <div class="navigation"> 
               <a class="home" href="#home">Home</a>
               <i class="fas fa-shoppin-cart"></i>
               <div class="profile">
                
                   
                    <img src="Profile.jpg" alt="profile">

                </div>
               <a class="active" href="#logout">Logout</a>
                
             </div>
             <h3 class="i-name">
                    Dashboard
            </h3>

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
             <i class="fas fa-acorn"></i>
                 
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
             
             <div id="piechart" class="chart"></div>
             <div id="columnchart_material" class="bar"></div>
    

        </section>
    </body>
</html>