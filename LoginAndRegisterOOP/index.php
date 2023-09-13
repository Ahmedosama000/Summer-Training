<?php
$title = 'Home';
include_once 'view/layouts/header.php';
include_once 'view/layouts/nav.php';

if(isset($_SESSION['user-email']) && isset($_SESSION['username'])){
    header('location:view/pages/home.php');die;
}
?>

<div class="card text-center mt-5">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <h5 class="card-title">BookShop System</h5>
        <p class="card-text">PHP CRUD System.</p>
        <a href="#" class="btn btn-primary">Link</a>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>


<?php
include_once 'view/layouts/footer.php';
include_once 'view/layouts/finalyFooter.php';
