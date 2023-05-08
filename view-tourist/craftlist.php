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
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

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
    <?php include "footer.php"?>
    
    <script src="js/productlist.js"></script>
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