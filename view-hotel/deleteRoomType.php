 <!-- delete pkg -->
 <div id="id04" class="modal">

     <form class="modal-content animate" style="width:45%;" method="post" action="../api/addType.php"
         enctype="multipart/form-data">
         <div class="imgcontainer" style="background-color:#004581;">
             <button type="button" onclick="document.getElementById('id04').style.display='none'"
                 class="cancelbtn close">&times;</button>
                 <label for="room" style="color:white"><b>Delete Room Type</b></label>
         </div>

         <div class="container">

             <input type="hidden" id="modalIdValue" class="subfield" name="id" value="<?php echo $typeID;?>" />


             <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete
                 this room type?</p>

             <div class="container" style="padding:10px;">
                 <button type="button" onclick="document.getElementById('id04').style.display='none'" class="btns"
                     style="">No</button>
                 <button type="submit" class="cancelbtn" value="Save" name="delete"
                     style="margin-left:75px;">Yes</button>
             </div>
         </div>


     </form>
 </div>