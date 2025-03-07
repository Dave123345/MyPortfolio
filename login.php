<?php
session_start();

// Mock user data (Replace with a database query)
$users = [
    "iandavelemera" => password_hash("dave142002", PASSWORD_DEFAULT), // Hashed password
];

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=Missing login credentials");
    exit;
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (!isset($users[$username])) {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=User not found");
    exit;
}

// Verify password
if (password_verify($password, $users[$username])) {
    $_SESSION['user'] = $username;
    header("Location: " . $_SERVER['HTTP_REFERER']); // Redirect to the previous page
    exit;
} else {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=Invalid username or password");
    exit;
}
?>