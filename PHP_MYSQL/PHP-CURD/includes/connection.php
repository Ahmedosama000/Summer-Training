<?php

    $conn = mysqli_connect('localhost' , 'root' , '' , 'phpdemo');

    if(!$conn) { 
        die('Connection Failed ');
    }