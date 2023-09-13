<?php
$title = 'Edit';

include_once '../../view/layouts/header.php';
include_once '../../model/Employees.php';

$id = $_GET['id'];

if (isset($_POST['edit_employee'])) {

    // validation 

    $employee = new Employees;
    $employee->setId($id);
    $employee->setName($_POST['name']);
    $employee->setSalary($_POST['salary']);
    $employee->setAddress($_POST['address']);
    $employee->setGender($_POST['gender']);

    $result = $employee->update();
    if ($result){
        header('location:../../view/pages/home.php');
    }

}