<?php 
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["userID"])) {
    $id = $_SESSION["userID"];
} else {
    header("location:../view-hotel/login.php");
}
$typeid = $_GET['typeid'];
$hotelID = $_GET['hotelID'];
$price = $_GET['price'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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


    <section class="hotel2" id="hotel" style="padding: 2rem 9%;">
        <div class="container">
            <div class="box" style="padding:30px;">
                <form method="post" action="../api/reserve.php" enctype="multipart/form-data">
                    <div class="heading" style="margin-top:0px;text-align:left;">Your Details</div>
                    <hr>
                    <input type="hidden" class="subfield" name="id" value="<?php echo $id;?>" />
                    <input type="hidden" class="subfield" name="hotelId" value="<?php echo $hotelID;?>" />
                    <input type="hidden" class="subfield" name="typeid" value="<?php echo $typeid;?>" />
                    <div class="subheading" style="margin-top:15px;">Name*</div>
                    <div>Please give us the name of one of the people staying in this room.</div>
                    <input type="text" class="subfield" name="guestName" />

                    <div class="content">Email Address*</div>
                    <input type="text" class="subfield" name="guestEmail" />

                    <div class="content">Mobile Number*</div>
                    <input type="text" class="subfield" name="guestPhone" />

                    <div class="content">Check-In Date</div>
                    <input type="date" class="subfield" name="checkInDate" />

                    <div class="content">Check-out Date</div>
                    <input type="date" class="subfield" name="checkOutDate" />

                    <!-- <div class="content">Number of guests</div>
                    <input type="number" class="subfield" id="guest" name="guest" onkeyup="calculateRooms()" required /> -->


                    <div class="content">Price of the room</div>
                    <input type="number" class="subfield" id="price" value="<?php echo $price;?>" />
                    <div class="content">Number of rooms</div>
                    <input type="number" class="subfield" name="room" onkeyup="calculateTotal(this.value)" required />
                    <input type="hidden" class="subfield" id="total-amount" name="total-amount" />

                    <input type="submit" id="total" name="reserve" value=" " class="btn" />
                </form>
            </div>
        </div>
        </div>
    </section>




    <section id="contact" style="padding-bottom: 20px">
        <div style="text-align:center; padding: 10px;">
            <h2 class="" style="color: #70706c;font-size:30px;">CONTACT US</h2>
            <div style="color: #babab3;font-size: 17px;padding-top: 50px">
                <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Telephone</div>
                <div>+94 -11- 2581245/ 7</div>

                <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Fax</div>
                <div>+94-11-2237239</div>

                <div style="padding: 10px;font-weight: bold;color: white;padding-top: 30px">Email</div>
                <div>info@pack2paradise.lk</div>
            </div>
        </div>
    </section>


    <script>
    // function calculateRooms(){
    //     var guest = document.getElementById('guest');
    //     if(guest)
    // }


    function calculateTotal(roomValue) {
        const room = parseInt(roomValue);
        var price = parseFloat(document.getElementById('price').value);
        var total = room * price;
        console.log(room);
        document.getElementById("total-amount").value = total;
        document.getElementById("total").value = 'Pay $' + total;
    }
    </script>
</body>



</html>