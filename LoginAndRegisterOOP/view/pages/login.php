<?php
$title = 'login';
include_once '../layouts/header.php';
include_once '../layouts/nav.php';

if(isset($_SESSION['user-email']) && isset($_SESSION['username'])){
    header('location:home.php');die;
}
?>

<header class="bg-dark text-center py-3 text-light container w-50 rounded my-5">
    <h2><?=$title?></h2>
</header>

<section class="my-5 container w-50 mx-auto">
    <form action="../../controller/handle/login.php" method="post">
        <div class="form-group my-2">
            <label for="email">
                <strong>Email</strong>
            </label>
            <input type="email" name="email" id="email" class="form-control"
            value = '<?= isset($_SESSION['enteredEmail'])? $_SESSION['enteredEmail']: '' ?> '>

        </div>
        <div class="form-group my-2">
            <label for="password"><strong>Password</strong></label>
            <input type="password" id="password" name="password" class="form-control">

            <?= isset($_SESSION['mailPassWrong'])? "<div class = 'alert alert-danger'>Email Or Password not correct </div>" : "" ;?>

        </div>
        <input type="submit" value="Login" class="btn btn-dark my-2" name="login">
        <div class="my-3">
            <strong>Are you not a member ? <a href="register.php" class="text-dark">Register</a></strong>

        </div>
    </form>
</section>

<?php 
include_once '../layouts/footer.php';
include_once '../layouts/finalyFooter.php';
unset($_SESSION['mailPassWrong']);
unset($_SESSION['enteredEmail']);