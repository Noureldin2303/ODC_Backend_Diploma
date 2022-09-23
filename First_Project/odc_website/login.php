<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = mysqli_connect("localhost", "root", "", "odc_website");

    $query = mysqli_query($connection, "SELECT * FROM `odc_users` WHERE `email` = '$email' AND `password` = '$password'");

    $user =  mysqli_fetch_assoc($query);

    if (empty($user)) {
        header("location: login.php");
    } else {
        $_SESSION['crud'] = $user;
        if ($_SESSION['crud']['admin'] == 1)
            header("location: admin/index.php");
        else
            header("location: user/user.php");
    }
} else {
    include "login.html";
}
?>
