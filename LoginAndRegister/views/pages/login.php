
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once '../partials/head.php';
    if(isset($_SESSION['email']) && isset($_SESSION['username'])){
        header('location:home.php');die;
    }
    ?>
</head>
<body>
    <?php include_once '../partials/navbar.php' ?>
    <header class="bg-dark text-center py-3 text-light container w-50 rounded my-5">
        <h2>Login</h2>
    </header>

    <section class="my-5 container w-50 mx-auto">

    <?= empty($_SESSION['errorsLogin'])? "" : "<div class = 'alert alert-danger'> Something Wrong </div>"; ?>


        <form action="../../controller/loginaction.php" method="post">
            <div class="form-group my-2">
                <label for="email">
                <strong>Email</strong>
                </label>
                <input type="email" name="email" id="email" class="form-control">

            </div>
            <div class="form-group my-2">
                <label for="password"><strong>Password</strong></label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <input type="submit" value="Login" class="btn btn-dark my-2"
            name="login">
            <div class="my-3">
                <strong>Are you not a member ? <a href="register.php" class="text-dark">Register</a></strong>

            </div>
        </form>
    </section>
    <?php include_once '../partials/footer.php' ?>
<?php 
unset($_SESSION['errorsLogin']);