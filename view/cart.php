
<?php 

session_start();
include '../model/tourist.php';
$tourist = new tourist();
$res2 = $tourist->getallcartitems();




?>
<!DOCTYPE html>
<html>
<head>
  <title> Cart</title>
  <link rel="stylesheet" href="../css/cart.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>

    <div class="navbar">
        
        <ul>
          <img src="../img/logo.png" alt=" logo" style="width:40px;height:40px; margin-left: 20px;" >
          <li style="float:right">
            <a  href="craft_list.php">
              <button>Home</button></a></li>
       
        </ul>
      </div>

    

      <a class="back-text" href="./craft_list.php">BACK</a>

     
     <div class="h">
     <h2><b>SHOPPING CART</b></h2>
    </div>

    

      <table>
        <tr>
          <th>PRODUCT</th>
          <th>PRICE</th>
          <th>QUANTITY</th>
          <th>SHIPPING</th>
          <th>SUBTOTAL</th>
        </tr>
        <?php 
        $total = 0;
        while($result = mysqli_fetch_assoc($res2)){
          $res3 = $tourist->getproduct($result['productID']);
          $product = mysqli_fetch_assoc($res3);
          
          $subtotal = bcmul($product['price'], $result['quantity']);
          
          // print_r($result);die();
        echo ' 
        <tr>
          <td>'.$product['productName'].'</td>
          <td>'.$product['price'].'</td>
          <td>'.$result['quantity'].'</td>
          <td>none </td>
          <td>'.$subtotal.' </td>
        </tr>
        ';
        $total = $total + $subtotal;
        }; ?>
        
    
      </table>

      <div class="ctotal">
        <p>CART TOTAL:  <?php echo' ' .$total . ''; ?> </p>
      </div>
      <!-- <div class="stotal">
      <p>SUB TOTAL</p> -->
    </div>
      <div class="checkout">
        <a class="co-text" href="#">PROCEED TO CHECKOUT</a>
      </div>

   

</div>

     

     
      

   
</body>
</html>

