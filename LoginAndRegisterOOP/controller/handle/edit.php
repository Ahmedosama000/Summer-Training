<?php
$title = 'Edit';

include_once '../../view/layouts/header.php';
include_once '../../model/Employees.php';

$id = $_GET['id'];

if (isset($_POST['edit_employee'])) {

    // validation 
    if ($_FILES['image']['error'] == 0) {;
        $temp_path = $_FILES['image']['tmp_name'];
        $my_path = '../../assests/img/users/';
        $my_image = uniqid('user') . '.jpg';
        $full_path = $my_path . $my_image;
        move_uploaded_file($temp_path,$full_path);
    }
    $employee = new Employees;
    $employee->setId($id);
    $employee->setName($_POST['name']);
    $employee->setSalary($_POST['salary']);
    $employee->setAddress($_POST['address']);
    $employee->setGender($_POST['gender']);
    $employee->setImage($full_path);

    $result = $employee->update();
    if ($result) {
        header('location:../../view/pages/home.php');
    }
}
