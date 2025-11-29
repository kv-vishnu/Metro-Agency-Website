// menu 

  const menuToggle = document.getElementById('mobile-menu');
  const navLinks = document.getElementById('nav-links');
  menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
  });


// product category filter js

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".filter-btn");
    const products = document.querySelectorAll(".product-item");

    buttons.forEach(btn => {
        btn.addEventListener("click", function () {
            const category = this.getAttribute("data-category");

            products.forEach(product => {
                if (category === "all" || product.getAttribute("data-category") === category) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });

            // Active button highlight
            buttons.forEach(b => b.classList.remove("active"));
            this.classList.add("active");
        });
    });
});