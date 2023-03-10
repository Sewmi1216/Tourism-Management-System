 <!-- add hotel package -->
 <div id="id01" class="modal">

     <form class="modal-content animate" method="post" action="../api/addType.php" enctype="multipart/form-data">
         <div class="imgcontainer" style="background-color:#004581;">

             <button type="button" onclick="document.getElementById('id01').style.display='none'"
                 class="cancelbtn close">&times;</button>
             <label for="room" style="color:white"><b>Add Room Type</b></label>
         </div>
         <hr>

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
                     <td> <input type="number" min="10" class="subfield" name="price" required/></td>
                 </tr>

<!-- 
                 <tr class="row">
                     <td>
                         <div class="content">Upload Image</div>
                     </td>
                     <td> <input type="file" class="subfield" name="file" /></td>
                 </tr> -->


                 



                 <!-- <tr>
                <td>
                     <input type="submit" class="btn1" value="Save" name="signup"/>
                </td>
                <td> <input type="reset" class="btn" value="Clear" name="reset"/></td>
            </tr> -->


             </table>

         </div>

         <div class="container" style="padding:10px;">
             <button type="submit" class="btns" value="Save" style="margin-left:460px;" name="save">Save</button>
             <button type="button" style="margin-left:20px;"
                 onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

         </div>
     </form>
 </div>