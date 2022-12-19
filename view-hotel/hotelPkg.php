<?php
session_start();
$user = "";
if (isset($_SESSION["username"]) && isset($_SESSION["hotelID"])) {
    $id = $_SESSION["hotelID"];
} else {
    header("location:hotelLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/hotel.css?v=<?php echo time(); ?>">
    <script src="../libs/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <script type="text/javascript">
	$(document).ready(function(){
	
		$('#search').keyup(function(){
		var input = $(this).val();
        //alert(input);
		if(search != '')
		{
			$.ajax({
			url:"addpkg.php",
			method:"POST",
			data:{input:input},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
		else
		{
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
        <div class="text">Hotel Packages</div>
        <div class="bg">
            <!-- <div class="search">
                <input type="search" class="subfield" style="margin-top:9px;margin-left:160px;" name="pName" />
                <button
                    style="cursor:pointer;margin-top:5px;margin-left:16px;border:0px white;background-color:white;"><i
                        class="fa-solid fa-magnifying-glass" style="color:black;font-size:35px;"></i></button>
            </div> -->

            <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for names.."
                title="Type in a name">
                
            <span>
                <a href="addHotelPkg.php"><i class="fa-regular fa-square-plus"
                        style="font-size:30px;color:black;"></i></a>
            </span>
            <div id="result">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Hotel Package</th>
                        <th class="tblh">Hotel Package Name</th>
                        <th class="tblh">Room Type</th>
                        <th class="tblh">Status</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr><?php
include "../controller/hotelPkgController.php";
$hotelPkgcont = new hotelPkgController();
$res = $hotelPkgcont->viewAllPkgs();
if ($res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)) {
        ?>
                    <tr class="subtext tblrw">
                        <td class="tbld"><?php echo "<img src='../images/" . $row['image'] . "' style=
                    'border-radius: 50%;width:50px;height: 50px;background-size: 100%;
                    background-repeat: no-repeat;'>";?>
                        </td>
                        <td class="tbld"><?php echo $row["packageName"] ?></td>
                        <td class="tbld"><?php echo $row["price"] ?></td>
                        <td class="tbld"><button class="status">
                                <?php if($row["status"]==0){
                            echo "Unavailable";}
                            else{
                             echo "Available";}
                             ?></button>
                        </td>
                        <td class="tbld"><i class="fa-sharp fa-solid fa-bars art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-pen-to-square art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
                    </tr>
                    <?php }
} else {
    echo "No results";
}
?>
                </table>
            </div>
        
         <!-- <div id="results">
                <table>
                    <tr class="subtext tblrw">
                        <th class="tblh">Hotel Package</th>
                        <th class="tblh">Hotel Package Name</th>
                        <th class="tblh">Room Type</th>
                        <th class="tblh">Status</th>
                        <th class="tblh">View</th>
                        <th class="tblh">Edit</th>
                        <th class="tblh">Delete</th>
                    </tr>
                    <tr class="subtext tblrw">
                        <td class="tbld"><?php echo "<img src='../images/" . $row['image'] . "' style=
                    'border-radius: 50%;width:50px;height: 50px;background-size: 100%;
                    background-repeat: no-repeat;'>"; ?>
                        </td>
                        <td class="tbld"><?php echo $row["packageName"] ?></td>
                        <td class="tbld"><?php echo $row["price"] ?></td>
                        <td class="tbld"><button class="status">
                                <?php if ($row["status"] == 0) {
                                    echo "Unavailable";
                                } else {
                                    echo "Available";
                                }
                                ?></button>
                        </td>
                        <td class="tbld"><i class="fa-sharp fa-solid fa-bars art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-pen-to-square art"></i></td>
                        <td class="tbld"><i class="fa-solid fa-trash art"></i></td>
                    </tr>
                
                </table>
            </div>
         -->
        
        </div>
        </div>

    </section>
    <script>
    var model = $('.model');

    $('.add').click(function() {
        model.show();
    })
    $('.close').click(function() {
        model.hide();
    })
    // $('.btn').click(function() {
    //     model.hide();
    // })
    </script>
</body>

</html>