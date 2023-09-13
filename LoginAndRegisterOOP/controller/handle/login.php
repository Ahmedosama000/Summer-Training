<?php

include_once '../../view/layouts/header.php';
include_once '../../database/config.php';
include_once '../requests/validation.php';
include_once '../../model/User.php';

$success = array();

if (isset($_POST['login'])) {

    // email validation 

    $emailValidation = new validtaion;
    $emailExistsResult = $emailValidation->isExists('email');
    if (empty($emailExistsResult)) {
        $_SESSION['enteredEmail'] = $_POST['email'];
        $emailRequiredResult = $emailValidation->required('email', $_POST['email']);
        if (empty($emailRequiredResult)) {
            $emailEscapeResult = $emailValidation->realEscape($_POST['email']);
            $emailEscapeResult = $emailValidation->getFilterValue();

            $emailUniqueResult = $emailValidation->unique('users', 'email', $emailEscapeResult);
            if ($emailUniqueResult) {
                $_SESSION['emailValidation'] = 'valid';
            }
        }
    }

    // password validation 

    $passwordValidation = new validtaion;
    $passwordExistsResult = $passwordValidation->isExists('password');
    if (empty($passwordExistsResult)) {
        $passwordRequiredResult = $passwordValidation->required('password', $_POST['password']);
        if (empty($passwordRequiredResult)) {
            $passwordEscapeResult = $passwordValidation->realEscape($_POST['password']);
            $passwordEscapeResult = $passwordValidation->getFilterValue();
            $_SESSION['passwordValidation'] = 'valid';
        }
    }
}

if (isset($_SESSION['emailValidation']) && isset($_SESSION['passwordValidation'])){
    $user = new User;
    $user->setEmail($emailEscapeResult);
    $user->setPassword($passwordEscapeResult);
    $result = $user->login();
    if ($result) {
        $userResult = mysqli_fetch_assoc($result);
        $_SESSION['user-email'] = $emailEscapeResult;
        $_SESSION['username'] = $userResult['username'];
        unset($_SESSION['passwordValidation']);
        unset($_SESSION['emailValidation']);
        unset($_SESSION['enteredEmail']);
        header('location:../../view/pages/home.php');die;
    }
    else {
        $_SESSION['mailPassWrong'] = 'Error';
        header('location:../../view/pages/login.php');die;
    }
}
else {
    $_SESSION['mailPassWrong'] = 'Error';
    header('location:../../view/pages/login.php');die;
}