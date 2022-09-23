<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $brache = $_POST['brache'];
    $password = $_POST['password'];
    
    $connection = mysqli_connect("localhost","root","","odc_website");


   $id = $arr['id'];
    mysqli_query($connection,"INSERT INTO `odc_users` (`name`,`email`,`phone`,`course_type`,`password`,`branches_id`,`course_name`,active) VALUES ('$name','$email','$phone','$type','$password','$brache','php',0)");

    if(mysqli_affected_rows($connection) == 1){
        header("location: login.php");
    }
    
}else{
    include "register.html";
}



