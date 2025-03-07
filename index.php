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
$profileImage = isset($_SESSION['profileImage']) ? $_SESSION['profileImage'] : "assets/img/my-profile-img.jpg";


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
    <img id="profileImage" 
         src="<?php echo htmlspecialchars($profileImage) . '?' . time(); ?>" 
         alt="Profile Image" 
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
        <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
        <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
        <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Achievements</a></li>
        <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
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
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
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
                <form action="login.php" method="POST">
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

<?php if ($isLoggedIn): ?>
<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="updateUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="updateUsername" name="updateUsername" 
                               value="<?php echo htmlspecialchars($username); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="profileImageUpload" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="profileImageUpload" name="profileImage" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Update Profile</button>
                </form>
                
                <!-- Logout Button -->
                <form action="logout.php" method="POST">
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

    

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/hero-bg.png" alt="" data-aos="fade-in" class="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>Ian Dave Lemera</h2>
        <p>I'm a <span class="typed" data-typed-items="Developer">Developer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>I am a fresh graduate with a Bachelor of Science in Information Technology (BSIT) from Sibugay Technical Institute Incorporated in Ipil, Zamboanga Sibugay. Passionate about technology and innovation, I specialize in web development and software solutions. My goal is to create user-friendly and efficient systems that solve real-world problems.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="<?php echo htmlspecialchars($profileImage) . '?' . time(); ?>" class="img-fluid" alt="">

            
          </div>
          <div class="col-lg-8 content">
            <h2>Web Developer | IT Enthusiast</h2>
            <p class="fst-italic py-3">
            As a motivated and detail-oriented IT professional, I have experience in developing web applications, database management, and software development. I am eager to apply my knowledge and skills to contribute to meaningful projects and continuously grow in the tech industry.
            </p>
            <div class="row">
  <div class="col-lg-6">
    <ul>
      <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span id="birthday">14 December 2002</span></li>
      <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.davelemera.com</span></li>
      <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>09776029729</span></li>
      <li><i class="bi bi-chevron-right"></i> <strong>Location:</strong> <span>Ipil, Zamboanga Sibugay</span></li>
    </ul>
  </div>
  <div class="col-lg-6">
    <ul>
      <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span id="age"></span></li>
      <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Bachelor of Science in Information Technology (BSIT)</span></li>
      <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>iandavelemera@gmail.com</span></li>
      <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
    </ul>
  </div>
</div>

<script>
  function calculateAge(birthdate) {
    const birth = new Date(birthdate);
    const today = new Date();
    let age = today.getFullYear() - birth.getFullYear();
    const monthDiff = today.getMonth() - birth.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
      age--;
    }
    return age;
  }

  document.getElementById("age").textContent = calculateAge("2002-12-14");
</script>

            <p class="py-3">
            I am excited to explore opportunities where I can apply my skills, learn from experienced professionals, and make a positive impact in the tech industry.


            </p>
          </div>
        </div>

      </div>

    </section>

    <!-- /About Section -->

    <!-- Stats Section -->
    

    <!-- /Stats Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section light-background">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Skills</h2>
  <p>Proficient in modern web development technologies, database management, and backend programming.</p>
</div>
<!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">
  <div class="row skills-content skills-animation">

    <div class="col-lg-6">

      <div class="progress">
        <span class="skill">HTML <i class="val">90%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <!-- End Skills Item -->

      <div class="progress">
        <span class="skill">CSS <i class="val">90%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <!-- End Skills Item -->

      <div class="progress">
        <span class="skill">JavaScript <i class="val">75%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <!-- End Skills Item -->

    </div>

    <div class="col-lg-6">

      <div class="progress">
        <span class="skill">PHP <i class="val">80%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <!-- End Skills Item -->

      <div class="progress">
        <span class="skill">MySQL <i class="val">90%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <!-- End Skills Item -->

    </div>

  </div>
</div>

</section>

    <!-- /Skills Section -->

    <!-- Resume Section -->

    <section id="resume" class="resume section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Resume</h2>
  <p>A dedicated and detail-oriented IT graduate with a strong passion for web development, software solutions, and database management. Eager to apply technical skills and problem-solving abilities to real-world projects.</p>
</div>
<!-- End Section Title -->

<div class="container">
  <div class="row">

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
      <h3 class="resume-title">Summary</h3>

      <div class="resume-item pb-0">
        <h4>Ian Dave Lemera</h4>
        <p><em>Recent BSIT graduate from Sibugay Technical Institute Incorporated with experience in web development, database management, and IT support. Passionate about creating efficient, user-friendly digital solutions.</em></p>
        <ul>
          <li>Ipil, Zamboanga Sibugay, Philippines</li>
          <li>09776029729</li>
          <li>iandavelemera@gmail.com</li>
        </ul>
      </div>
      <!-- End Resume Item -->

      <h3 class="resume-title">Education</h3>
      <div class="resume-item">
        <h4>Bachelor of Science in Information Technology (BSIT)</h4>
        <h5>2020 - 2024</h5>
        <p><em>Sibugay Technical Institute Incorporated, Ipil, Zamboanga Sibugay</em></p>
        <p>Gained in-depth knowledge of software development, web technologies, database management, and IT support. Completed projects in system development and web application design.</p>
      </div>
      <!-- End Resume Item -->

      <h3 class="resume-title">Professional Experience</h3>

      <div class="resume-item">
        <h4>On-the-Job Training (OJT) - IT Assistant</h4>
        <h5>January 2024 - April 2024</h5>
        <p><em>Office of the College of Computer Studies Faculty, STII</em></p>
        <ul>
          <li>Assisted in managing enrollment systems and updating student records.</li>
          <li>Handled document processing, including memos, academic reports, and syllabi.</li>
          <li>Provided IT support and assisted in software troubleshooting.</li>
          <li>Checked and managed quiz and exam papers for faculty.</li>
        </ul>
      </div>
      <!-- End Resume Item -->

      <div class="resume-item">
        <h4>Freelance Web Developer</h4>
        <h5>2023 - Present</h5>
        <p><em>Self-Employed</em></p>
        <ul>
          <li>Designed and developed websites for small businesses and startups.</li>
          <li>Created dynamic web applications using HTML, CSS, JavaScript, PHP, and MySQL.</li>
          <li>Implemented responsive web designs and optimized website performance.</li>
          <li>Worked with clients to understand project requirements and deliver tailored solutions.</li>
        </ul>
      </div>
      <!-- End Resume Item -->
    </div>

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
      

      <h3 class="resume-title">Competitions & Incubation Programs</h3>
      <div class="resume-item">
        <h4>Hack for Gov Competition</h4>
        <h5>2023 & 2024</h5>
        <p><em>Managed by DICT</em></p>
        <p><em>Zamboanga City</em></p>
        <ul>
          <li>Won 1st place in one edition and 2nd place in another.</li>
          <li>Developed innovative tech solutions addressing government challenges.</li>
        </ul>
      </div>
      <!-- End Resume Item -->

      <div class="resume-item">
        <h4>Start-Up Pitching Competitions</h4>
        <p><em>Managed by DICT</em></p>

        <h5>2022 - 2024</h5>
        <p><em>Regional & Institutional Levels</em></p>
        <ul>
          <li>Competed in 2 regional and 4 institutional pitching competitions.</li>
          <li>Presented and defended innovative tech project ideas.</li>
        </ul>
      </div>
      <!-- End Resume Item -->

      <div class="resume-item">
        <h4>Web Development Competition using WordPress</h4>
        <h5>2023</h5>
        <p><em>Managed by DICT</em></p>
        <ul>
          <li>Competed in a web development challenge focused on WordPress.</li>
          <li>Designed and deployed a fully functional website under competition constraints.</li>
        </ul>
      </div>
      <!-- End Resume Item -->

      <!-- <div class="resume-item">
        <h4>Development Competition</h4>
        <h5>2023</h5>
        <p><em>Managed by TESDA</em></p>
        <ul>
          <li>Showcased technical skills in software development.</li>
          <li>Developed a project demonstrating problem-solving and programming expertise.</li>
        </ul>
      </div> -->
      <!-- End Resume Item -->

      <div class="resume-item">
        <h4>DICT Python Training Program</h4>
        <h5>2023</h5>
        <p><em>Managed by DICT</em></p>
        <ul>
          <li>Completed training focused on Python programming.</li>
          <li>Worked on hands-on exercises to build proficiency in Python development.</li>
        </ul>
      </div>
      <!-- End Resume Item -->

      <div class="resume-item">
        <h4>DOST-ADZU AZUL HUB Incubation Program</h4>
        <h5>2023 - 2024</h5>
        <p><em>DOST-ADZU AZUL HUB</em></p>
        <ul>
          <li>Participated in a startup incubation program focused on technology and entrepreneurship.</li>
          <li>Developed and refined a project under expert guidance.</li>
        </ul>
      </div>
      <!-- End Resume Item -->
    </div>
  </div>
</div>
</section>
    <!-- /Resume Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section light-background">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Portfolio</h2>


    <?php


if ($isLoggedIn): ?>
<div class="container">
<form action="upload.php" method="POST" enctype="multipart/form-data" class="mb-4">
    <input type="file" name="images[]" multiple required>
    <select name="category" required>
        <option value="filter-app">Start-Up Pitching</option>
        <option value="filter-product">Hack For Gov</option>
        <option value="filter-branding">Web Development</option>
        <option value="filter-books">Others</option>
    </select>
    <input type="submit" name="upload" value="Upload Images" class="btn btn-primary">
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

    <!-- /Portfolio Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Services</h2>
  <p>As a BSIT student with a passion for exploration and outdoor activities, I enjoy applying my creativity and problem-solving skills in both technology and adventure. Here are some of the areas where I am actively learning and gaining experience:</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
      <div class="icon flex-shrink-0"><i class="bi bi-code-slash"></i></div>
      <div>
        <h4 class="title"><a href="service-details.php" class="stretched-link">Web Development (Learning)</a></h4>
        <p class="description">Exploring web technologies to build functional and interactive websites while improving my coding skills.</p>
      </div>
    </div>
    <!-- End Service Item -->

    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
      <div class="icon flex-shrink-0"><i class="bi bi-phone"></i></div>
      <div>
        <h4 class="title"><a href="service-details.php" class="stretched-link">Mobile App Development (Exploring)</a></h4>
        <p class="description">Gaining hands-on experience in creating mobile applications for Android and iOS.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
      <div class="icon flex-shrink-0"><i class="bi bi-bar-chart-line"></i></div>
      <div>
        <h4 class="title"><a href="service-details.php" class="stretched-link">Data Analysis (Studying)</a></h4>
        <p class="description">Learning how to analyze and interpret data to extract meaningful insights.</p>
      </div>
    </div><!-- End Service Item -->

    

    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
      <div class="icon flex-shrink-0"><i class="bi bi-lightbulb"></i></div>
      <div>
        <h4 class="title"><a href="service-details.php" class="stretched-link">Creative Problem-Solving</a></h4>
        <p class="description">Using critical thinking and creativity to find innovative solutions in both tech and outdoor challenges.</p>
      </div>
    </div><!-- End Service Item -->

   

    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="700">
      <div class="icon flex-shrink-0"><i class="bi bi-file-earmark-spreadsheet"></i></div>
      <div>
        <h4 class="title"><a href="service-details.php" class="stretched-link">Microsoft Office (Word & Excel)</a></h4>
        <p class="description">Proficient in using Microsoft Word and Excel for document creation, data management, and organization.</p>
      </div>
    </div><!-- End Service Item -->

  </div>

</div>

</section>
    <!-- /Services Section -->

    <!-- Testimonials Section -->
 
     
    <!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Contact</h2>
  <p>Feel free to reach out to me for any inquiries or collaborations.</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <div class="col-lg-12">

      <div class="info-wrap">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Address</h3>
            <p>Ipil, Zamboanga Sibugay</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Me</h3>
            <p>09776029729</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Me</h3>
            <p>iandavelemera@gmail.com</p>
          </div>
        </div><!-- End Info Item -->

        <iframe src="https://www.google.com/maps/place/Sibugay+Technical+Institute+Incorporated/@7.7299811,122.5899751,11.42z/data=!4m6!3m5!1s0x3253d8f4002b2f89:0xf6c5683fa8d4e090!8m2!3d7.785663!4d122.586329!16s%2Fg%2F1tfm8rvh?entry=ttu&g_ep=EgoyMDI1MDIyNi4xIKXMDSoASAFQAw%3D%3D" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>




  </div>

</div>

</section>
    <!-- /Contact Section -->

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