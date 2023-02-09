<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
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
                <div class="page-title">Craft Orders </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for products" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns">View All</button>
                
            </div>

        </div>
        <div class="bg">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Order ID</th>
                        <th class="tblh">Order Date</th>
                        <th class="tblh">Status</th>
                        <th class="tblh">view </th>
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld">0001</td>
                        <td class="tbld">2022/10/22</td>
                        <td class="tbld">
                        <select name="status" id="status">
  <option value="recived">Recieved</option>
  <option value="pending">Pending</option>
  <option value="recieved">Recieved</option>
</select>
</td>
<td class="tbld"><a onclick="document.getElementById('id03').style.display='block';"><i
                                    class="fa-sharp fa-solid fa-bars art"></i></a></td>
                        
                                    
                        
                        
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld">0001</td>
                        <td class="tbld">2022/10/22</td>
                       <td class="tbld">
                        <select name="status" id="status">
  <option value="recived">Recieved</option>
  <option value="pending">Pending</option>
  <option value="recieved">Recieved</option>
</select>
</td>
                        <td class="tbld"><i class="fa-sharp fa-solid fa-bars art"
                                    style="color:black;"></i></td>
                        
                        
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld">0001</td>
                        <td class="tbld">2022/10/22</td>
                        <td class="tbld">
                        <select name="status" id="status">
  <option value="recived">Recieved</option>
  <option value="pending">Pending</option>
  <option value="recieved">Recieved</option>
</select>
</td>
                        <td class="tbld"><i class="fa-sharp fa-solid fa-bars art"
                                    style="color:black;"></i></td>
                        
                        
                    </tr>
           <?php
include "../controller/productController.php";
$productcont = new productController();
$res = $productcont->viewAll();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>
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
        <label for="room"><b>Order Details</b></label>
    </div>
   
    <table>
            <tr class="row">
                <td>
                    <div class="content">Orderer</div>
                </td>
                <td> <input type="text" class="subfield" name="pName"style="color:black;" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Status</div>
                </td>
                <td> <input type="text" class="subfield" name="pCategory" /></td>
            </tr>
            
            <tr class="row">
                <td>
                    <div class="content">ID</div>
                </td>
                <td><input type="text" class="subfield" name="price" /></td>
                 <!-- <td> <select class="subfield" name="status" form="carform">
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select></td>  -->
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Oder Date</div>
                </td>
                <td> <input type="text" min="10" class="subfield" name="avaquantity" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Total Amount</div>
                </td>
                <td> <input type="text" min="10" class="subfield" name="avaquantity" /></td>
            </tr>
            <tr class="row">
                <td>
                    <div class="content">Shipping Address</div>
                </td>
                <td> <input type="text" class="subfield" name="pCategory" /></td>
            </tr>
            
            
            
            <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->
            
         
        </table>
</div>

</form>
</div>

    </section>
    <script>
    var model = $('.model');

    $('.add').click(function() {
        model.show();
    })
    $('.close').click(function() {
        model.hide();
    })
    // $('.btn').click(function() {
    //     model.hide();
    // })
    </script>
</body>

</html>