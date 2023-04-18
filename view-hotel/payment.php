<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
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
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for rooms" name="search" id="searcher"
                        onkeyup="searchRes()">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns" style="margin-left:1rem;">View All</button>
                <!-- <span style="margin-left: 8px;">
                    <a href="addCashPayment.php"><i
                            class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span> -->
            </div>

        </div>
        <div class="bg">
            <table id="tbl">
                <tr class="subtext tblrw">
                    <th class="tblh">Payment ID</th>
                    <th class="tblh">Date</th>
                    <th class="tblh">Reservation ID</th>
                    <!-- <th class="tblh">Guest Name</th> -->
                    <th class="tblh">Guest Phone number</th>
                    <th class="tblh">Type</th>
                    <th class="tblh">Total amount</th>
                    <th class="tblh">Status</th>
                </tr>

                <?php
require_once "../controller/hotelController.php";
$pay = new hotelController();

$results = $pay->viewhotelPayments($id);
foreach ($results as $result) {
    ?><tbody>
                    <tr class="subtext tblrw">

                        <td class="tbld"><?php echo $result["paymentID"] ?></td>
                        <td class="tbld"><?php echo $result["bookingDateTime"] ?></td>
                        <td class="tbld"><?php echo $result["reservationID"] ?></td>
                        <!-- <td class="tbld"><?php echo $result["guestName"] ?></td> -->
                        <td class="tbld"><?php echo $result["guestPhone"] ?></td>
                        <td class="tbld"><?php echo $result["type"] ?></td>
                        <td class="tbld"><?php echo '$' .$result["total_amount"] ?></td>
                        <td class="tbld">
                            <?php if ($result["typestatus"] == "Completed") {?>
                            <button class="status1"><?php echo $result["paymentStatus"]; ?></button>
                            <?php } else {?>
                            <button class="status2"><?php echo $result["paymentStatus"]; ?></button>
                            <?php }?>
                        </td>


                        <?php }

?>
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
    <script>
    function searchRes() {
        console.log(print);
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searcher");
        filter = input.value.toUpperCase();
        table = document.getElementById("tbl");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>
</body>

</html>