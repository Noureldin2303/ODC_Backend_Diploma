<?php

$nums = [1,4,8,88,9,6,8,9];

$target = 6;

$l = 0;
$h = count($nums);

sort($nums);

while($l < $h){
    
    $mid = ($l + $h) / 2;
    
    if($nums[$mid] == $target){
        echo "TRUE";
        break;
    }elseif($nums[$mid] < $target){
        $l = $mid + 1;
    }else{
        $h = $mid - 1;
    }
}

?>