<!-- update pkg -->
<div id="id02" class="modal">

    <form class="modal-content animate" method="post" action="../api/addType.php" enctype="multipart/form-data">
        <div class="imgcontainer" style="background-color:#004581;">

            <button type="button" onclick="document.getElementById('id02').style.display='none'"
                class="cancelbtn close">&times;</button>
            <label for="room" style="color:white"><b>Update Room Type</b></label>
        </div>
        <hr>

        <div class="container">
            <table>
                <tr class="row">
                    <input type="hidden" class="subfield" name="id" id="typeid" value="" ?>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Room Type</div>
                    </td>
                    <td> <input type="text" class="subfield" id="typename" name="pName" value="" /></td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Description</div>
                    </td>
                    <td>
                        <textarea class="subtextfield" id="desc" name="desc" rows="8" cols="50"></textarea>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Status</div>
                    </td>
                    <!-- <td><input type="text" class="subfield" name="status" /></td> -->
                    <td> <select class="subfield" name="status" id="status">
                            <option value="Available">
                                Available
                            </option>
                            <option value="Unavailable">
                                Unavailable</option>
                        </select></td>
                </tr>
                <tr class="row">
                    <td>
                        <div class="content">Price</div>
                    </td>
                    <td> <input type="number" id="price" min="10" class="subfield" name="price"
                            value="" /></td>
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