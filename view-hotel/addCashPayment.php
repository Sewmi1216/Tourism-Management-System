<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:hotelLogin.php");
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
        <!-- <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Add Cash Payments</div>

            </div>
        </div> -->
        <form class="modal-content animate" method="post" action="" enctype="multipart/form-data">
                <div class="imgcontainer" style="background-color:#004581;">
                    <label for="room" style="color:white"><b>Add Cash Payments</b></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Reservation ID</div>
                            </td>
                            <td> <input type="text" class="subfield" name="reservationIdInput" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Guest Name</div>
                            </td>
                            <td> <input type="text" id="guestNameInput" class="subfield" name="pName" /></td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status" id="statusInput">
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
                            <td> <input type="number" id="priceInput" min="10" class="subfield" name="price" /></td>
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
                    <button type="button" onclick="window.location.href='payment.php'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="btns" value="Save" name="save" style="margin-left:75px;">Save</button>
                </div>
            </form>


    </section>

    
<script>
  const reservationIdInput = document.getElementById('reservationIdInput');

  reservationIdInput.addEventListener('input', (event) => {
    const reservationId = event.target.value;

    // Make AJAX request to server to retrieve reservation information
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `/api/addtype.php/${reservationId}`);
    xhr.onload = () => {
      if (xhr.status === 200) {
        const reservation = JSON.parse(xhr.responseText);

        // Update other input fields with reservation information
        document.getElementById('guestNameInput').value = guest_reservation.guestName;
        document.getElementById('statusInput').value = guest_reservation.status;
        document.getElementById('priceInput').value = guest_reservation.total_amount;
      } else {
        // Handle error
      }
    };
    xhr.send();
  });
</script>

</body>

</html>