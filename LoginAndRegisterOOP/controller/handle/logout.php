<?php 

session_start();
unset($_SESSION['user-email']);
unset($_SESSION['username']);
header('location:../../view/pages/login.php');