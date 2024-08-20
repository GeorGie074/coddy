<?php

session_start();
require 'configp.php';
$minLength = 7;

if (isset($_POST['enter'])) {

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
}

if (strlen($password) < $minLength) {
    $_SESSION['error'] = "please enter a valid password";
    header("location: input_password.php");
} else if ($password !== $confirmPassword) {
    $_SESSION['error'] = "your password do nat math";
    header("location: input_password.php");
} else {

    if ($userNameExists) {
        $_SESSION['error'] = "Username already exists";
        header("location: input_password.php");
    } else if ($userEmailExists) {
        $_SESSION['error'] = "Email already exists";
        header("location: locker1_user.php");
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {

            $stmt = $pdo->prepare("INSERT INTO password_locker(password) VALUES(?)");
            $stmt->execute([$password]);

            $_SESSION['success'] = "Registration Successfully";
            header("location: locker1_user.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = "Something went wrong, please try again";
            echo "Registration failed: " . $e->getMessage();
            header("location: input_password.php");
        }
    }
}
