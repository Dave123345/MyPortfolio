<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$uploadDir = 'uploads/'; // Folder where images are stored
$categories = ['filter-app', 'filter-product', 'filter-branding', 'filter-books'];

// Check if upload directory exists, if not create it
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true); // Create directory with correct permissions
}

// Get all image files from the directory
$images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

if (empty($images)) {
    echo '<p class="text-center">No images uploaded yet.</p>';
    exit;
}

// Loop through images and display them
foreach ($images as $image) {
    $fileName = basename($image);
    
    // Extract category from filename if underscore exists
    $parts = explode('_', $fileName);
    $category = $parts[0] ?? 'filter-books'; // Default category if not found
    
    // Validate category against allowed list
    if (!in_array($category, $categories)) {
        $category = 'filter-books';
    }
    ?>
    <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?= htmlspecialchars($category) ?>">
        <div class="portfolio-content h-100">
            <img src="<?= htmlspecialchars($image) ?>" class="img-fluid" alt="Uploaded Image">
            <div class="portfolio-info">
                <h4>Uploaded Image</h4>
                <a href="<?= htmlspecialchars($image) ?>" title="View Image" data-gallery="portfolio-gallery" class="glightbox preview-link">
                    <i class="bi bi-zoom-in"></i>
                </a>
            </div>
        </div>
    </div>
    <?php
}
?>
