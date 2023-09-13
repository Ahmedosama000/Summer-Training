<?php

include_once '../layouts/header.php';
require_once '../../database/config.php';
include_once '../../model/Employees.php';


if (isset($_POST['add_employee'])) {

    // Validation

    $EName = $_POST['name'];
    $ESalary = $_POST['salary'];
    $EAddress = $_POST['address'];
    $EGender = $_POST['gender'];

    $employee = new Employees;
    $employee->setName($EName);
    $employee->setSalary($ESalary);
    $employee->setAddress($EAddress);
    $employee->setGender($EGender);

    $result = $employee->create();
    if ($result) {
        header('location:../../view/pages/home.php');
    }
    else {
        $_SESSION['Wrong-add'] = 'Something wrong';
    }
}
