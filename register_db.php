<?php

session_start();
require 'config.php';
$minLength = 6;

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
}

if (empty($username)) {
    $_SESSION['error'] = "please enter your username";
    header("location: register.php");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "please enter a valid address";
    header("location: register.php");
} else if (strlen($password) < $minLength) {
    $_SESSION['error'] = "please enter a valid password";
    header("location: register.php");
} else if ($password !== $confirmPassword) {
    $_SESSION['error'] = "your password do not math";
    header("location: register.php");
} else {

    $checkUsername = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $checkUsername->execute([$username]);
    $userNameExists = $checkUsername->fetchColumn();

    $checkEmail = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $checkEmail->execute([$email]);
    $userEmailExists = $checkEmail->fetchColumn();

    if ($userNameExists) {
        $_SESSION['error'] = "Username already exists";
        header("location: register.php");
    } else if ($userEmailExists) {
        $_SESSION['error'] = "Email already exists";
        header("location: register.php");
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {

            $stmt = $pdo->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?)");
            $stmt->execute([$username, $email, $password]);

            $_SESSION['success'] = "Registration Successfully";
            header("location: register.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = "Something went wrong, please try again";
            echo "Registration failed: " . $e->getMessage();
            header("location: register.php");
        }
    }
}
