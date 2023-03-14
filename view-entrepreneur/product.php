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
                    
                </div>
                <a href="product.php"><button type="submit" class="btns">View All</button></a>
                <span style="margin-left: 8px;">
                    <a href="addcraft.php"><i class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span>
            </div>

        </div>

            <div class="bg" style="overflow-x:auto;">
                <table id="myTable">
                    <tr class="header">
                    
                    
                        <th class="tblh">Product</th>

                         <th class="tblh">Product Name</th>
                        <th class="tblh">Category</th>
                        <th class="tblh">Available Quantity</th>
                        <th class="tblh">Price</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr><?php
                    require_once "../controller/productController.php";
                    $product = new productController();
                    $results = $product->viewAll($id);
                    foreach ($results as $result) {
                        ?>

                    <tr class="header">
                    
                    <td class="tbld"><?php echo "<img src='../images/" . $result['productImg'] . "' style=
                    'border-radius: 10%;width:70px;height: 70px;background-size: 100%;
                    background-repeat: no-repeat;margin: 20px auto 15px;'>";?></td>
                    <td class="tbld"><?php echo $result["productName"] ?></td>
                        <td class="tbld"><?php echo $result["category"] ?></td>
                        <td class="tbld"><?php echo $result["quantity"] ?></td>
                        <td class="tbld"><?php echo $result["price"] ?></td>
                        
                        <td class="tbld"><a onclick="document.getElementById('id02').style.display='block';loadData(this.getAttribute('data-ID'));" data-ID="<?php echo $result['productID']; ?>"><i
                                    class="fa-solid fa-pen-to-square art"></i></a></td>
                     
                                    
                        
                                        <td class="tbld"><a onclick="openModal(<?php echo $result['productID']; ?>)"><i
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
                <td> <input type="text" class="subfield" id ="productname" name="pName" value=""  /></td>
                
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Category</div>
                </td>
                <td> <input type="text" class="subfield" id="pcategory"  name="pCategory" value=""/></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Available Quantity</div>
                </td>
                <td> <input type="number" id="qunatity" min="10" class="subfield" name="avaquantity" value=""/></td>
            </tr>

            
            <tr class="row">
                <td>
                    <div class="content">Price</div>
                </td>
                <td><input type="number" id="price" min="10" class="subfield" name="price" value=""></td>
                
            </tr>
            
            
            
          
            
         
        </table>
       
            <button type="submit" class="btns" value="update" style="margin-left:460px; margin-top:50px;" name="update">Update</button>
        <button type="button" style="margin-left:20px;"
                onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
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

                    <input type="text" id="modalIdValue" class="subfield" name="id" value="<?php echo $productID ?>" />
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
    td = tr[i].getElementsByTagName("td")[1];
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
<script>
    // Function to open the modal and set the id value
    function openModal(id) {
        var modal = document.getElementById("id04");
        var modalIdValue = document.getElementById("modalIdValue");
        modalIdValue.value = id;
        modal.style.display = "block";
    }

    function loadData(id) {
    	$.ajax({
    	    url: "../api/productapi.php",
    	    method: "POST",
    	    data: {
                get_data: 1, 
                id: id,
            },
    	    success: function (response) {
    	        console.log(response);
                var type = JSON.parse(response);
                $("#productid").val(type.productID);
                $("#productname").val(type.productName);
                $("#category").val(type.category);
                // $("#status").val(type.typestatus);
                $("#quantity").val(type.quantity);
                $("#price").val(type.price);
                $("#img").attr("src", "../images/" + type.productImg);
               

    	    }
        });
    }
</script>

    </section>

</body>

</html>

