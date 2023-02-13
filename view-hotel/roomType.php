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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>

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
                <div class="page-title"> Room Types </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for packages" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns" style="margin-left: 1rem;"><a href="roomType.php" style="color:white;text-decoration:none;">View
                        All</a></button>
                <span style="margin-left: 8px;">
                    <a onclick="document.getElementById('id01').style.display='block'"><i
                            class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span>
            </div>

        </div>
        <div class="bg">

            <div id="result" style="overflow-x:auto;">
                <table id="example">
                    <tr class="subtext tblrw">
                        <th class="tblh">Image</th>
                        <th class="tblh">Room Type</th>
                        <th class="tblh">Price</th>
                        <th class="tblh">Status</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr> <?php
require_once "../controller/roomTypeController.php";
$pkg = new roomTypeController();
$results = $pkg->viewAllTypes();
foreach ($results as $result) {
    ?><tbody>
                        <tr class="subtext tblrw">
                            <td class="tbld">
                                <?php echo "<img src='../images/" . $result['img'] . "' style=
                    'border-radius: 50%;width:50px;height: 50px;background-size: 100%;
                    background-repeat: no-repeat;'>"; ?>
                            </td>
                            <td class="tbld"><?php echo $result["typeName"] ?></td>
                            <td class="tbld"><?php echo $result["price"] ?></td>
                            <td class="tbld">
                                <?php if ($result["typestatus"] == "Available") {?>
                                <button class="status1"><?php echo $result["typestatus"]; ?></button>
                                <?php } else {?>
                                <button class="status2"><?php echo $result["typestatus"]; ?></button>
                                <?php }?>
                            </td>
                            <td class="tbld"><a
                                    onclick="document.getElementById('id03').style.display='block';document.location='#id03?typeID=<?php $typeID = $result['roomTypeId'];?>'"><i
                                        class="fa-sharp fa-solid fa-bars art"></i></a></td>
                            <!-- <td class="tbld"><button data-id='<?php echo $result['roomTypeId']; ?>' class="help"> view </button></td> -->
                            <td class="tbld"><a onclick="document.getElementById('id02').style.display='block';loadData(this.getAttribute('data-id'));" data-id="<?php echo $result['roomTypeId']; ?>"><i
                                        class="fa-solid fa-pen-to-square art"></i></a></td>
                            <td class="tbld"><a onclick="openModal(<?php echo $result['roomTypeId']; ?>)"><i
                                        class="fa-solid fa-trash art"></i></a></td>
                            <?php }

?>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
        </div>

        <!-- add room type -->
        <?php require_once 'addRoomType.php';?>

        <!-- view room type -->
        <?php require_once 'viewType.php';?>

        <!-- update room type -->
        <?php require_once 'updateRoomType.php';?>

        <!-- delete room type -->
        <?php require_once 'deleteRoomType.php';?>

    </section>

    <script>
    // Function to open the modal and set the id value
    function openModal(id) {
        var modal = document.getElementById("id04");
        var modalIdValue = document.getElementById("modalIdValue");
        modalIdValue.value = id;
        modal.style.display = "block";
    }

    function loadData(id) {
    	$.ajax({
    	    url: "../api/addtype.php",
    	    method: "POST",
    	    data: {
                get_data: 1, 
                id: id,
            },
    	    success: function (response) {
    	        console.log(response);
                var type = JSON.parse(response);
                $("#typeid").val(type.roomTypeId);
                $("#typename").val(type.typeName);
                $("#desc").val(type.description);
                // $("#status").val(type.typestatus);
                $("#price").val(type.price);
                $("#img").attr("src", "../images/" + type.img);
                $('#status').val(type.typestatus);

    	    }
        });
    }
</script>
</body>

</html>