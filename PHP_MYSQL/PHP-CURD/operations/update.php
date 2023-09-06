<?php
$title = 'Edit';
require_once '../includes/connection.php';
include_once '../includes/head.php';
$id = $_GET['id'];
$get_data = "SELECT * FROM employees WHERE id = '$id' ";
$selectedEmployees = mysqli_query($conn , $get_data);
$row = mysqli_fetch_assoc($selectedEmployees);
$name = $row['name'];
$salary = $row['salary'];
$address = $row['address'];
$gender = $row['gender'];

//UPDATE `employees` SET `name` = 'Selwann' WHERE `employees`.`id` = 2;

if(isset($_POST['edit_employee'])) {
    $new_name = $_POST['name'];
    $new_salary = $_POST['salary'];
    $new_address = $_POST['address'];
    $new_gender = $_POST['gender'];

    $addEmployee = "UPDATE `employees` SET `name` = '$new_name',
    `salary` = '$new_salary',
    `address` = '$new_address',
    `gender` = '$new_gender'
    WHERE `employees`.`id` = '$id';";

    $res = mysqli_query($conn , $addEmployee);

    if($res)  {
        header('location:../index.php');
    }
}

?>
<h2 class="my-5 text-center container 
        p-3 w-50 bg-dark text-light border shadow">
        Edit Employee
    </h2>

    <div class="container bg-light p-5 mx-auto w-50 border shadow">
        <form action="" method="post">
            <div class="form-group my-1">
                <label for="name">Employee Name</label>
                <input type="text" class="form-control" name="name"
                placeholder="Employee Name" value = "<?=$name?>" >
            </div>
            <div class="form-group my-1">
                <label for="salary">Emloyee Salary</label>
                <input type="number" value = "<?=$salary?>" name="salary"
                placeholder="Employee Salary" class="form-control"></div>
            <div class="form-group my-1">
                <label for="address">Employee Address</label>
                <input type="text" class="form-control" name="address"
                placeholder="Employee Address" value = "<?=$address?>">
            </div>
            <div class="form-group mt-2 mb-1">
                <label for="male" class="mx-1">Male</label>
                <input type="radio" <?= ($gender == 'male')? 'checked' : '' ; ?> name="gender" value="male">
                <label for="female" class="mx-1">Female</label>
                <input type="radio" <?= ($gender == 'female')? 'checked' : '' ; ?> name="gender" value="female">
            </div>
            <input type="submit" value="Edit Employee" 
            class="mt-3 mx-1 btn btn-primary" name="edit_employee">
            <a href="../index.php" class="mx-1 mt-3 btn btn-info">Return to index</a>
        </form>
