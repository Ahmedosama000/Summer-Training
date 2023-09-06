<?php
$title = 'Add';
require_once '../includes/connection.php';
include_once '../includes/head.php';

    if(isset($_POST['add_employee'])) {
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        $addEmployee = "INSERT INTO employees(name , salary , address , gender)
        VALUES ('$name' , '$salary' , '$address' , '$gender')";

        $res = mysqli_query($conn , $addEmployee);

        if($res)  {
            header('location:../index.php');
        }
    }
?>
    <h2 class="my-5 text-center container 
        p-3 w-50 bg-dark text-light border shadow">
        Add New Employee
    </h2>

    <div class="container bg-light p-5 mx-auto w-50 border shadow">
        <form action="" method="post">
            <div class="form-group my-1">
                <label for="name">Employee Name</label>
                <input type="text" class="form-control" name="name"
                placeholder="Employee Name"></div>
            <div class="form-group my-1">
                <label for="salary">Emloyee Salary</label>
                <input type="number" name="salary"
                placeholder="Employee Salary" class="form-control"></div>
            <div class="form-group my-1">
                <label for="address">Employee Address</label>
                <input type="text" class="form-control" name="address"
                placeholder="Employee Address">
            </div>
            <div class="form-group mt-2 mb-1">
                <label for="male" class="mx-1">Male</label>
                <input type="radio" name="gender" value="male">
                <label for="female" class="mx-1">Female</label>
                <input type="radio" name="gender" value="female">
            </div>
            <input type="submit" value="Add Employee" 
            class="mt-3 mx-1 btn btn-primary" name="add_employee">
            <a href="../index.php" class="mx-1 mt-3 btn btn-info">Return to index</a>
        </form>
    </div>
<?php
include_once 'includes/foot.php';
