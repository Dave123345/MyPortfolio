<section id="portfolio" class="portfolio section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>


<?php if ($isLoggedIn): ?>
<div class="container">
    <form action="upload.php" method="POST" enctype="multipart/form-data" class="mb-4">
        <input type="file" name="image" required>
        <select name="category" required>
            <option value="filter-app">Start-Up Pitching</option>
            <option value="filter-product">Hack For Gov</option>
            <option value="filter-branding">Web Development</option>
            <option value="filter-books">Others</option>
        </select>
        <input type="submit" name="upload" value="Upload Image" class="btn btn-primary">
    </form>
</div>
<?php endif; ?>

        <p>Showcasing my projects and achievements, including Start-Up Pitching, Hack for Gov competitions, Web Development projects, and other innovations that contribute to the community.</p>

    </div>

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">Start-Up Pitching</li>
                <li data-filter=".filter-product">Hack For Gov</li>
                <li data-filter=".filter-branding">Web Development</li>
                <li data-filter=".filter-books">Others</li>
            </ul>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <!-- Dynamically Inserted Images -->
                <?php
$uploadDir = 'uploads/';
$categories = ['filter-app', 'filter-product', 'filter-branding', 'filter-books'];

$images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
?>

<div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
    <?php foreach ($images as $image): ?>
        <?php 
        // Extract category from filename
        $fileName = basename($image);
        $category = explode('_', $fileName)[0]; // Get category prefix
        if (!in_array($category, $categories)) $category = 'filter-books'; // Default category
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
    <?php endforeach; ?>
</div>


            </div>
        </div>
    </div>
</section>
