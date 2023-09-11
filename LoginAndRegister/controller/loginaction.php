<?php
session_start();
require_once '../includes/connection.php';

$errors = array();

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    $selectedUser = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $selectedUser);
    $userResult = mysqli_fetch_assoc($res);

    if ($userResult) {

        if ($userResult['email'] == $email && $userResult['password'] == md5($password)) {
            // print_r($userResult);die;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $userResult['username'];
            // print_r($_SESSION);die;
            header('location:../views/pages/home.php');die;
        } 
        else {
            header('location:../views/pages/login.php');
            array_push($errors, "Email or Password not correct");
        }

    } else {
        header('location:../views/pages/login.php');
        array_push($errors, "Email or Password not correct");
    }
}
if ($errors){
    $_SESSION['errorsLogin'] = 'error';
}