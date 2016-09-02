<?php

$uploaddir = 'C:/xampp/htdocs/MyDir/';
$uploadfile = $uploaddir . basename($_FILES['colors.csv']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['colors.csv']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";


?>



















