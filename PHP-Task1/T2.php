<?php

function fizzbuzz($num) {
    for ($i = 1; $i <= $num ; $i++) {  
        if ($i % 5 == 0 && $i % 3 == 0) {
            echo 'Fizz Buzz <br>';
        }
        elseif($i % 3 == 0) {
            echo 'Fizz <br>';
        }
        elseif($i % 5 == 0){
            echo 'Buzz <br>';
        }
        else {
            echo "{$i} <br>";
        }
    }
}

fizzbuzz(15);