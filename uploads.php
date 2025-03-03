<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profileImage']) && isset($_POST['username'])) {
    $username = $_POST['username'];
    $uploadDir = "uploads/";

    // Get file extension
    $fileExt = pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION);
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    if (!in_array(strtolower($fileExt), $allowedExtensions)) {
        echo json_encode(["success" => false, "error" => "Invalid file type. Only JPG, JPEG, PNG allowed."]);
        exit;
    }

    // Set new filename as "username.jpg"
    $newFileName = $uploadDir . $username . ".jpg";

    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $newFileName)) {
        echo json_encode(["success" => true, "filePath" => $newFileName]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to upload image."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request."]);
}
?>
