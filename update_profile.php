<?php
session_start();
$uploadDir = "uploads/";
$allowedTypes = ["jpg", "jpeg", "png", "gif"];

if (!isset($_SESSION['user'])) {
    header("Location: {$_SERVER['HTTP_REFERER']}?error=Please log in first");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profileImage'])) {
    $fileExt = strtolower(pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExt, $allowedTypes)) {
        header("Location: {$_SERVER['HTTP_REFERER']}?error=Invalid file type");
        exit;
    }

    $fileName = $_SESSION['user'] . ".jpg"; // Save as user-specific file
    $uploadFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $uploadFile)) {
        $_SESSION['profileImage'] = $uploadFile . "?" . time(); // Store new image with timestamp
        header("Location: {$_SERVER['HTTP_REFERER']}?success=Profile updated");
        exit;
    } else {
        header("Location: {$_SERVER['HTTP_REFERER']}?error=Upload failed");
        exit;
    }
}
?>
