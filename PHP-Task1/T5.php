<?php

function check($n1 , $n2){
    if ($n1 == 50 && $n2 == 50) {
        return false;
    } elseif ($n1 == 50 || $n2 == 50) {
        return true;
    } elseif ($n1 + $n2 == 50) {
        return true;
    } else {
        return false;
    }
}

echo check(20,30);