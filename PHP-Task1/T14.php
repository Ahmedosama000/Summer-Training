<?php 

// First Function

function factorial($num){
    $nums = [] ;
    $result = 1 ;

    for ($i = 1; $i <= $num; $i++) {
        array_push($nums , $i);
    }
    for ($i = 0; $i < count($nums); $i++) {
        $result *= $nums[$i];
    }
    // print_r($nums);
    return $result;
}

// Second Function

function num_factorial($n){
    if ($n < 0 ){
        return "Math Error";
    }
    elseif ($n <= 1){
        return 1 ;
    }
    else {
        return $n * num_factorial($n-1);
    }
}

echo num_factorial(0);
