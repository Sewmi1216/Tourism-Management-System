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

