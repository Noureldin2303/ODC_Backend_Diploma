<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

$count = count($_FILES['file']['name']);

for($i=0;$i<$count;$i++){

    move_uploaded_file($_FILES['file']['tmp_name'][$i],$_FILES['file']['name'][$i]);
}

?>