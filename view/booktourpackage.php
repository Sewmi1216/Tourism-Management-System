<!DOCTYPE html>
<html>
<head>
  <title> Tour Package Reservation</title>
  <link rel="stylesheet" href="../css/reserve.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="../css/tourist-tourpackage.css">
</head>

<body>

        <div class="navbar">
        
        <ul>
        <img src="../img/logo.png" alt=" logo" style="width:40px;height:40px; margin-left: 20px;" >
        
        </ul>
        </div>

        <div class="b2sr">
        <p style="color:white">BACK TO SEARCH RESULTS</p>
        <!-- </div>

        <div class="r1">
        <img src="../img/r1.png " style="width: 510px; height: 357px; border-radius: 20px;" alt=" r1" >
        </div>

        <div class="r2">
        <img src="../img/r2.png" style="width: 203px; height:140px; border-radius: 20px;" alt=" r2" >
        </div>

        <div class="r3">
        <img src="../img/r3.png" style="width: 285px; height:140px; border-radius: 20px;" alt=" r3" >
        </div>

        <div class="r4">
        <img src="../img/r4.png" style="width: 287px; height:197px; border-radius: 20px;" alt=" r4" >
        </div>

        <div class="r5">
        <img src="../img/r5.png" style="width: 208px; height:197px; border-radius: 20px;" alt=" r5" >
        </div> -->

        
        <section class="book" id="book">

<h1 class="heading">
    <span>b</span>
    <span>o</span>
    <span>o</span>
    <span>k</span>
    <span class="space"></span>
    <span>n</span>
    <span>o</span>
    <span>w</span>
</h1>

<div class="row">

    <div class="image">
    <img src="../images/tourpackage/k1.jpg" alt="">
    <img src="../images/tourpackage/k2.jpg" alt="">
    </div>

    <div class="image">
    <img src="../images/tourpackage/k3.jpg" alt="">
    <img src="../images/tourpackage/k4.jpg" alt="">
    </div>
    <form action="../api/booktourpackage.php" method="POST">
        <div class="inputBox">
            <h3> Name of Guest</h3>
            <input type="text" placeholder="place name" name="guestname">
        </div>

        <div class="inputBox">
            <h3>Email Address</h3>
            <input type="text" placeholder="place name" name="emailaddress">
        </div>

        <div class="inputBox">
            <h3>Mobile Number </h3>
            <input type="text" placeholder="place name" name= "mobilenumber">
        </div>


        <div class="inputBox">
            <h3>Number Of Guests</h3>
            <input type="number" placeholder="number of guests" name= noofpartiicipants>
        </div>
        <div class="inputBox">
            <h3>Arrivals</h3>
            <input type="date" name ="arrivaldate">
        </div>
   
        <input type="submit" class="btn" value="book now">
    </form>

</div>

</section>























        <!-- <div class="set">
        <div class="des">
            <p> <b>Hotel Golden Pearl  - Tranquil Triple - Suite </b><br>
                    Spacious, beautiful, first class suite room for <br>
                    three individuals with Air-Conditioner & Water heater<br>
                    Cozy balcony - Pleasant view <br>  
                    Breakfast available<br>
                    Pool can be accessed</p>
            </div>
    
            <div class="date"> 
                <label for="checkin-date">Check-in Date</label>
                <div class="dbox">
                <input type="date" id="checkin-date" name="checkin" required>
            </div>
              </div><br>
              <div class="date">
                <label for="checkout-date">Check-out Date</label>
                <div class="dbox">
                <input type="date" id="checkout-date" name="checkout" required>
            </div>
              </div>
    
             <div class="left">
              <p>Available Rooms</p>
              <p>No of Rooms</p>
              <p>Unit Price</p>
              <p>Sub Total</p>
             </div>

            </div>
    
             <div class="right">
                <p><b>10</b></p>
                <div class="box">
                  <p>1</p>
                </div>
                <p> <b>US $115.99</b></p>
                <p> <b>xxxx</b></p>
             </div> -->

             <section class="gallery" id="gallery">

    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span>
    </h1>

    <div class="box-container">

        <div class="box">
        <img src="../images/tourpackage/k16.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
        <img src="../images/tourpackage/k17.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
        <img src="../images/tourpackage/k6.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
        <img src="../images/tourpackage/k8.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
        <img src="../images/tourpackage/k9.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
        <img src="../images/tourpackage/k10.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
        <img src="../images/tourpackage/k11.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
        <img src="../images/tourpackage/k14.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
        <img src="../images/tourpackage/k12.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>

    </div>

</section>

          </body>




</html>