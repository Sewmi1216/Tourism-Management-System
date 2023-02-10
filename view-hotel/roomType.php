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
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script> -->
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
                <button type="submit" class="btns"><a href="roomType.php" style="color:white;text-decoration:none;">View
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
                                    onclick="document.getElementById('id03').style.display='block';document.location='#id03?typeID=<?php $typeID =$result['roomTypeId']; ?>'"><i
                                        class="fa-sharp fa-solid fa-bars art"></i></a></td>
                            <!-- <td class="tbld"><button data-id='<?php echo $result['roomTypeId']; ?>' class="help"> view </button></td> -->
                            <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
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

        <!-- add hotel package -->
        <div id="id01" class="modal">

            <form class="modal-content animate" method="post" action="../api/addType.php" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Add Room Types</b><hr style="margin-top:25px;"></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Room Type Name</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Description</div>
                            </td>
                            <td>
                                <textarea class="subtextfield" name="desc" rows="8" cols="50"></textarea>
                            </td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status">
                                    <option value="" selected>---Choose availability---</option>
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Price</div>
                            </td>
                            <td> <input type="number" min="10" class="subfield" name="price" /></td>
                        </tr>


                        <tr class="row">
                            <td>
                                <div class="content">Upload Image</div>
                            </td>
                            <td> <input type="file" class="subfield" name="file" /></td>
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

        <!-- view pkg -->
        <?php require_once 'viewType.php';?>


        <!-- update pkg -->
        <div id="id02" class="modal">

            <form class="modal-content animate" method="post" action="../api/addType.php" enctype="multipart/form-data">
                <?php
require_once "../controller/roomTypeController.php";
$pkg = new roomTypeController();
$result = $pkg->viewType($typeID);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>

                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Update Hotel Package</b><hr style="margin-top:25px;"></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <input type="hidden" class="subfield" name="id" value="<?php echo $typeID ?>" ?>
                        </tr>
                        <tr class="row">

                            <td>
                                <div class="content">Hotel Package Name</div>
                            </td>
                            <td> <input type="text" class="subfield" name="pName"
                                    value="<?php echo $row['typeName']; ?>" /></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Description</div>
                            </td>
                            <td>
                                <textarea class="subtextfield" name="desc" rows="8"
                                    cols="50"><?php echo $row["description"] ?></textarea>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                            <td> <select class="subfield" name="status">
                                    <option value="Available"
                                        <?php echo ($row["typestatus"] == "Available" ? "selected" : "") ?>>Available
                                    </option>
                                    <option value="Unavailable"
                                        <?php echo ($row["typestatus"] == "Unavailable" ? "selected" : "") ?>>
                                        Unavailable</option>
                                </select></td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Price</div>
                            </td>
                            <td> <input type="number" min="10" class="subfield" name="price"
                                    value="<?php echo $row['price']; ?>" /></td>
                        </tr>


                        <tr class="row">
                            <td>
                                <div class="content">Upload Image</div>
                            </td>
                            <td> <?php echo "<img src='../images/" . $row['img'] . "' style=
                    'width:200px;height: 200px;margin-left:45px;padding-right:0px;'>"; ?>
                                <input type="file" class="subfield" name="file" />
                            </td>
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
                    <button type="button" onclick="document.getElementById('id02').style.display='none'"
                        class="cancelbtn">Cancel</button>
                    <button type="submit" class="btns" name="update" style="margin-left:75px;">Update</button>
                </div>
                <?php }
} else {
    echo "No results";
}
?>
            </form>
        </div>

        <!-- delete pkg -->
        <div id="id04" class="modal">

            <form class="modal-content animate" style="width:45%;" method="post" action="../api/addType.php"
                enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id04').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                </div>

                <div class="container">

                    <input type="hidden" id="modalIdValue" class="subfield" name="id" value="<?php echo $typeID;?>" />


                    <p class="text" style="font-size:20px;text-align:center;margin-left:90px;">Do you want to delete
                        this hotel package?</p>

                    <div class="container" style="background-color:#f1f1f1; padding:10px;">
                        <button type="button" onclick="document.getElementById('id04').style.display='none'"
                            class="cancelbtn" style="margin-left:11rem;">No</button>
                        <button type="submit" class="btns" value="Save" name="delete"
                            style="margin-left:75px;">Yes</button>
                    </div>
                </div>


            </form>
        </div>




    </section>
    <!-- $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
}); -->
    <!-- <script type='text/javascript'>
    $(document).ready(function(){
        $('.help').click(function(){
            var userid = $(this).data('id');
            // alert(userid);
            $.ajax({
                url: 'viewPkg.php',
                type:'post',
                data :{ userid: userid},
                success :function(response) {
                    $('.modal-body').html(response);
                    $('#id03').modal('show';)

                }
            })
        });
    });
</script> -->
    <script>
    //  function openModal1(id) {
    //     var modal = document.getElementById("id03");
    //     var modalIdValue = document.getElementById("modalIdValue2");
    //     modalIdValue.value = id;
    //     modal.style.display = "block";
    //   }
    // Function to open the modal and set the id value
    function openModal(id) {
        var modal = document.getElementById("id04");
        var modalIdValue = document.getElementById("modalIdValue");
        modalIdValue.value = id;
        modal.style.display = "block";
    }
    </script>
</body>

</html>