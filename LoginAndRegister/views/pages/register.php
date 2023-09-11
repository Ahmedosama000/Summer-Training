<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once '../partials/head.php';
    if (isset($_SESSION['email']) && isset($_SESSION['username'])) {
        header('location:home.php');
        die;
    }
    ?>
</head>

<body>
    <?php include_once '../partials/navbar.php' ?>
    <header class="bg-dark text-center py-3 text-light container w-50 rounded my-5">
        <h2>Register Now</h2>
    </header>

    <section class="my-5 container w-50 mx-auto">
        <form action="../../controller/registeraction.php" method="post">
            <div class="form-group my-2">
                <label for="username">
                    <strong>Username</strong>
                </label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
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
            <div class="form-group my-2">
                <label for="confirm">
                    <strong>Confirm Password</strong>
                </label>
                <input type="password" name="confirm" id="confirm" class="form-control">
            </div>
            <input type="submit" value="Register" class="btn btn-dark my-2" name="register">
            <div class="my-3">
                <strong>Are you a member ? <a href="login.php" class="text-dark">Log in</a></strong>
            </div>
        </form>
    </section>
    <?php include_once '../partials/footer.php' ?>
