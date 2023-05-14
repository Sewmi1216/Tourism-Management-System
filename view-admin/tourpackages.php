<?php 
require('../api/viewtourpackage.php');

if (isset($_SESSION["email"]) && isset($_SESSION["adminID"])) {
    $id = $_SESSION["adminID"];
}
$rows = $_SESSION['c'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/chat.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/modelbox.css?v=<?php echo time(); ?>">
    <!-- <script src="../libs/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <!-- <div class="text">Hotel Packages</div> -->
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Tour packages </div>
                <!-- <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for Tour packages" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div> -->
                
                <span style="margin-left: 8px;">
                    <a href="addpackage2.php"><i
                            class="fa-regular fa-square-plus" style="font-size:35px;color:#004581
;"></i></a>
                </span>
            </div>

        </div>
        <div class="bg">


            <table>
                <tr class="subtext tblrw">
                    <th class="tblh">Package ID</th>
                    <th class="tblh">Package Name</th>
                    <th class="tblh"> No of Participant</th>
                    <th class="tblh"> Package price</th>
                    <th class="tblh">Add photos</th>
                    <th class="tblh">View</th>
                    <th class="tblh">Edit</th>
                    <th class="tblh">Delete</th>
                </tr>
                
                <?php                   
foreach ($rows as $row) {  

echo '

                <tr class="subtext tblrw">
                    <td class="tbld">
                    '.$row['packageID'].'  
                    </td>
                    
                    <td class="tbld">
                    '.$row['packageName'].' 
                    </td>
                    <td class="tbld">
                    '.$row['max_part'].'  
                    </td>
                    <td class="tbld">
                    '.$row['price'].'  
                    </td>
                  
                    
                    <td class="tbld">  <a href="addPhotos.php?package_id='.$row['packageID'].'"> <i class="fa-sharp fa-solid fa-images"></i></a></td>

                    <td class="tbld">  <a href="packagedescription2.php?package_id='.$row['packageID'].'"> <i class="fa-sharp fa-solid fa-bars art"></i></a></td>
                    <td class="tbld"> <a href="editpackage.php?package_id='.$row['packageID'].'"> <i class="fa-solid fa-pen-to-square art"> </i></a></td>
                      
                    <td class="tbld"><a onclick="openModal('.$row['packageID'].')"><i class="fa-solid fa-trash art"></i></a></td>
                </tr>

    
                ' ;
            }
            
            ?>  
            </table>
            
            <div id="id04" class="modal">

<form class="modal-content animate" style="width:45%;" method="GET" action="../api/tourpackgae.php" enctype="multipart/form-data">

<input type="hidden" id="modalIdValue" class="subfield"  name = "packageID" value="<?php echo $row['packageID']; ?>"/>

    <div class="imgcontainer" style="background-color:#004581;">
        <button type="button" onclick="document.getElementById('id04').style.display='none'"  class="cancelbtn close">&times;</button>
            <label for="room" style="color:white"><b>Delete Tour Package</b></label>
    </div> 

<div class="container">




        <p class="text" style="font-size:20px;text-align:center;margin-left:10px;">Do you want to delete the tourpackage ?</p>

        <div class="container" style="padding:10px;">
            <button type="button" onclick="document.getElementById('id04').style.display='none'" class="btns" style="">No</button>
            <button type="submit" class="cancelbtn" style="margin-left:75px;" name="delete">Yes</button>
        </div>
    </div>


</form>
</div>




<script>
function openModal(id) {
var modal = document.getElementById("id04");
var modalIdValue = document.getElementById("modalIdValue");
modalIdValue.value = id;
modal.style.display = "block";
}
</script>

 


        </div>
        </div>
        </div>

       
        <!-- <script>
function searchTypes() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
</script> -->


    </section>
    <script>
    function openChat() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeChat() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>
</body>

</html>