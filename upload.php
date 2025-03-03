<?php
header('Content-Type: application/json'); // Ensure response is JSON

$uploadDir = 'uploads/'; // Directory to store uploaded images

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the uploads directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_FILES['image']['name']) && !empty($_POST['category'])) {
        $category = preg_replace('/[^a-z0-9-]/', '', $_POST['category']); // Sanitize category
        $file = $_FILES['image'];
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Allowed file types
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileExt, $allowedTypes)) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                $uniqueName = uniqid($category . '_', true) . '.' . $fileExt; // Unique filename
                $targetFilePath = $uploadDir . $uniqueName;

                if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                    echo json_encode(["status" => "success", "message" => "Image uploaded successfully!", "image" => $targetFilePath]);
                    exit;
                } else {
                    echo json_encode(["status" => "error", "message" => "Error uploading image."]);
                    exit;
                }
            } else {
                echo json_encode(["status" => "error", "message" => "File upload error."]);
                exit;
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid file type. Allowed: JPG, JPEG, PNG, GIF."]);
            exit;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Please select a file and category."]);
        exit;
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
    exit;
}
?>
