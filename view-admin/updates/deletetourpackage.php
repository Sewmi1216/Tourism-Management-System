<?php 
require('../../api/deletetourpackage.php');
$rows = $_SESSION['c'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
    document.onreadystatechange = function(){
        if(document.readyState === 'complete'){
            window.location.replace('/Tourism-Management-System-1/view-admin/tourpackages.php');
        }
    };
</script>
</body>
</html>