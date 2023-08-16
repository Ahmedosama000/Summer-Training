<?php

function check($n1) {
    if ($n1 <= 0){
        return false ;
    }
    elseif ($n1 % 5 == 0 || $n1 % 8 == 0){
        return true ;
    }
    else {
        return false ;
    }
}

echo check(40);