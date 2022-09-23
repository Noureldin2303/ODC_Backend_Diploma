<?php

session_start();
$id = $_SESSION['crud']['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$type = $_POST['type'];
$password = $_POST['password'];



$connection = mysqli_connect("localhost","root","","odc_website");
mysqli_query($connection,"UPDATE `odc_users` SET `name` = '$name' , `email` = '$email' , `password` = '$password' , `phone` = '$phone' ,`course_type` = '$type' WHERE `id` = '$id'");

header("location: user.php");

?>


