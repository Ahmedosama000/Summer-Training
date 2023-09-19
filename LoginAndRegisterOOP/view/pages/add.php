<?php
$title = 'Add';

include_once '../layouts/header.php';
// require_once '../../database/config.php';
// include_once '../../model/Employees.php';


?>

<h2 class="my-5 text-center container 
        p-3 w-50 bg-dark text-light border shadow">
    Add New Employee
</h2>

<div class="container bg-light p-5 mx-auto w-50 border shadow">
    <?= isset($_SESSION['wrong-add']) ? "<div class = 'alert alert-danger'>{$_SESSION['wrong-add']}" : "" ?>
    <form action="../../controller/handle/add.php" method="post" enctype="multipart/form-data" >
        <div class="form-group my-1">
            <label for="name">Employee Name</label>
            <input type="text" class="form-control" name="name" placeholder="Employee Name">
        </div>
        <div class="form-group my-1">
            <label for="salary">Emloyee Salary</label>
            <input type="number" name="salary" placeholder="Employee Salary" class="form-control">
        </div>
        <div class="form-group my-1">
            <label for="address">Employee Address</label>
            <input type="text" class="form-control" name="address" placeholder="Employee Address">
        </div>
        <div class="form-group mt-2 mb-1">
            <label for="male" class="mx-1">Male</label>
            <input type="radio" name="gender" value="male">
            <label for="female" class="mx-1">Female</label>
            <input type="radio" name="gender" value="female">
        </div>
        <div class="form-control">
            <label for="image">Upload image</label>
            <input type="file" name="image" id="">
        </div>
        <input type="submit" value="Add Employee" class="mt-3 mx-1 btn btn-primary" name="add_employee">
        <a href="home.php" class="mx-1 mt-3 btn btn-info">Return to index</a>
    </form>
</div>
<?php

include_once '../layouts/finalyFooter.php';

if (isset($_SESSION['wrong-add'])) {
    unset($_SESSION['wrong-add']);
}
