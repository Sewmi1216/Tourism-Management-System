<?php
// require '../api/viewtourpackage.php';
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourist.css">
    <!-- <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet"> -->

</head>

<body>
    <?php include "header.php"?>
    <section class="popular" id="hotel" style="padding: 2rem 9%;">
        <form method="post" id="search_form"></form>
        <div class="cont">
            <div class="search">
                <h1>Handicrafts</h1>
                <input type="text" name="" id="find" onfocus="this.placeholder=''" placeholder="Search Product...."
                    onkeyup="search()">
            </div>
        </div>

        <div class="filter">
            <div class="filterbox">
                <ul class="list">
                    <label>
                        <h3>Categories</h3>
                    </label>
                    <?php 
        require "../controller/productController.php";
$pro = new productController();
$categories = $pro->getCategories();
foreach ($categories as $key => $category) {
    if (isset($_POST['category'])) {
        if (in_array($pro->cleanString($category['categoryId']), $_POST['categoryName'])) {
            $categoryCheck = 'checked="checked"';
        } else {
            $categoryCheck = "";
        }
    }
    ?>
                    <li class="list">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="<?php echo $category['categoryId']; ?>"
                                    <?php echo @$categoryCheck; ?> name="category[]" class="sort_rang category">
                                <?php echo ucfirst($category['categoryName']); ?>
                            </label>
                        </div>
                    </li>
                    <?php
}
?>
                </ul>
            </div>

        </div>

        <div class="productlist">

            <div id="results">

            </div>
        </div>

    </section>
    </form>

    <script>
    $(document).ready(function() {
        var category = getCheckboxValues("category");

        // Move the AJAX request to a separate function
        function loadProducts() {
            $.ajax({
                type: "POST",
                url: "../api/load_products.php",
                dataType: "json",
                data: {
                    category: category,
                },
                success: function(data) {
                    console.log(data);
                    displayProducts(data.products);

                    //$("#results").html(data.products); // Use .html() instead of .append() to replace the content
                },
            });
        }

        // Call loadProducts() on page load
        loadProducts();

        function getCheckboxValues(checkboxClass) {
            var values = new Array();
            $("." + checkboxClass + ":checked").each(function() {
                values.push($(this).val());
            });
            return values;
        }

        function displayProducts(products) {
            var productHTML = '';
            if (products.length > 0) {
                for (var i = 0; i < products.length; i++) {
                    (function(product) {
                        productHTML += '<div class="box">';
                        productHTML += '<div class="slideshow-container">';
                        productHTML += '<div class="product-images" id="productImages_' + product
                            .productID + '"></div>';
                        productHTML += '</div>';
                        productHTML += '<div class="content-container">';
                        productHTML += '<h3 style="display: inline;">' + product.productName + '</h3>';
                        productHTML += '</div>';
                        productHTML += '<div class="price">$' + product.price + '</div>';
                        productHTML += '<div style="display: flex; justify-content: center;">';
                        productHTML += '<a href="tourpackage.php?pid=' + product.categoryId +
                            '" class="cart">View</a>';
                        productHTML += '</div>';
                        productHTML += '</div>';

                        // Make AJAX request to fetch the product images
                        $.ajax({
                            type: "POST",
                            url: "../api/load_product_images.php",
                            dataType: "json",
                            data: {
                                productID: product.productID
                            },
                            success: function(data) {
                                displayProductImages(data.images, product.productID);
                            }
                        });
                    })(products[i]);
                }
            } else {
                productHTML = '<p>No products found.</p>';
            }
            $("#results").html(productHTML);
        }

        function displayProductImages(images, productID) {
            var imagesHTML = '';
            if (images.length > 0) {
                var firstImage = images[0]; // Get the first image from the array
                imagesHTML += '<div class="mySlides fade ' + productID + '">';
                imagesHTML += '<img src="../images/' + firstImage + '" style="width:100%">';
                imagesHTML += '</div>';
            }
            $("#productImages_" + productID).html(imagesHTML);
        }


        $('.sort_rang').change(function(e) {
            e.preventDefault(); // Prevent the default form submission
            category = getCheckboxValues("category"); // Update the category value
            loadProducts(); // Call loadProducts() to load the updated data
        });

        $(document).on("click", "label", function() {
            if ($("input:checkbox:checked")) {
                $("input:checkbox:checked", this).closest("label").addClass("active");
            }
        });
    });
    </script>

    <?php include "footer.php"?>
    <script src="js/home.js"></script>

    <script type="text/javascript">
    function search() {
        let filter = document.getElementById('find').value.toUpperCase();
        let tour = document.querySelectorAll('.box');
        let tag = document.getElementsByTagName('h3');

        for (var i = 0; i <= tag.length; i++) {
            let x = tour[i].getElementsByTagName('h3')[0];
            let value = x.innerHTML || x.innerText || x.textContent;

            if (value.toUpperCase().indexOf(filter) > -1) {
                tour[i].style.display = "";
            } else {
                tour[i].style.display = "none";
            }
        }
    }
    </script>
</body>

</html>