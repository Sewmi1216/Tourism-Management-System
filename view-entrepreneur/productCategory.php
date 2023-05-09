<?php
session_start();
$user = "";
if (isset($_SESSION["email"]) && isset($_SESSION["entID"])) {
    $id = $_SESSION["entID"];
} else {
    header("location:../view-hotel/login.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
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
                <div class="page-title"> Product Categories</div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for categories" name="search" id="myInput"
                        onkeyup="searchTypes()">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
                <button type="submit" class="btns" style="margin-left: 1rem;"><a href="productCategory.php"
                        style="color:white;text-decoration:none;">View
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
                <table id="myTable">
                    <tr class="subtext tblrw">
                        <th class="tblh">Product Category</th>
                        <th class="tblh">Description</th>
                        <th class="tblh">Add photos</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr> <?php
require_once "../controller/productCategoryController.php";
$ctg = new productCategoryController();
$results = $ctg->viewAllCategories($id);
foreach ($results as $result) {
    ?><tbody>
                        <tr class="subtext tblrw">
                            
                            <td class="tbld"><?php echo $result["categoryName"] ?></td>
                            <td class="tbld"><?php echo $result["description"] ?></td>

                            <td class="tbld">
                                <?php echo "<a href='addPhotos.php?id=$result[product_categoryId]'>"; ?>
                                <i class="fa-solid fa-images"></i>
                                <?php echo "</a>" ?>
                            </td>
                            <td class="tbld"><a
                                    onclick="document.getElementById('id02').style.display='block';loadData(this.getAttribute('data-id'));"
                                    data-id="<?php echo $result['product_categoryId']; ?>"><i
                                        class="fa-solid fa-pen-to-square art"></i></a></td>
                            <td class="tbld"><a onclick="openModal(<?php echo $result['product_categoryId']; ?>)"><i
                                        class="fa-solid fa-trash art"></i></a></td>

                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
        </div>

        <!-- add room type -->
        <?php require_once 'addProductCategory.php';?>

        <!-- update room type -->
        <?php require_once 'updateProductCategory.php';?>

        <!-- delete room type -->
        <?php require_once 'deleteProductCategory.php';?>

    </section>

    <script>
    // Function to open the modal and set the id value
    function openModal(id) {
        var modal = document.getElementById("id04");
        var modalIdValue = document.getElementById("modalIdValue");
        modalIdValue.value = id;
        modal.style.display = "block";
    }

    function searchTypes() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
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


    function loadData(id) {
        $.ajax({
            url: "../api/addCategory.php",
            method: "POST",
            data: {
                get_data: 1,
                id: id,
            },
            success: function(response) {
                console.log(response);
                var type = JSON.parse(response);
                $("#categoryid").val(type.product_categoryId);
                $("#categoryname").val(type.categoryName);
                $("#desc").val(type.description);
                // $("#status").val(type.typestatus);
                $("#price").val(type.price);
                // $("#img").attr("src", "../images/" + type.img);
                $('#status').val(type.typestatus);

            }
        });
    }
    </script>


</body>

</html>