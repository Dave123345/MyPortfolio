<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".nav-link");

        function activateNavLink() {
            let scrollY = window.scrollY;

            sections.forEach((section) => {
                const sectionTop = section.offsetTop - 120;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute("id");

                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    navLinks.forEach((link) => {
                        link.classList.remove("active");
                        if (link.getAttribute("href") === `#${sectionId}`) {
                            link.classList.add("active");
                        }
                    });
                }
            });
        }

        window.addEventListener("scroll", activateNavLink);
    });


    // CARD PROJECT ANIMATION

    $(document).ready(function() {

        $('.card').delay(1800).queue(function(next) {
            $(this).removeClass('hover');
            $('a.hover').removeClass('hover');
            next();
        });
    });



    // achievement

    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".category-btn");
        const cards = document.querySelectorAll(".card");

        buttons.forEach(button => {
            button.addEventListener("click", () => {
                const category = button.getAttribute("data-category");

                // Remove active class from all buttons
                buttons.forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");

                // Show or hide cards based on category
                cards.forEach(card => {
                    if (category === "all" || card.getAttribute("data-category") === category) {
                        card.style.display = "flex"; // Show matching cards
                    } else {
                        card.style.display = "none"; // Hide others
                    }
                });
            });
        });
    });
</script>
</body>

</html>