<?php
session_start();

function registerUser($username, $password, $isAdmin) {
    $userData = $username . ':' . password_hash($password, PASSWORD_BCRYPT) . ':' . ($isAdmin ? 'admin' : 'user') . PHP_EOL;
    file_put_contents('users.txt', $userData, FILE_APPEND);
}

function authenticateUser($username, $password) {
    $file = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($file as $line) {
        list($storedUsername, $storedHash, $userType) = explode(':', $line);
        if ($username === $storedUsername && password_verify($password, $storedHash)) {
            $_SESSION['username'] = $username;
            $_SESSION['isAdmin'] = ($userType === 'admin');
            return true;
        }
    }
    return false;
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {

    header('Location: ../index.php');
    exit; 
}



if (isset($_POST['action'])) {
    if ($_POST['action'] === 'register' && !empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $isAdmin = isset($_POST['isAdmin']);
        registerUser($username, $password, $isAdmin);
        echo "User registered successfully. <a href='login.php'>Login</a>";
        exit;
    } elseif ($_POST['action'] === 'login' && !empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (authenticateUser($username, $password)) {
            header('Location: ../home.php');
            exit;
        } else {
            echo "Invalid username or password. <a href='login.php'>Try again</a>";
            exit;
        }
    }
}
?>
