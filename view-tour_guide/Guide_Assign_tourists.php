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
    <?php include "dashboardHeader.php"?>
       
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
                    
                    <th class="tblh">Date</th>
                    
                    <th class="tblh">Phone</th>
                    
                    <th class="tblh">Number of Passengers</th>
                    <th class="tblh">View Details</th>
                    </tr><?php
                    require_once "../controller/tourguideController.php";
                    $guide = new tourguideController();
                    $results = $guide->viewAllTourguides();
                    foreach ($results as $result) {
                        ?>

                    <tr class="header">
                        
                        <td class="tbld"><?php echo $result["bookingDateTime"] ?></td>
                        
                        
                        
                        <td class="tbld"><?php echo $result["guestPhone"] ?></td>
                       
                        <td class="tbld"><?php echo $result["noOfGuests"] ?></td>
                        <td class="tbld"><a onclick="document.getElementById('id02').style.display='block';loadData(this.getAttribute('data-ID'));" data-ID="<?php echo $result['productID']; ?>"><i class="fa-solid fa-bars"></i></a></td>
                        
                        

                    </tr>

                    <?php }

?>
                </table>
            </div>
        </div>
        </div>
        <div id="id02" class="modal">

            <form class="modal-content animate" method="post" action="../api/guideapi.php" enctype="multipart/form-data">
                <div class="imgcontainer" style="background-color:#004581;">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="product" style="color:white; margin-left:15px;"><b>View Tourist Details</b></label>
                </div>
                <table>
                <tr class="row">
                    <input type="hidden" class="subfield" name="id" id="productid" value="" ?>
                </tr>
            <tr class="row">
                <td>
                    <div class="content">Name :</div>
                    
                </td>
                <td> <input type="text" class="subfield" id ="productname" name="pName" value=""  /></td>
                
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Phone:</div>
                </td>
                <td> <input type="text" class="subfield" id="pcategory"  name="pCategory" value=""/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Email : </div>
                </td>
                <td> <input type="number" id="qunatity" min="10" class="subfield" name="avaquantity" value=""/></td>
            </tr>

            
            <tr class="row">
                <td>
                    <div class="content">Number of Passengers :</div>
                </td>
                <td><input type="number" id="price" min="10" class="subfield" name="price" value=""></td>
                
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Destination :</div>
                </td>
                <td><input type="number" id="price" min="10" class="subfield" name="price" value=""></td>
                
            </tr>
            
            
            
          
            
         
        </table>
       
       
     
     


        
         
       

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

