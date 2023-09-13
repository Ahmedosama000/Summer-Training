<?php
$title = 'Register';
include_once '../layouts/header.php';
include_once '../layouts/nav.php';

if(isset($_SESSION['user-email']) && isset($_SESSION['username'])){
    header('location:home.php');die;
}
?>


<header class="bg-dark text-center py-3 text-light container w-50 rounded my-5">
    <h2>Register Now</h2>
</header>

<section class="my-5 container w-50 mx-auto">
    <form action="../../controller/handle/register.php" method="post">
        <div class="form-group my-2">
            <label for="username">
                <strong>Username</strong>
            </label>
            <input type="text" class="form-control" id="username" name="username"
            value = "<?= isset($_SESSION['enterdUsername'])? $_SESSION['enterdUsername']: '' ?> ">

            <?php 
            if (isset($_SESSION['errors']['username'])){
                echo "<div class = 'alert alert-danger'> {$_SESSION['errors']['username']}</div>";
            }
            ?>

        </div>
        <div class="form-group my-2">
            <label for="email">
                <strong>Email</strong>
            </label>
            <input type="email" name="email" id="email" class="form-control"
            value = '<?= isset($_SESSION['enteredEmail'])? $_SESSION['enteredEmail']: '' ?> '>

            <?php 
            if (isset($_SESSION['errors']['email'])){
                echo "<div class = 'alert alert-danger'> {$_SESSION['errors']['email']}</div>";
            }
            ?>

        </div>
        <div class="form-group my-2">
            <label for="password"><strong>Password</strong></label>
            <input type="password" id="password" name="password" class="form-control">

            <?php 
            if (isset($_SESSION['errors']['password'])){
                echo "<div class = 'alert alert-danger'> {$_SESSION['errors']['password']}</div>";
            }
            ?>

        </div>
        <div class="form-group my-2">
            <label for="confirm">
                <strong>Confirm Password</strong>
            </label>
            <input type="password" name="confirm" id="confirm" class="form-control">

            <?php 
            if (isset($_SESSION['errors']['passwordC'])){
                echo "<div class = 'alert alert-danger'> {$_SESSION['errors']['passwordC']}</div>";
            }
            ?>

        </div>
        <input type="submit" value="Register" class="btn btn-dark my-2" name="register">
        <div class="my-3">
            <strong>Are you a member ? <a href="login.php" class="text-dark">Log in</a></strong>
        </div>
    </form>
</section>

<?php

include_once '../layouts/footer.php';
include_once '../layouts/finalyFooter.php';

unset($_SESSION['errors']);
unset($_SESSION['enterdUsername']);
unset($_SESSION['enterdEmail']);