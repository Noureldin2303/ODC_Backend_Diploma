<?php

include 'include.php';
$id = @$_GET['id'];
mysqli_query($dbh, "UPDATE `odc_users` SET `active`= 1 WHERE id='$id'");
header("location:index.php");
