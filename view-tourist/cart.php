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
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="navbar">

        <ul>
            <img src="../img/logo.png" alt=" logo" style="width:40px;height:40px; margin-left: 20px;">


        </ul>
    </div>

    <div>

        <form class="example" action="/action_page.php">

            <input type="text" placeholder="Search Products" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>

            <i class="fa fa-shopping-cart" style="margin-left:100px;"></i>
        </form>
    </div>



    <div class="h">
        <h2><b>SHOPPING CART</b></h2>
    </div>

    <div class="container bootdey">
        <div class="row bootstrap snippets">
            <div class="col-lg-3 col-md-3 col-sm-12">

            </div>
            <div class="clearfix visible-sm"></div>
            <!-- Cart -->
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="col-lg-12 col-sm-12">
                    <span class="title">SHOPPING CART</span>
                </div>
                <div class="col-lg-12 col-sm-12 hero-feature">
                    <div class="table-responsive">
                        <table class="table table-bordered tbl-cart">
                            <thead>
                                <tr>
                                    <td class="hidden-xs">Image</td>
                                    <td>Product Name</td>
                                    <td>Size</td>
                                    <td>Color</td>
                                    <td class="td-qty">Quantity</td>
                                    <td>Unit Price</td>
                                    <td>Sub Total</td>
                                    <td>Remove</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hidden-xs">
                                        <a href="#">
                                            <img src="https://via.placeholder.com/200x200/"
                                                alt="Age Of Wisdom Tan Graphic Tee" title="" width="47" height="47">
                                        </a>
                                    </td>
                                    <td><a href="#">Age Of Wisdom Tan Graphic Tee</a>
                                    </td>
                                    <td>
                                        <select name="">
                                            <option value="" selected="selected">S</option>
                                            <option value="">M</option>
                                        </select>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <div class="input-group bootstrap-touchspin"><span
                                                class="input-group-btn"><button
                                                    class="btn btn-default bootstrap-touchspin-down"
                                                    type="button">-</button></span><span
                                                class="input-group-addon bootstrap-touchspin-prefix"
                                                style="display: none;"></span><input type="text" name="" value="1"
                                                class="input-qty form-control text-center" style="display: block;"><span
                                                class="input-group-addon bootstrap-touchspin-postfix"
                                                style="display: none;"></span><span class="input-group-btn"><button
                                                    class="btn btn-default bootstrap-touchspin-up"
                                                    type="button">+</button></span></div>
                                    </td>
                                    <td class="price">$ 122.21</td>
                                    <td>$ 122.21</td>
                                    <td class="text-center">
                                        <a href="#" class="remove_cart" rel="2">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hidden-xs">
                                        <a href="#">
                                            <img src="https://via.placeholder.com/200x200/"
                                                alt="Adidas Men Red Printed T-shirt" title="" width="47" height="47">
                                        </a>
                                    </td>
                                    <td><a href="#">Adidas Men Red Printed T-shirt</a>
                                    </td>
                                    <td>
                                        <select name="">
                                            <option value="">S</option>
                                            <option value="" selected="selected">M</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="">
                                            <option value="" selected="selected">Red</option>
                                            <option value="">Blue</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="input-group bootstrap-touchspin"><span
                                                class="input-group-btn"><button
                                                    class="btn btn-default bootstrap-touchspin-down"
                                                    type="button">-</button></span><span
                                                class="input-group-addon bootstrap-touchspin-prefix"
                                                style="display: none;"></span><input type="text" name="" value="2"
                                                class="input-qty form-control text-center" style="display: block;"><span
                                                class="input-group-addon bootstrap-touchspin-postfix"
                                                style="display: none;"></span><span class="input-group-btn"><button
                                                    class="btn btn-default bootstrap-touchspin-up"
                                                    type="button">+</button></span></div>
                                    </td>
                                    <td class="price">$ 20.63</td>
                                    <td>$ 41.26</td>
                                    <td class="text-center">
                                        <a href="#" class="remove_cart" rel="1">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="right">Total</td>
                                    <td class="total" colspan="2"><b>$ 163.47</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- End Cart -->
        </div>
    </div>




    <div class="ctotal">
        <p>CART TOTAL: <?php echo' ' .$total . ''; ?> </p>
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