<?php 

session_start();
require '../model/tourist.php';
$tourist = new tourist();
$res2 = $tourist->getproduct($_GET['product']);
$result = mysqli_fetch_assoc($res2);


?>
<!DOCTYPE html>
<html>
<head>
  <title> Place Craft Order</title>
  <link rel="stylesheet" href="../css/order.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <div class="navbar">
        
        <ul>
          <img src="../img/logo.png" alt=" logo" style="width:55px;height:40px; margin-left: 20px; margin-top: 5px;" >
          <div class="home-btn">
            <img class="home-img" src="./img/home.png" alt="">
         <a class="home-text" href="craft_list.php">HOME</a>
          </div>
       
        </ul>
      </div>


 <p class="back-text" ><a href="./craft_list.php">BACK TO SEARCH RESULTS</a> </p>

    <form action="../api/addcart.php?product=<?php echo $_GET['product'] ?>" method="POST">

    <img class="o1" src="../img/<?php echo $result['productImg']?>" alt="">

    
    <div class="info">
        <p><?php echo $result['productName']?></p>
        <div class="quantity">
            <label for="fname">Quantity</label>
          </div>
          <div class="qbox">
            <input type="number" id="q" name="quantity" placeholder="" required min="1">
          </div>

          <div class="price">
            <p>&nbsp;</p>
          <p>Unit Price</p>
          <p>Shipping</p>
          </div>

          <div class="shipping">
            <p>LKR <?php echo $result['price']?></p>
            <p>Free Shipping</p>
            </div>

          </div>

            <div class="buy-buttons">
              
              <button type="submit" name="buy" class="buy">BUY IT NOW </button>
              <button type="submit" name="cart" class="cart"> ADD TO CART</button>
              <button type="submit" name="watch" class="watch"> ADD TO WATCH LIST</button>
            </div>
          </form>

            <div class="similar">
            <p>SIMILAR PRODUCTS</p>
          </div>

          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="#">
                <img src="../img/o2.png" alt="">
              </a>
              <div class="desc">Devil-Mask</div>
            </div>
          </div>
          
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="#">
                <img src="../img/o3.png" alt="">
              </a>
              <div class="desc">Yaka-Mask</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="#">
                <img src="../img/o4.png" alt="">
              </a>
              <div class="desc">Decorative-Mask</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="#">
                <img src="../img/o5.png" alt="">
              </a>
              <div class="desc">Wood-Mask</div>
            </div>
          </div>

    

  
  </div>


    
 



</body>
</html>