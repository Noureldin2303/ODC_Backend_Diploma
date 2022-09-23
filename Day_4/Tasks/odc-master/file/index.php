<?php


$list_of_students =  explode(",",$_POST['students']);

$course = $_POST['course'];

$content = file_get_contents("certificate.html");


foreach($list_of_students as $key => $student){
    $location = "cer/".$student.".html";
    fopen($location,"w");

    $new_content =  str_replace("name",$student,$content);
    $new_content2 =  str_replace("course",$course,$new_content);

    file_put_contents($location,$new_content2);
}