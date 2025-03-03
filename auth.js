document.addEventListener("DOMContentLoaded", function () {
    const profileImageElem = document.getElementById("profileImage");
    const loginForm = document.getElementById("loginForm");
    const updateProfileForm = document.getElementById("updateProfileForm");
    const logoutBtn = document.getElementById("logoutBtn");

    // Check if user is logged in
    fetch("http://localhost:5000/check-login", { credentials: "include" })
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn) {
                profileImageElem.src = data.user.profileImage;
                document.getElementById("updateUsername").value = data.user.username;
                profileImageElem.setAttribute("data-bs-target", "#updateProfileModal");
            } else {
                profileImageElem.setAttribute("data-bs-target", "#loginModal");
            }
        });

    // Login Form Submission
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();

        fetch("http://localhost:5000/login", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            credentials: "include",
            body: JSON.stringify({ username, password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Login successful!");
                window.location.reload();
            } else {
                alert("Invalid username or password!");
            }
        });
    });

    // Profile Image Upload
    updateProfileForm.addEventListener("submit", function (e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append("profileImage", document.getElementById("profileImageUpload").files[0]);

        fetch("http://localhost:5000/upload-profile", {
            method: "POST",
            credentials: "include",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            profileImageElem.src = data.imageUrl;
            alert("Profile updated successfully!");
        });
    });

    // Logout
    logoutBtn.addEventListener("click", function () {
        fetch("http://localhost:5000/logout", { method: "POST", credentials: "include" })
        .then(() => {
            alert("Logged out successfully!");
            window.location.reload();
        });
    });
});
