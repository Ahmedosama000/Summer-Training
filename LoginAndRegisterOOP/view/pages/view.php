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
    $cur_img = $row['image'];
}

?>

<section class="vh-100" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img src='<?=$cur_img?>' class="rounded-circle" alt="Avatar" style="width: 150px";>
                        <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Name</h6>
                                        <p class="text-muted"><?= $cur_name ?> </p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>salary</h6>
                                        <p class="text-muted"><?= $cur_salary ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Address</h6>
                                        <p class="text-muted"><?= $cur_address ?> </p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Gender</h6>
                                        <p class="text-muted"><?= $cur_gender ?> </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once '../layouts/footer.php';
include_once '../layouts/finalyFooter.php';
