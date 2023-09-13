<?php

include_once '../../view/layouts/header.php';
include_once '../../database/config.php';
include_once '../requests/validation.php';
include_once '../../model/User.php';

$success = array();

if (isset($_POST['register'])) {

    // username validation 

    $usernameValidation = new validtaion;
    $usernameExistsResult = $usernameValidation->isExists('username');
    if (empty($usernameExistsResult)) {
        $_SESSION['enterdRUsername'] = $_POST['username'];

        $usernameRequiredResult = $usernameValidation->required('username', $_POST['username']);
        if (empty($usernameRequiredResult)) {
            $usernameEscapeResult = $usernameValidation->realEscape($_POST['username']);
            $usernameEscapeResult = $usernameValidation->getFilterValue();
            $_SESSION['usernameValidation'] = 'valid';
        } else {
            $_SESSION['errors']['username'] = 'username is required';
        }
    } else {
        $_SESSION['errors']['username'] = 'username is required';
    }

    // email validation 

    $emailValidation = new validtaion;
    $emailExistsResult = $emailValidation->isExists('email');
    if (empty($emailExistsResult)) {
        $_SESSION['enterdEmail'] = $_POST['email'];

        $emailRequiredResult = $emailValidation->required('email', $_POST['email']);
        if (empty($emailRequiredResult)) {
            $emailEscapeResult = $emailValidation->realEscape($_POST['email']);
            $emailEscapeResult = $emailValidation->getFilterValue();

            $emailUniqueResult = $emailValidation->unique('users', 'email', $emailEscapeResult);
            if (empty($emailUniqueResult)) {
                $_SESSION['emailValidation'] = 'valid';
            } else {
                $_SESSION['errors']['email'] = 'Email is already taken';
            }
        } else {
            $_SESSION['errors']['email'] = 'Email is required';
        }
    } else {
        $_SESSION['errors']['email'] = 'Email is required';
    }

    // password validation 
    $passwordCValidation = new validtaion;
    $isPasswordCExists = $passwordCValidation->isExists('confirm');
    if (empty($isPasswprdCExists)) {
        $passwordCEscapeResult = $passwordCValidation->realEscape($_POST['confirm']);
        $passwordCEscapeResult = $passwordCValidation->getFilterValue();
        $passwordValidation = new validtaion;
        $passwordExistsResult = $passwordValidation->isExists('password');
        if (empty($passwordExistsResult)) {
            $passwordRequiredResult = $passwordValidation->required('password', $_POST['password']);
            if (empty($passwordRequiredResult)) {
                $passwordEscapeResult = $passwordValidation->realEscape($_POST['password']);
                $passwordEscapeResult = $passwordValidation->getFilterValue();
                $passwordConfirmedResult = $passwordValidation->confirmed('password', $passwordEscapeResult, $passwordCEscapeResult);
                if (empty($passwordConfirmedResult)) {
                    $_SESSION['passwordValidation'] = 'valid';
                }
                else {
                    $_SESSION['errors']['password'] = 'Password Not Matching';
                }
            }
            else {
                $_SESSION['errors']['password'] = 'Password is required';
            }
        }
        else {
            $_SESSION['errors']['password'] = 'Password is required';
        }
    }
    else {
        $_SESSION['errors']['passwordC'] = 'Password is required';
    }
}
if (
    isset($_SESSION['emailValidation']) && isset($_SESSION['passwordValidation'])
    && isset($_SESSION['usernameValidation'])
) {
    $user = new User;
    $user->setEmail($emailEscapeResult);
    $user->setPassword($passwordEscapeResult);
    $user->setUsername($usernameEscapeResult);

    $result = $user->create();
    if ($result) {

        unset($_SESSION['emailValidation']);
        unset($_SESSION['passwordValidation']);
        unset($_SESSION['usernameValidation']);
        header('location:../../view/pages/login.php');
        die;
    } else {
        header('location:../../view/pages/register.php');
        die;
    }
} else {
    header('location:../../view/pages/register.php');
    die;
}
