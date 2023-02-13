<!-- view pkg -->

<div id="id03" class="modal">
    <form class="modal-content animate" method="post" action="#" enctype="multipart/form-data">
        <?php
require_once("../controller/roomTypeController.php") ;
$pkg = new roomTypeController();
$result = $pkg->viewType($typeID);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>

        <div class="imgcontainer" style="background-color:#004581;">

            <button type="button" onclick="document.getElementById('id03').style.display='none'"
                class="cancelbtn close">&times;</button>
            <label for="room" style="color:white"><b><?php echo $row["typeName"] ?>
                </b></label>
        </div>
        <hr>
        <div class="container">
            <table style="margin:-30px;">
                <tr>
                    <td>
                        <?php echo "<img src='../images/" . $row['img'] . "' style=
                    'width:500px;height: 300px;margin-left:45px;padding-right:0px;'>"; ?>
                    </td>
                    <td>
                        <p>
                            <?php echo $row["description"] ?>
                        </p>
                        <ul style="margin-left:23px;">
                            <li>Status:<?php echo $row["typestatus"] ?>
                            </li>
                            <li>Price: <?php echo $row["price"] ?>
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>


        </div>
        <?php }
} else {
    echo "No results";
}
?>

    </form>
</div>