<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dave</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon1.png" rel="icon">
  <link href="assets/img/favicon1.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">


  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio /css/main.css
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <!-- Profile Image -->
    <?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? $_SESSION['user'] : '';

// Default profile image
$profileImage = "assets/img/my-profile-img.jpg"; // Change this to your default image

// Check if a profile image exists for any user (whether logged in or not)
$uploadDir = "uploads/";
$profileImages = glob($uploadDir . "*.jpg"); // Get all profile images

// If logged in, check for the user's specific profile image
if ($isLoggedIn) {
    $userProfileImage = $uploadDir . $username . ".jpg"; // User-specific profile image
    if (file_exists($userProfileImage)) {
        $profileImage = $userProfileImage;
    }
} elseif (!empty($profileImages)) {
    // If not logged in, but there are profile images, use the latest uploaded one
    $latestProfileImage = end($profileImages);
    $profileImage = $latestProfileImage;
}
?>

<div class="profile-img">
    <img id="profileImage" src="<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image" 
         class="img-fluid rounded-circle"
         data-bs-toggle="modal" 
         data-bs-target="<?php echo $isLoggedIn ? '#updateProfileModal' : '#loginModal'; ?>" 
         style="cursor: pointer;">
</div>







    <a href="index.html" class="logo d-flex align-items-center justify-content-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">Ian Dave Lemera</h1>
    </a>

    <div class="social-links text-center">
      <!-- <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a> -->
      <a href="https://www.facebook.com/aindavel" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="https://github.com/Dave123345" class="github" target="_blank"><i class="bi bi-github"></i></a>

      <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
        <li><a href="index.php#about"><i class="bi bi-person navicon"></i> About</a></li>
        <li><a href="index.php#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
        <li><a href="index.php#portfolio"><i class="bi bi-images navicon"></i> Achievements</a></li>
        <li><a href="index.php#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
        <!-- <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
          </ul>
        </li> -->
        <li><a href="index.php#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
      </ul>
    </nav>

  </header>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Profile Modal -->
<?php if ($isLoggedIn): ?>
<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProfileForm">
                    <div class="mb-3">
                        <label for="updateUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="updateUsername" name="updateUsername" 
                               value="<?php echo htmlspecialchars($username); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="profileImageUpload" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="profileImageUpload" name="profileImage">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Update Profile</button>
                </form>
                
                <!-- 🔥 Logout Button -->
                <form id="logoutForm" action="logout.php" method="POST">
                    <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<!-- JavaScript for AJAX Login -->
<script>
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    let username = document.getElementById('username').value.trim();
    let password = document.getElementById('password').value.trim();
    let messageDiv = document.getElementById('login-message');

    fetch('login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username: username, password: password })
    })
    .then(response => response.json())
    .then(data => {
        console.log("Server response:", data); // Debugging

        messageDiv.classList.remove('d-none', 'alert-success', 'alert-danger');

        if (data.success) {
            messageDiv.classList.add('alert-success');
            messageDiv.textContent = data.message;

            // Reload page after successful login
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            messageDiv.classList.add('alert-danger');
            messageDiv.textContent = data.message;
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        messageDiv.classList.remove('d-none');
        messageDiv.classList.add('alert-danger');
        messageDiv.textContent = 'An error occurred. Please try again.';
    });
});




document.getElementById("updateProfileForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData();
    formData.append("profileImage", document.getElementById("profileImageUpload").files[0]);

    fetch("update_profile.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Profile updated successfully!");

            // Update profile image instantly
            document.getElementById("profileImage").src = data.profileImage + "?" + new Date().getTime();

            // Close the modal
            let modal = bootstrap.Modal.getInstance(document.getElementById("updateProfileModal"));
            modal.hide();
        } else {
            alert("Failed to update profile.");
        }
    })
    .catch(error => console.error("Error:", error));
});



</script>

    <main class="main">

      <!-- Page Title -->
      <div class="page-title dark-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
          <h1 class="mb-2 mb-lg-0">Service Details</h1>
          <nav class="breadcrumbs">
            <ol>
              <li><a href="index.php">Home</a></li>
              <li class="current">Service Details</li>
            </ol>
          </nav>
        </div>
      </div><!-- End Page Title -->
  
      <!-- Service Details Section -->
      <section id="service-details" class="service-details section">
  
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="services-list">
                <a href="#" class="active">Web Development</a>
                <a href="#">Mobile App Development</a>
                <a href="#">Data Analysis</a>
                <a href="#">Outdoor Exploration & Tech</a>
                <a href="#">Creative Problem-Solving</a>
              </div>
  
              <h4>Enhancing Skills Through Hands-On Learning</h4>
              <p>As a BSIT student with a passion for technology and problem-solving, I am actively exploring various domains to enhance my expertise. I aim to integrate innovative solutions into my projects and professional work.</p>
            </div>
  
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              <img src="uploads/filter-branding_67c7237e8379a8.66761325.jpeg" alt="" class="img-fluid services-img">
              <h3>Applying Technology to Real-World Challenges</h3>
              <p>
                My learning journey involves developing web and mobile applications, analyzing data for meaningful insights, and integrating technology with outdoor exploration. I constantly challenge myself with new projects and competitions to refine my skills.
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> <span>Building functional and interactive web applications.</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Exploring mobile app development for Android and iOS.</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Applying data analysis techniques for problem-solving.</span></li>
              </ul>
              <p>
                My experience in hackathons and competitions has strengthened my ability to develop creative solutions under pressure. I enjoy working on collaborative projects and applying critical thinking to tackle real-world problems.
              </p>
              <p>
                Looking ahead, I aspire to refine my expertise and expand my portfolio by working on diverse projects, gaining industry experience, and contributing to the tech community.
              </p>
            </div>
  
          </div>
  
        </div>
  
      </section><!-- /Service Details Section -->
  
    </main>
  
    <footer id="footer" class="footer position-relative light-background">

<div class="container">
  <div class="copyright text-center ">
    <!-- <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p> -->
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you've purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
    <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a> -->
  </div>
</div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.16/dist/typed.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.16/dist/typed.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="https://cdn.jsdelivr.net/npm/waypoints@4.0.1/lib/noframework.waypoints.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>