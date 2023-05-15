 <!-- add room type -->
 <div id="id01" class="modal">
     <form class="modal-content animate" method="post" action="../api/addType.php" enctype="multipart/form-data">
         <div class="imgcontainer" style="background-color:#004581;">
             <button type="button" onclick="document.getElementById('id01').style.display='none'"
                 class="cancelbtn close">&times;</button>
             <label for="room" style="color:white"><b>Add Room Type</b></label>
             <input type="hidden" value="<?php echo $id ?>" name="id" />
         </div>
         <hr>
         <div class="container">
             <table>
                 <tr class="row">
                     <td>
                         <div class="content">Room Type Name</div>
                     </td>
                     <td> <input type="text" class="subfield" name="pName" required/></td>
                 </tr>
                 <tr class="row">
                     <td>
                         <div class="content">Description</div>
                     </td>
                     <td>
                         <div style="margin-right:20px;margin-left:22px;margin-top:20px;">
                             <textarea class="subtextfield" name="desc"
                                 style="background-color:#dde8f0;color:black;width:500px;height:150px;" required></textarea>
                         </div>
                     </td>
                 </tr>
                 <!-- <tr class="row">
                     <td>
                         <div class="content">Status</div>
                     </td>
                     <td> <select class="subfield" name="status">
                             <option value="" selected>---Choose availability---</option>
                             <option value="Available">Available</option>
                             <option value="Unavailable">Unavailable</option>
                         </select></td>
                 </tr> -->
                 <tr class="row">
                     <td>
                         <div class="content">No.of Persons</div>
                     </td>
                     <td> <input type="number" min="0" class="subfield" value=""  name="beds" id="beds" required/></td>
                 </tr>

                 <tr class="row">
                     <td>
                         <div class="content">Price($)</div>
                     </td>
                     <td> <input type="number" min="0" class="subfield" value="" name="price" id="price" required/></td>
                 </tr>
             </table>
         </div>
         <div class="container" style="padding:10px;">
             <button type="submit" class="btns" value="Save" style="margin-left:460px;" name="save">Save</button>
             <button type="button" style="margin-left:20px;"
                 onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
         </div>
     </form>
 </div>