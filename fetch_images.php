<?php
$uploadDir = 'uploads/';
$categories = ['filter-app', 'filter-product', 'filter-branding', 'filter-books'];

// Get images with valid extensions
$images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

if (empty($images)) {
    echo '<p class="text-center">No images uploaded yet.</p>';
    exit;
}

// Loop through images
foreach ($images as $image) {
    $fileName = basename($image);

    // Extract category from filename if underscore exists
    $category = (strpos($fileName, '_') !== false) ? explode('_', $fileName)[0] : 'filter-books';

    // Validate category against allowed list
    if (!in_array($category, $categories)) {
        $category = 'filter-books';
    }
    ?>
    
    <!-- Ensure this part is outside PHP -->
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
} // End of foreach loop
?>
