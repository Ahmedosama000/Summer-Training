<?php 

$title = 'Home';
require_once '../../includes/connection.php';
include_once '../partials/head.php';
include_once '../partials/navbar.php';

if (!isset($_SESSION['email'])){
    header('location:login.php');
}

?>


    <header class="bg-primary text-light text-center p-3">
        <h2>Employee Crud Demo</h2>
    </header>
    <section class="my-5 container">
        <a href="operations/add.php" class="btn btn-dark mb-3">Add Employee</a>

        <table class="table table-bordered text-center mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Employee Name</th>
                    <th>Employee Salary</th>
                    <th>Employee Address</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM employees";
                    $selectedEmployees = mysqli_query($conn , $sql);
                    while($row = mysqli_fetch_assoc($selectedEmployees)) {
                ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["salary"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["gender"] ?></td>
                        <td>
                            <a href="operations/update.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-success mx-1">update</a>
                            <a href="operations/delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger mx-1">delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
<?php
include_once '../partials/footer.php';