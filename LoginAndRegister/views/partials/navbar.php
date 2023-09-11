<?php
include_once "head.php";
?>

<nav class="navbar navbar-expand-md navbar-light bg-light p-3">
    <div class="container">
        <a href="../pages/home.php" class="navbar-brand">Registration System</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">

                <?php

                if(isset($_SESSION['email'])){
                    $path1 = __DIR__.'/../../controller/logoutaction.php';
                    // echo $path ; die;
                    echo "<a href='#' class='nav-link'>{$_SESSION['username']}</a>";
                    echo "<a href='../../controller/logoutaction.php' class='nav-link'>Log out</a>";
                }
                else {
                    echo '<a href="../pages/register.php" class="nav-link">Register</a>';
                    echo '<a href="../pages/login.php" class="nav-link">Log in</a>';
                }
                
                ?>


            </div>
        </div>
    </div>
</nav>