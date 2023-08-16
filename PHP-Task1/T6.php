<?php

function check($n1 , $n2){
    if ($n1 < 0 && $n2 > 0) {
        return true;
    } elseif ($n1 > 0 && $n2 < 0) {
        return true;
    } elseif ($n1 > 0 && $n2 > 0) {
        return false;
    } elseif ($n1 < 0 && $n2 < 0){
        return false;
    }
}

echo check(40,-30);