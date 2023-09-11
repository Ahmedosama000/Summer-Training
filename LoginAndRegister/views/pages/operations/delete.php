<?php

require_once '../../../includes/connection.php';
include_once '../../../views/partials/head.php';

    $id = $_GET['id'];
    $deleteSql = "DELETE FROM employees WHERE id=$id";

    if(mysqli_query($conn , $deleteSql)) {
        header('location:../home.php');
    }