<?php

$title = 'add';
include_once '../../view/layouts/header.php';
require_once '../../database/config.php';
include_once '../../model/Employees.php';


if (isset($_POST['add_employee'])) {

    if ($_FILES['image']['error'] == 0){;
        // print_r($_FILES);die;
        // ../../assests/img/users/AhmedddOsama6509f6340a5bd
        $temp_path = $_FILES['image']['tmp_name'];
        $my_path = '../../assests/img/users/';
        $my_image = uniqid('user').'.jpg';
        $full_path = $my_path.$my_image;
        // echo $full_path;die;
    }
    // Validation

    $EName = $_POST['name'];
    $ESalary = $_POST['salary'];
    $EAddress = $_POST['address'];
    $EGender = $_POST['gender'];

    move_uploaded_file($temp_path,$full_path);
    $employee = new Employees;
    $employee->setName($EName);
    $employee->setSalary($ESalary);
    $employee->setAddress($EAddress);
    $employee->setGender($EGender);
    $employee->setImage($full_path);

    $result = $employee->create();
    if ($result) {
        header('location:../../view/pages/home.php');
    } else {
        $_SESSION['Wrong-add'] = 'Something wrong';
    }
}
