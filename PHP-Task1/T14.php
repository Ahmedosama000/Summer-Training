<?php 

function factorial($num){
    $nums = [] ;
    $result = 1 ;

    for ($i = 1; $i <= $num; $i++) {
        array_push($nums , $i);
    }
    for ($i = 0; $i < count($nums); $i++) {
        $result *= $nums[$i];
    }
    return $result;
}

echo factorial(5);