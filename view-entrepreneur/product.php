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
                    'border-radius: 10%;width:70px;height: 70px;background-size: 100%;
                    background-repeat: no-repeat;margin: 20px auto 15px;'>";?></td>
                        <td class="tbld"><?php echo $row["productName"] ?></td>
                        <td class="tbld"><?php echo $row["category"] ?></td>
                        <td class="tbld"><?php echo $row["quantity"] ?></td>
                        <td class="tbld"><?php echo $row["price"] ?></td>
                        <td class="tbld"><a onclick="document.getElementById('id03').style.display='block';"><i
                                    class="fa-sharp fa-solid fa-bars art"></i></a></td>
                        <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                    class="fa-solid fa-pen-to-square art"></i></a></td>
                        <td class="tbld"><a onclick="document.getElementById('id04').style.display='block'"><i
                                        class="fa-solid fa-trash art"></i></a></td>

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
               
                <table style="margin:-30px;">
                <tr>
                    <td ><img src="../images/bathik saree.jpg" height="300px" width="350px" class="chartimg" style="margin-left:100px;" /></td>
                    <td>
                        
                        <ul style="margin-left:23px;">
                            <li>Product Name: Saree
                            </li>
                            <li>Category: 
                            </li>
                            <li>Quantity:
                            </li>
                            <li>Price:
                            </li>
                            
                        </ul>
                    </td>
                </tr>
            </table>

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
                <table>
            <tr class="row">
                <td>
                    <div class="content">Product Name</div>
                </td>
                <td> <input type="text" class="subfield" name="pName"style="color:black;" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Category</div>
                </td>
                <td> <input type="text" class="subfield" name="pCategory" /></td>
            </tr>
            
            <tr class="row">
                <td>
                    <div class="content">Price</div>
                </td>
                <td><input type="text" class="subfield" name="price" /></td>
                 <!-- <td> <select class="subfield" name="status" form="carform">
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select></td>  -->
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Available Quantity</div>
                </td>
                <td> <input type="number" min="10" class="subfield" name="avaquantity" /></td>
            </tr>
            
            
            <tr class="row">
                <td>
                    <div class="content">Upload Image</div>
                </td>
                <td> <input type="file" class="subfield"
                        style="margin-top:25px;background:#dde8f0;  box-sizing: border-box;"
                        name="fileImg" /></td>
            </tr>
            <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->
            
         
        </table>
       
        <input type="submit" class="btn1" value="Save" name="save"/>
        </form>
    </div>

       
        <!-- delete pkg -->
        <div id="id04" class="modal">

            <form class="modal-content animate" style="width:45%;" method="post" action="../api/addpkg.php"
                enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id04').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                </div>

                    <input type="hidden" class="subfield" name="id" value="<?php echo $packageID ?>" />
                    <p class="text" style="font-size:20px;text-align:center;margin-left:90px;">Do you want to delete
                        this product?</p>

                    <div>
                        <button type="button" onclick="document.getElementById('id02').style.display='none'"
                            class="btns" style="margin-left:11rem; ">No</button>
                        <button type="submit" class="btns" value="Save" name="delete"
                            style="margin-left:105px;">Yes</button>
</div>
                   


            </form>
        </div>
         
                
       


    </section>

</body>

</html>

