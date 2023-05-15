<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["adminID"])) {
} else {
    header("location:login.php");
}


?>

<?php 
        require_once("../controller/tourguidecontroller.php");
        $penguide = new tourguidecontroller();
        $results = $penguide->viewavailableTourguide();
        print_r($results);
        die();
        // echo "Hi";
        // die();

        foreach ($results as $result) {
            $tourguideID = $result["tourguideID"];
            $selectedValue = "";
        if ($tourguideID == $result["tourguideID"]) {
    $selectedValue = "selected"; }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="../libs/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="../css/entrepreneur.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
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
                <div class="page-title"> Assign Tour Guide </div>


            </div>
        </div>

        <div style="margin-top:20px;margin-left:10px;" class="chart">
            <form action="" method="post">
                <span class="c" style="background-color:white;">
                <td class="tbld">
                                
                                    

                                </select>
                            </td>
                    <table style="margin:auto;margin-top:80px;">


                    <tr>
                            <td>
                                <div class="content"> Booking Id</div>
                                


                            </td>
                            <td>
                               <?php echo $_GET["reservation_id"] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="content">Assign Guide</div>
                            </td>
                            <td style="margin:auto;margin-top:80px;">

                            <select class="tourguide" name="tourGuideId">
                                    <option name="guideid" value="<?php echo $result["tourGuideId"]; ?>">
                                        <?php echo $tourguideID; ?>
                                    </option>



                            </td> 
                        </tr>
                        
                    </table>
                    <input type="submit" class="btnRegister" style="width:20%;margin-top:80px;" value="Update" name="update" />
                

                    <!-- <?php
//  if (isset($_POST['update'])) {
//     $from = $_POST['from'];
//     $to = $_POST['to'];

//     $guide = new tourguideController();
//     $guide->updateAvailability($from, $to, $id);
   // }?> -->

<?php
 if (isset($_POST['update'])) 
    {
    $newGuide = $_POST['tourGuideId'];
    $bookingID = $_GET["reservation_id"];
    $guide = new tourguideController();
    $guide->updateGuide($bookingId, $newGuide);
    }
?>

                </span>
        </div>
        </form>
    </section>

    <!-- <script>
        $('.subfield').on('change', function() {
            var newStatus = $(this).val();
            var bookingId = $(this).closest('tr').find('.tbld:nth-child(2)').text();
            $.ajax({
                url: '../api/update_bookingstatus.php',
                type: 'POST',
                data: {
                    bookingId: bookingId,
                    newStatus: newStatus
                },
                success: function(response) {
                    console.log(response);
                    alert('Status update is successful');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
        </script> -->
</body>

</html>