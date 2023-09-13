<?php

include_once '../../model/Employees.php';

$employee = new Employees;
$employee->setId($_GET['id']);
$result = $employee->delete();
if ($result){
    header('location:../../view/pages/home.php');
} 
