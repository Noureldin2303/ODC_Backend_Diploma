<?php
//Task 1
// session_start();

// if($_SESSION['login'] != true){
//     header("location: login.html");
// }

// echo "Home";


//Task 2
// if($_COOKIE['login'] != true){
//     header("location: login.html");
// }

// echo "Home";

if($_COOKIE['login'] != true){
    header("location:login.html");
}

echo "Home";
?>
<a href="logout.php">logout</a>
<!-- <a href="logout.php">logout</a> -->