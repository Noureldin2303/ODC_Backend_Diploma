<?php

include 'include.php';
$id = @$_GET['id'];
mysqli_query($dbh, "DELETE FROM `odc_users` WHERE id='$id'");
header("location:index.php");
