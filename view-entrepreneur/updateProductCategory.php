<!-- update product category-->
<div id="id02" class="modal">

    <form class="modal-content animate" method="post" action="../api/addCategory.php" enctype="multipart/form-data">
        <div class="imgcontainer" style="background-color:#004581;">

            <button type="button" onclick="document.getElementById('id02').style.display='none'"
                class="cancelbtn close">&times;</button>
            <label for="category" style="color:white"><b>Update Product Category</b></label>
        </div>
        <hr>

        <div class="container">
            <table>
                <tr class="row">
                    <input type="hidden" class="subfield" name="id" id="categoryid" value="<?php echo $result["product_categoryId"] ?>" ?>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Product Category</div>
                    </td>
                    <td> <input type="text" class="subfield" id="categoryname" name="cName" value="<?php echo $result["categoryName"] ?>" /></td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Description</div>
                    </td>
                    <td>
                    <input type="text" class="subfield" id="categoryname" name="desc" value="<?php echo $result["description"] ?>" /></td> 
                    </td>
                </tr>
               

            </table>

        </div>

        <div class="container" style="padding:10px;">
            <button type="submit" class="btns" value="update" style="margin-left:460px;" name="update">Update</button>
            <button type="button" style="margin-left:20px;"
                onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>

        </div>
    </form>
</div>