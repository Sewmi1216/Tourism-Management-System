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
                    <!-- <input class="input-field" type="text" placeholder="Search for products" name="search"> -->
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for products.." title="Type in a productname">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
                <span style="margin-left: 8px;">
                    <a href="addcraft.php"><i class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span>
            </div>

        </div>

            <div class="bg" style="overflow-x:auto;">
                <table id="myTable">
                    <tr class="header">
                    
                    <th class="tblh">Product Name</th>
                        <th class="tblh">Product</th>
                        
                        <th class="tblh">Category</th>
                        <th class="tblh">Available Quantity</th>
                        <th class="tblh">Price</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr><?php
                    require_once "../controller/productController.php";
                    $product = new productController();
                    $results = $product->viewAll();
                    foreach ($results as $result) {
                        ?>

                    <tr class="header">
                        
                        <td class="tbld"><?php echo $result["productName"] ?></td>
                        <td class="tbld"><?php echo "<img src='../images/" . $result['productImg'] . "' style=
                    'border-radius: 10%;width:70px;height: 70px;background-size: 100%;
                    background-repeat: no-repeat;margin: 20px auto 15px;'>";?></td>
                        
                        <td class="tbld"><?php echo $result["category"] ?></td>
                        <td class="tbld"><?php echo $result["quantity"] ?></td>
                        <td class="tbld"><?php echo $result["price"] ?></td>
                        
                        <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                    class="fa-solid fa-pen-to-square art"></i></a></td>
                                    
                        <td class="tbld"><a onclick="document.getElementById('id04').style.display='block'"><i
                                        class="fa-solid fa-trash art"></i></a></td>

                    </tr>

                    <?php }

?>
                </table>
            </div>
        </div>
        </div>
     
     


        <!-- update product -->
        <div id="id02" class="modal">

            <form class="modal-content animate" method="post" action="../api/productapi.php" enctype="multipart/form-data">
                <div class="imgcontainer" style="background-color:#004581;">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="product" style="color:white; margin-left:15px;"><b>Update Product</b></label>
                </div>
                <table>
                <tr class="row">
                    <input type="hidden" class="subfield" name="id" id="productid" value="" ?>
                </tr>
            <tr class="row">
                <td>
                    <div class="content">Product Name</div>
                    
                </td>
                <td> <input type="text" class="subfield" id ="productname" name="pName" value="<?php echo $result["productName"] ?>"  /></td>
                
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Category</div>
                </td>
                <td> <input type="text" class="subfield" id="pcategory"  name="pCategory" value="<?php echo $result["category"] ?>"/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Available Quantity</div>
                </td>
                <td> <input type="number" id="qunatity" min="10" class="subfield" name="avaquantity" value="<?php echo $result["quantity"] ?>"/></td>
            </tr>

            
            <tr class="row">
                <td>
                    <div class="content">Price</div>
                </td>
                <td><input type="number" id="price" min="10" class="subfield" name="price" value="<?php echo $result["price"] ?>"/></td>
                
            </tr>
            
            
            
            <tr class="row">
                <td>
                    <div class="content">Upload Image</div>
                </td>
                
                        <td> <?php echo "<img src='' style=
                    'width:200px;height: 200px;margin-left:45px;padding-right:0px;' id='fileImg'>"; ?>
                        <input type="file" class="subfield" name="fileImg" />
                    </td>
            </tr>
            <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->
            
         
        </table>
       
        <input type="submit" class="btn1" value="Update" name="update"/>
        </form>
    </div>

       
        <!-- delete pkg -->
        <div id="id04" class="modal">

            <form class="modal-content animate" style="width:45%;" method="post" action="../api/productapi.php"
                enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id04').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                </div>

                    <input type="hidden" class="subfield" name="id" value="<?php echo $productID ?>" />
                    <p class="text" style="font-size:20px;text-align:center;margin-left:90px;">Do you want to delete
                        this product?</p>

                    <div>
                        <button type="button" onclick="document.getElementById('id02').style.display='none'"
                            class="btnss" style="margin-left:11rem; ">No</button>
                        <button type="submit" class="btns" value="Save" name="delete"
                            style="margin-left:105px;">Yes</button>
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

