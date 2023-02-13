
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/tourguide.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <script type="text/javascript">
    $(document).ready(function() {

        $('#search').keyup(function() {
            var input = $(this).val();
            //alert(input);
            if (search != '') {
                $.ajax({
                    url: "addpkg.php",
                    method: "POST",
                    data: {
                        input: input
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#results').html(data);
            }
        });
    });
    </script>

</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>
        <!-- <div class="text">Hotel Packages</div> -->
        <div class="se" style="margin-top: 20px;">
            <div class="searchSec">
                <div class="page-title"> Registered Tourists </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search for Tourist" name="search">
                    <a href="" class="searchimg"><i class="fa fa-search icon"></i></a>
                </div>
</i></a>
                </span>
            </div>

        </div>
        <div class="bg">
            <!-- <div class="search">
                <input type="search" class="subfield" style="margin-top:9px;margin-left:160px;" name="pName" />
                <button
                    style="cursor:pointer;margin-top:5px;margin-left:16px;border:0px white;background-color:white;"><i
                        class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>
            </div> -->

            <!-- <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for names.."
                title="Type in a name"> -->


            <div id="result">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh"> Admin Name</th>
                        <th class="tblh">NIC</th>
                        <th class="tblh">E-Mail Address</th>
                        <th class="tblh">Phone Number</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr>
                    <?php

include "../controller/touristcontroller.php";
$touristcont = new touristController();
$res = $touristcont->viewAlltourist();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>

                    <tr class="subtext tblrw">
                        
                        <td class="tbld"><?php echo $row["name"] ?></td>
                        <td class="tbld"><?php echo $row["address"] ?></td>
                        <td class="tbld"><?php echo $row["email"] ?></td>
                        <td class="tbld"><?php echo $row["phone"] ?></td>
                        <td class="tbld"><a
                                onclick="document.getElementById('id03').style.display='block';document.location='#id03?packageID=<?php $guestusername=$row['username']; ?>'"><i
                                    class="fa-sharp fa-solid fa-bars art"></i></a></td>
                        <!-- <td class="tbld"><button data-id='<?php echo $row['packageID']; ?>' class="help"> view </button></td> -->
                        <td class="tbld"><a onclick="document.getElementById('id02').style.display='block'"><i
                                    class="fa-solid fa-pen-to-square art"></i></a></td>
                        <td class="tbld"><a onclick='showDeleteForm()'><i class="fa-solid fa-trash art"></i></a></td>
                 <?php   } } ?>

                    </tr>
                </table>
            </div>


        </div>
        </div>














        <div id="id01" class="modal">

            <form class="modal-content animate" action="../api/addtourguide.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <label for="room"><b>Add Tour Guide</b></label>
                </div>

                <div class="container">
                    <table>
                        <tr class="row">
                            <td>
                                <div class="content">Tourist Guide Name</div>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Tourist Guide User Name</div>
                            </td>
                            <td><input type="text" class="subfield" placeholder="Enter Tourist Guide Name" name="guidename" required>
                             
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content"> NIC</div>
                            </td>
                            <td>  <input type="text" class="subfield" placeholder="Enter Tourist Guide ID" name="guidenic" required>
                
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">E-Mail Address</div>
                            </td>
                            <td> <input type="text" class="subfield" placeholder="Tourist guide's email address" name="guideemail" required>
                            </td>
                        </tr>

                        <tr class="row">
                            <td>
                                <div class="content">Address</div>
                            </td>
                            <td> <input type="text"  class="subfield" placeholder="Tourist guide's physical address" name="guideaddress" required>
                            </td>
                        </tr> 
                        
                        </tr>   
                        <tr class="row">
                            <td>
                                <div class="content">Phone Number</div>
                            </td>
                            <td>           <input type="text"  class="subfield"  placeholder="Contact number" name="guidephone" required>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Password</div>
                            </td>
                            <td> <input type="password"  class="subfield"  placeholder="Enter the password" name="guidepassword" required>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Re-Enter Password</div>
                            </td>
                            <td> <input type="password" class="subfield" placeholder="Re-enter the password" name="guidepassword2" required>
                            </td>
                        </tr>
                        <tr class="row">
                            <td>
                                <div class="content">Status</div>
                            </td>
                            <td> <input type="text" class="subfield" name="status" required />
    
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn">Cancel</button>
                        <input type="submit" class="btn1" value="Save" name="save"/>
                </div>
            </form>
        </div>
    </section>

            <!-- delete pkg -->
    <div id="id04" class="modal">

        <form class="modal-content animate" style="width:45%;" method="post" action="../api/addtourguide.php"  enctype="multipart/form-data">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <div class="container">
                <input type="text" class="subfield" name="id" value="<?php echo $guidename ?>" readonly />
                <p class="text" style="font-size:20px;text-align:center;margin-left:90px;">Do you want to remove the tour guide</p>

                <div class="container" style="background-color:#f1f1f1; padding:10px;">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'"
                        class="cancelbtn" style="margin-left:11rem;">No</button>
                    <button type="submit" class="btns" value="Save" name="delete"
                        style="margin-left:75px;">Yes</button>
                </div>
            </div>


        </form>
    </div>

    <script>
        const showDeleteForm = () => {
            console.log('hi')
            console.log(document.getElementById('id04'))
            document.getElementById('id04').style.display = "block"
            //.log(document.getElementById('id04'))
            console.log('hihi')
        }
    </script>


</body>

</html>