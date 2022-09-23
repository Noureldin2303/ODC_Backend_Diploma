<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

$filename = $_FILES['file']['name'];
$newname = $_POST['name'];

$array = explode('/',$_FILES['file']['type']);

$extension = end($array);
$filename = $newname.".".$extension;

move_uploaded_file($_FILES['file']['tmp_name'],$filename);

?>