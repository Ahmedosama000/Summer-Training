<?php
$title = 'Home';
include_once '../layouts/header.php';
include_once '../layouts/nav.php';
include_once '../../database/config.php';
include_once '../../model/Employees.php';

if (!isset($_SESSION['user-email'])){
    header('location:login.php');
}

?>


    <header class="bg-primary text-light text-center p-3">
        <h2>Employee Crud Demo</h2>
    </header>
    <section class="my-5 container">
        <a href="add.php" class="btn btn-dark mb-3">Add Employee</a>

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
                    $employee = new Employees;
                    $result = $employee->read();
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["salary"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["gender"] ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-success mx-1">update</a>
                            <a href="../../controller/handle/delete.php?id= <?php echo $row["id"]; ?>" class="btn btn-sm btn-danger mx-1">delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
<?php
include_once '../layouts/footer.php';
include_once '../layouts/finalyFooter.php';