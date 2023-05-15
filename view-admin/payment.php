
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title">Payments</div>
           
               
                <span style="margin-left: 8px;">

                </span>
            </div>

        </div>
        <div class="bg">
            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Payment ID</th>
                    <th class="tblh">Date</th>
                    <th class="tblh">Booking ID</th>
                    <th class="tblh">Tour package ID</th>
                    <th class="tblh">Guest Name</th>
                    <th class="tblh">Guest Phone number</th>
                   
                    <th class="tblh">Total amount</th>
                    <th class="tblh">Status</th>
                </tr>
                <?php
require_once "../controller/tourbookingController.php";
$pay = new tourbookingController();
$results = $pay->viewalltourbookingPayments();
foreach ($results as $result) {
    
    ?><tbody>
                <tbody>
                     <tr class="subtext tblrw">

                        <td class="tbld"><?php echo $result["tourPaymentId"] ?></td>
                        <td class="tbld"><?php echo $result["paymentDateTime"] ?></td>
                        <td class="tbld"><?php echo $result["bookingID"] ?></td>
                        <td class="tbld"><?php echo $result["tourPkgID"] ?></td>
                        <td class="tbld"> <?php echo $result["guestName"] ?></td>
                        <td class="tbld"><?php echo $result["guestPhone"] ?></td>
                        <td class="tbld"><?php echo '$' .$result["amount"] ?></td>
                        <td class="tbld">
                               Completed
                            </td>

<?php } ?>
                       


                    </tr>
            </table>

    <tbody>
    
                    </tr>
            </table>
        </div>
        </div>
        </div>

        <!-- add cash payement -->
        <div id="id01" class="modal">

            <form class="modal-content animate" method="post" action="../api/addpkg.php" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Add Payments</b></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Reservation ID</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Guest Name</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName" /></td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status">
                                    <option value="" selected>---Choose availability---</option>
                                    <option value="Available">Pending</option>
                                    <option value="Unavailable">Completed</option>
                                    <option value="Unavailable">Cancelled</option>
                                </select></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Price</div>
                            </td>
                            <td> <input type="number" min="10" class="subfield" name="price" /></td>
                        </tr>



                        <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->


                    </table>

                </div>

                <div class="container" style="background-color:#f1f1f1; padding:10px;">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="btns" value="Save" name="save" style="margin-left:75px;">Save</button>
                </div>
            </form>
        </div>



    </section>

</body>

</html>