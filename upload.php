<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['upload'])) {
    if (!isset($_FILES['images']) || !isset($_POST['category'])) {
        $_SESSION['upload_error'] = "Please select files and a category.";
        header("Location: index.php#portfolio");
        exit;
    }

    $category = preg_replace('/[^a-z0-9-]/', '', $_POST['category']); // Sanitize category
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    $uploadSuccess = false;

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
            $fileExt = strtolower(pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION));
            
            if (!in_array($fileExt, $allowedTypes)) {
                $_SESSION['upload_error'] = "Invalid file type. Allowed: JPG, JPEG, PNG, GIF.";
                continue;
            }
            
            $uniqueName = uniqid($category . '_', true) . '.' . $fileExt;
            $targetPath = $uploadDir . $uniqueName;
            
            if (move_uploaded_file($tmp_name, $targetPath)) {
                $uploadSuccess = true;
            }
        }
    }
    
    if ($uploadSuccess) {
        $_SESSION['upload_success'] = "Images uploaded successfully!";
    } else {
        $_SESSION['upload_error'] = "Error uploading images.";
    }
    
    header("Location: index.php#portfolio");
    exit;
}
?>