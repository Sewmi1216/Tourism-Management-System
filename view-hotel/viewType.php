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
        <div class="imgcontainer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <label for="room"><b><?php echo $row["typeName"] ?><hr style="margin-top:25px;">
                </b></label>
                
        </div>

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