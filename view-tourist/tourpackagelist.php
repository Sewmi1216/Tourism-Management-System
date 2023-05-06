<?php
require '../api/viewtourpackage.php';
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
        <div class="cont">
            <div class="search">
                <h1>Sri Lanka Tour Packages</h1>
                <input type="text" name="" id="find" onfocus="this.placeholder=''" placeholder="Search Tour Package...."
                    onkeyup="search()">
            </div>
        </div>

        <div class="container">
            <?php
require_once "../controller/touristController.php";
$tour = new touristController();
$results = $tour->viewAllTourPackages();
foreach ($results as $result) {
    ?>
            <div class="box">
                <div class="slideshow-container">
                    <?php
        require_once("../controller/tourpackagecontroller.php") ;
        $tp = new tourpackageController();
        $rows = $tp->viewAllImgs($result['packageID']);
        foreach ($rows as $row) {
      ?>
                    <div class="mySlides fade <?php echo $result['packageName']; ?>">
                        <?php echo "<img src='../images/" . $row['image'] . "' style='width:100%'>";?>
                    </div>
                    <?php } ?>
                    <a class="prev" onclick="plusSlides(-1, '<?php echo $result['packageName']; ?>')">❮</a>
                    <a class="next" onclick="plusSlides(1, '<?php echo $result['packageName']; ?>')">❯</a>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;"><?php echo $result['packageName']; ?></h3>
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="tourpackage.php?pid=<?php echo $result['packageID']; ?>" class="btn">More Information</a>
                </div>
            </div>
            <?php }?>
        </div>


    </section>
    <?php include "footer.php"?>

    <script src="js/home.js"></script>
    <script type="text/javascript">
    // function showMessage(show) {
    //     var messageElement = document.getElementById("dem");
    //     if (show) {
    //         messageElement.style.display = "block"; // or "inline"
    //     } else {
    //         messageElement.style.display = "none";
    //     }
    // }
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
    let slideIndex = {};

    <?php
    foreach ($results as $result) {
      echo "slideIndex['" . $result['packageName'] . "'] = 1;\n";
    }
  ?>

    function plusSlides(n, packageName) {
        showSlides(slideIndex[packageName] += n, packageName);
    }

    function currentSlide(n, packageName) {
        showSlides(slideIndex[packageName] = n, packageName);
    }

    function showSlides(n, packageName) {
        let i;
        let slides = document.getElementsByClassName("mySlides " + packageName);
        if (n > slides.length) {
            slideIndex[packageName] = 1
        }
        if (n < 1) {
            slideIndex[packageName] = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex[packageName] - 1].style.display = "block";
    }

    // Call the showSlides function for each room type
    <?php
    foreach ($results as $result) {
      echo "showSlides(1, '" . $result['packageName'] . "');\n";
    }
  ?>
    </script>
</body>

</html>