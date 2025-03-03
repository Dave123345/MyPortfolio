<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user'])) {
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit;
}

if (!empty($_FILES['profileImage']['name'])) {
    $uploadDir = "uploads/";
    $fileName = $_SESSION['user'] . ".jpg"; // Save file as {username}.jpg
    $uploadFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $uploadFile)) {
        echo json_encode(["success" => true, "profileImage" => $uploadFile]);
    } else {
        echo json_encode(["success" => false, "message" => "Error uploading file"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "No file selected"]);
}
?>
