<?php

foreach ($_FILES['file']['name'] as $key => $val) {
    $filename = uniqid() . '_' . $_FILES['file']['name'][$key];

    move_uploaded_file($_FILES['file']['tmp_name'][$key], '../images/' . $filename);
}

echo "File(s) uploaded successfully.";
die;
