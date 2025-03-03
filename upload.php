<?php
$uploadDir = 'uploads/'; // Directory to store uploaded images

if (isset($_POST['upload'])) {
    // Ensure the uploads directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $category = $_POST['category']; // Get the selected category
    $file = $_FILES['image'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        $uniqueName = uniqid($category . '_', true) . '.' . $fileExt; // Generate unique filename
        $targetFilePath = $uploadDir . $uniqueName;

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "<script>alert('Image uploaded successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error uploading image. Please try again.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('File upload error. Please try again.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>