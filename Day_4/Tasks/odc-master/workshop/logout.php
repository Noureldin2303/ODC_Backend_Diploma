<?php

//Task 1
// session_start();

// session_destroy();
// header("location: login.html");

//Task 2 
// setcookie('login',false,time() - 60 * 60 * 24,"/");
// header("location: login.html");



setcookie('login',false,time()-60*60*24,"/");
header("location: login.html");
