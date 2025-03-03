document.getElementById("uploadForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let fileInput = document.getElementById("imageUpload");
    let category = document.getElementById("categorySelect").value;

    if (fileInput.files.length === 0) {
        alert("Please select an image to upload.");
        return;
    }

    let file = fileInput.files[0];
    let formData = new FormData();
    formData.append("image", file);
    formData.append("category", category);

    fetch("http://localhost:5000/upload", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.imageUrl) {
            displayImage(data.imageUrl, category);
            alert("Image uploaded successfully!");
            fileInput.value = "";
        } else {
            alert("Error uploading image.");
        }
    })
    .catch(error => {
        console.error("Upload failed:", error);
        alert("Upload failed. Please try again.");
    });
});

// Display uploaded images
function displayImage(imageUrl, category) {
    let portfolioContainer = document.getElementById("portfolioContainer");

    let imageElement = document.createElement("div");
    imageElement.className = `col-lg-4 col-md-6 portfolio-item isotope-item ${category}`;
    imageElement.innerHTML = `
        <div class="portfolio-content h-100">
            <img src="${imageUrl}" class="img-fluid" alt="Uploaded Image">
            <div class="portfolio-info">
                <h4>Uploaded Image</h4>
                <a href="${imageUrl}" title="View Image" data-gallery="portfolio-gallery" class="glightbox preview-link">
                    <i class="bi bi-zoom-in"></i>
                </a>
            </div>
        </div>
    `;
    portfolioContainer.appendChild(imageElement);
}
