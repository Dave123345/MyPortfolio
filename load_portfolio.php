<?php
$uploadDir = 'uploads/';
$categories = ['filter-app', 'filter-product', 'filter-branding', 'filter-books'];

$images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

foreach ($images as $image):
    $fileName = basename($image);
    $category = explode('_', $fileName)[0];
    if (!in_array($category, $categories)) $category = 'filter-books';
    ?>
    <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?php echo htmlspecialchars($category); ?>">
        <div class="portfolio-content h-100">
            <img src="<?php echo htmlspecialchars($image); ?>" class="img-fluid" alt="Uploaded Image">
            <div class="portfolio-info">
                <h4>Uploaded Image</h4>
                <a href="<?php echo htmlspecialchars($image); ?>" title="View Image" data-gallery="portfolio-gallery" class="glightbox preview-link">
                    <i class="bi bi-zoom-in"></i>
                </a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
