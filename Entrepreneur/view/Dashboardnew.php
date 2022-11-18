<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/dash.css">
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
    <header>
        <a href="#default" class="logo"><img src="../Images/Travel and Tourism Logo.png" alt="Logo" height="40px" width="90px" style="margin-left:45px;padding-right:0px;"></a>
        <div style="font-size: 25px;line-height: 40px;color: rgba(37, 53, 81, 1);margin-top:10px;">Pack2Paradise</div>
        <div class="header-right" style="float:right">
            <a href="#home">HOME</a>
            <a href="#contact" style="margin-left:60px;">SIGNUP</a>
            <a class="active" href="#about" style="padding:10px;margin-left:60px;">LOGIN</a>
        </div>
</header>
    </body>
</html>