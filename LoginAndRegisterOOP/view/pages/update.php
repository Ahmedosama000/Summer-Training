<?php
$title = 'Edit';

include_once '../layouts/header.php';
include_once '../../model/Employees.php';

$id = $_GET['id'];

$employee = new Employees;
$employee->setId($id);
$results = $employee->readByID();

while ($row = mysqli_fetch_assoc($results)) {
    $cur_name = $row['name'];
    $cur_salary = $row['salary'];
    $cur_address = $row['address'];
    $cur_gender = $row['gender'];
}


?>
<h2 class="my-5 text-center container 
        p-3 w-50 bg-dark text-light border shadow">
    Edit Employee
</h2>

<div class="container bg-light p-5 mx-auto w-50 border shadow">
    <form action="../../controller/handle/edit.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <div class="form-group my-1">
            <label for="name">Employee Name</label>
            <input type="text" class="form-control" name="name" placeholder="Employee Name" value="<?= $cur_name ?>">
        </div>
        <div class="form-group my-1">
            <label for="salary">Emloyee Salary</label>
            <input type="number" value="<?= $cur_salary ?>" name="salary" placeholder="Employee Salary" class="form-control">
        </div>
        <div class="form-group my-1">
            <label for="address">Employee Address</label>
            <input type="text" class="form-control" name="address" placeholder="Employee Address" value="<?= $cur_address ?>">
        </div>
        <div class="form-group mt-2 mb-1">
            <label for="male" class="mx-1">Male</label>
            <input type="radio" <?= ($cur_gender == 'male') ? 'checked' : ''; ?> name="gender" value="male">
            <label for="female" class="mx-1">Female</label>
            <input type="radio" <?= ($cur_gender == 'female') ? 'checked' : ''; ?> name="gender" value="female">
        </div>
        <div class="form-control">
            <label for="image">Upload image</label>
            <input type="file" name="image" id="">
        </div>
        <input type="submit" value="Edit Employee" class="mt-3 mx-1 btn btn-primary" name="edit_employee">
        <a href="home.php" class="mx-1 mt-3 btn btn-info">Return to index</a>
    </form>

    <?php
    include_once '../layouts/finalyFooter.php';
