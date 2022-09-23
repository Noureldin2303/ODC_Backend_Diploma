<?php
//Task 1
// session_start();


// $namedb = "mohamed";
// $passdb = 1234;

// $name = $_POST['name'];
// $pass = $_POST['password'];


// if($name == $namedb && $pass == $passdb){
//     $_SESSION['login'] = true;
//     header("location: home.php");
// }

//Task 2

// $namedb = "mohamed";
// $passdb = 1234;

// $name = $_POST['name'];
// $pass = $_POST['password'];


// if($name == $namedb && $pass == $passdb){
//     setcookie('login',true,time() + 60 * 60 * 24,"/");
//     header("location: home.php");
// }else{
//     header("location: login.html");
// }

$name = $_POST['name'];
$pass = $_POST['password'];


$namedb = "ahmed";
$passdb = 1234;

if($name == $namedb && $pass == $passdb ){
    setcookie('login',true,time()+60*60*24,"/");
    if($_POST['remember'] == true){
        setcookie('name',$name,time()+60*60*24,"/");
        setcookie('password',$pass,time()+60*60*24,"/");
    }
    header("location:home.php");
}else{
    header("location:login.html");
}

?>

