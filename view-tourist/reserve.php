<?php 
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}
$hid=$_GET['hid'];
$typeid = $_GET['typeID'];
$roomNo = $_GET['roomno'];
$price = $_GET['price'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];


?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">
    <link rel="stylesheet" href="../css/tourist.css">
    <link rel="stylesheet" href="../css/hotel.css">

    <style>
    html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-padding-top: 6rem;
        scroll-behavior: smooth;
    }
    </style>
</head>

<body>
    <?php include "header.php"?>


    <section class="hotel2" id="hotel" style="padding: 2rem 9%;margin-bottom:50px;">
        <div class="container" style="overflow:auto;">
            <div class="res1" style="padding:30px;">
                <form method="post" action="../api/checkout.php" enctype="multipart/form-data">
                    <div class="heading" style="margin-top:0px;text-align:left;">Your Details</div>
                    <hr>
                    <input type="hidden" class="subfield" name="hid" value="<?php echo $hid;?>" />
                    <input type="hidden" class="subfield" name="tid" value="<?php echo $id;?>" />
                    <input type="hidden" class="subfield" name="roomno" value="<?php echo $roomNo;?>" />
                    <input type="hidden" class="subfield" name="typeid" value="<?php echo $typeid;?>" />

                    <div class="subheading" style="margin-top:15px;">Name*</div>
                    <div>Please give us the name of one of the people staying in this room.</div>
                    <input type="text" class="subfield" name="guestName" />

                    <div class="content">Email Address*</div>
                    <input type="text" class="subfield" name="guestEmail" />

                    <div class="content">Mobile Number*</div>
                    <input type="text" class="subfield" name="guestPhone" />

                    <div class="content">Check-In Date</div>
                    <input type="date" class="subfield" name="checkInDate" value="<?php echo $checkin;?>" readonly />

                    <div class="content">Check-out Date</div>
                    <input type="date" class="subfield" name="checkOutDate" value="<?php echo $checkout;?>" readonly />
                    <div class="content">Total Amount ($)</div>
                    <input type="text" class="subfield" id="totalamount" name="totalamount" value=" " readonly />

                    <!-- <input type="submit" value="Pay at Hotel" class="pay" style="margin-top:50px;"/> -->
                    <!-- <?php echo '<a href="reserve.php?id= class="payhotel" style="margin-top:50px;">Pay</a>'?> -->
                    <div style="margin-top:20px;margin-left:240px;">
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_51MlRwNLkwnMeV4KrakhfHzMSWe8uOGMTgdxT6UBukJUP0AJB9memAAlcnkBEShf1HWwMH3wFaBV1XROZ7TQidM5y00OM0lgTax">
                        </script>



                    </div>
                </form>
            </div>

            <div class="res2" style="padding:30px;">

                <?php
require_once "../controller/roomTypeController.php";
$room = new roomTypeController();
$results = $room->viewType($typeid);
foreach ($results as $result) {
    ?>
                <div class="slideshow-container">
                    <?php
require_once "../controller/roomTypeController.php";
    $tp = new roomTypeController();
    $rows = $tp->viewAllImgs($typeid);
    foreach ($rows as $row) {
        ?>
                    <div class="mySlides fade">
                        <?php echo "<img src='../images/" . $row['image'] . "' style='width:100%'>"; ?>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    <?php }?>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;"><?php echo $result['typeName']; ?></h3>
                    <br>
                    <h2><?php echo $result['description']; ?></h2>
                    <br>
                    <h2 id="price">Price : <?php echo $price; ?></h2>
                    <h2>checkin Date : <?php echo $checkin; ?></h2>
                    <h2>checkout Date : <?php echo $checkout; ?></h2>
                    <h2 onload="nights('<?php echo $checkin; ?>', '<?php echo $checkout; ?>')"> No. of nights: &nbsp;
                        <div id="days" style="display: inline-block;"></div>
                    </h2>
                    <h2 onload="calculateTotal('<?php echo $price; ?>', document.getElementById('days').innerHTML)">
                        Total Amount: $&nbsp;<div id="tot" style="display: inline-block;"></div>
                    </h2>




                </div>


                <?php }?>


            </div>
        </div>
        </div>
    </section>

    <?php include "footer.php"?>


    <script>
    function nights(checkin, checkout) {
        const checkinDate = new Date(checkin);
        const checkoutDate = new Date(checkout);

        const diffMs = checkoutDate.getTime() - checkinDate.getTime();
        const diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
        const daysElement = document.getElementById("days");
        daysElement.innerHTML = diffDays;
    }

    nights('<?php echo $checkin; ?>', '<?php echo $checkout; ?>');

    function calculateTotal(price, days) {
        var total = parseInt(price) * parseInt(days);
        console.log(total);
        document.getElementById("tot").innerHTML = total;
        document.getElementById("totalamount").value = total;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var price = "<?php echo $price; ?>";
        var days = document.getElementById('days').innerHTML;
        calculateTotal(price, days);
    });


    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
    </script>
</body>



</html>