<!-- add product category-->
<div id="id01" class="modal">
     <form class="modal-content animate" method="post" action="../api/addCategory.php" enctype="multipart/form-data">
         <div class="imgcontainer" style="background-color:#004581;">
             <button type="button" onclick="document.getElementById('id01').style.display='none'"
                 class="cancelbtn close">&times;</button>
             <label for="category" style="color:white"><b>Add Product Category</b></label>
             <input type="hidden" value="<?php echo $id ?>" name="id" />
         </div>
         <hr>
         <div class="container">
             <table>
                 <tr class="row">
                     <td>
                         <div class="content">Product Category Name</div>
                     </td>
                     <td> <input type="text" class="subfield" name="pName" /></td>
                 </tr>
                 <tr class="row">
                     <td>
                         <div class="content">Description</div>
                     </td>
                     <td>
                         <textarea class="subtextfield" name="desc" style="background-color:#dde8f0;color:black;width:500px;height:150px;" ></textarea>
                     </td>
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