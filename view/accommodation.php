<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/hindex.css">

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
    <div class="nav" id="topnav">
        <a href="home.php" class="logo"><img src="../images/logo.png" alt="Logo" height="50px" width="90px"
                style="padding-left:10px;"></a>
        <div style="padding-top:15px;" class="middle">
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            <a href="../view-hotel/hotelLogin.php">Login</a>
            <a href="#contact">Contact Us</a>
            <a href="#about">About</a>
            <a href="../view/accommodation.php">Accommodation</a>
            <a href="#handi">Handicrafts</a>
            <a href="#tour">Tour Packages</a>
            <a href="../view-hotel/home.php">Home</a>
        </div>
    </div>


    <section class="hotel" id="hotel" style="padding-top = 40px">
        <form action="">
            <div class="searchSec" style="margin-top:20px;">
                <table>
                    <tr>
                        <th>
                            <div class="text">Destination</div>
                        </th>
                        <th>
                            <div>Check-In</div>
                        </th>
                        <th>
                            <div>Check-Out</div>
                        </th>
                        <th>
                            <div>No.of rooms</div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-container">
                                <input class="input-field" type="text" placeholder="Destination" name="search">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="date" placeholder="check-In" name="search">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="date" placeholder="check-Out" name="search">
                            </div>
                        </td>
                        <td>
                            <div class="input-container" style="margin-left: 1rem;">
                                <input class="input-field" type="number" placeholder="No.of rooms" name="search" onfocus="showMessage(true)" onblur="showMessage(false)">
                                
                            </div>
                            
                        </td>
                    </tr>
                    
                </table>

                <button type="submit" class="btns" style="margin-left: 1rem;margin-top:20px;"><a href="roomType.php"
                        style="color:white;text-decoration:none;">Search</a></button>
                        
            </div>
            <p id="dem" style="display:none;">***One room can accommodate only 2 people</p>
        </form>
        <div class="box-container">

            <div class="box">
                <img src="../images/h3.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Sizzling Single</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price"> $90.00 <span>$120.00</span> </div>
                    <a href="reservehotel.php" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="../images/h3.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Dreamy Double </h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price"> $90.00 <span>$120.00</span> </div>
                    <a href="reservehotel.php" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="../images/h3.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>Tranquil Triple</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nam!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price"> $90.00 <span>$120.00</span> </div>
                    <a href="#" class="btn">book now</a>
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


    <script src="js/home.js"></script>
    <script>
function showMessage(show) {
  var messageElement = document.getElementById("dem");
  if (show) {
    messageElement.style.display = "block"; // or "inline"
  } else {
    messageElement.style.display = "none";
  }
}
</script>
</body>

</html>