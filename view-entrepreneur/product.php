<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/add.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="text">Craft Products</div>
        <div class="bg">
            <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
                <input type="text" placeholder="Search.." name="search2">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <a href="addcraft.php"><i class="fa-regular fa-square-plus"
                    style="font-size:30px;margin-left:950px;margin-top:5x;color:black;"></i></a>

            <div>
                <table>
                    <tr class="heading tblrw">
                        <th class="tblh">Product ID</th>
                        <th class="tblh">Product Name</th>
                        <th class="tblh">Category</th>
                        <th class="tblh">Available Quantity</th>
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
                    <tr class="subheading tblrw">
                        <td class="tbld"><?php echo $row["productID"] ?></td>
                        <td class="tbld"><?php echo $row["productName"] ?></td>
                        <td class="tbld"><?php echo $row["category"] ?></td>
                        <td class="tbld"><?php echo $row["quantity"] ?></td>
                        <td class="tbld"><button id="myBtn"><i class="fa-sharp fa-solid fa-bars art"
                                    style="color:black;"></i></button></td>
                                    <div id="modal" class="mmodal">

<!-- Modal content -->
<div class="mmodal-content">
  <span class="close">&times;</span>
  <p>Some text in the Modal..</p>
</div>

</div>

<script>
// Get the modal
var mmodal = document.getElementById("modal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
mmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
mmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == mmodal) {
  mmodal.style.display = "none";
}
}
</script>




                        <td class="tbld"><button id="Btn"><i class="fa-solid fa-pen-to-square art"
                                    style="color:black;"></i></button></td>
                        <div id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h3>Update Product Details</h3>
                                <div class="container">
                                    <form action="/action_page.php">
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="fname">Product Name</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" id="fname" name="firstname">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-25">
                                                <label for="country">Category</label>
                                            </div>
                                            <div class="col-75">
                                                <select id="country" name="country">
                                                    <option value="Bathik ">Bathik Dresses</option>
                                                    <option value="cane">Cane Products</option>
                                                    <option value="coco">Coconut Products</option>
                                                    <option value="pot">Pottery Items</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="subject">Description</label>
                                            </div>
                                            <div class="col-75">
                                                <textarea id="subject" name="subject" placeholder="Write something.."
                                                    style="height:100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="fname">Available Quantity</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="number" id="fname" name="quntity" min="10">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="fname">Price</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" id="fname" name="firstname">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="fname">Image</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="file" id="fname" name="firstname">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <input type="submit" value="Update">
                                        </div>
                                    </form>
                                </div>


                            </div>
                            <script>
                            var modal = document.getElementById("myModal");

                            // Get the button that opens the modal
                            var btn = document.getElementById("Btn");

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks the button, open the modal 
                            btn.onclick = function() {
                                modal.style.display = "block";
                            }

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                                modal.style.display = "none";
                            }

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }


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
                            <td class="tbld"><button id="mybtn"><i class="fa-solid fa-trash art"
                                        style="color:black;"></i></button></td>

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

    </section>

</body>

</html>