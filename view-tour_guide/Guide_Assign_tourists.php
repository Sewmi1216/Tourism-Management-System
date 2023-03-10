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
    

    <section class="home-section">
       
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Assign Tourists </div>
                <div class="input-container">
                    <!-- <input class="input-field" type="text" placeholder="Search for products" name="search"> -->
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for products.." title="Type in a productname">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
                
            </div>

        </div>

            <div class="bg" style="overflow-x:auto;">
                <table id="myTable">
                    <tr class="header">
                    
                    <th class="tblh">Name</th>
                       
                        
                        <th class="tblh">Phone</th>
                        <th class="tblh">Availability</th>
                        <th class="tblh">Languages</th>
                        <th class="tblh">Vehicle Type</th>
                        <th class="tblh">Number of Passengers</th>
                    </tr><?php
                    require_once "../controller/tourguideController.php";
                    $guide = new tourguideController();
                    $results = $guide->viewAllTourguides();
                    foreach ($results as $result) {
                        ?>

                    <tr class="header">
                        
                        <td class="tbld"><?php echo $result["name"] ?></td>
                        
                        
                        <td class="tbld"><?php echo $result["phone"] ?></td>
                        <td class="tbld"><?php echo $result["availability"] ?></td>
                        <td class="tbld"><?php echo $result["languages"] ?></td>
                        <td class="tbld"><?php echo $result["vehicle_type"] ?></td>
                        <td class="tbld"><?php echo $result["number_of_passengers"] ?></td>
                        
                        

                    </tr>

                    <?php }

?>
                </table>
            </div>
        </div>
        </div>
     
     


        
         
       

            </form>
        </div>
         
                
       
        <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

    </section>

</body>

</html>

