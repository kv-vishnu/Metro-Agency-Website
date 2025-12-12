var base_url = $("#base_url").val();
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
                if (category === "all" || product.getAttribute("data-category") === category ) {
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

// category redirect to products page and store category in local storage
document.addEventListener("DOMContentLoaded", function () {

    // STORE CATEGORY WHEN CLICKING READ MORE
    const readMoreLinks = document.querySelectorAll(".read-more");
    readMoreLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            const categoryId = this.closest(".product-item").getAttribute("data-category");
            localStorage.setItem("selectedCategory", categoryId);
        });
    });
});


// products page load catgory selected and product also display against category 
document.addEventListener("DOMContentLoaded", function () {

    const selectedCategory = localStorage.getItem("selectedCategory") || "all";

    const buttons = document.querySelectorAll(".filter-btn");
    const products = document.querySelectorAll(".product-item");

    // Highlight active button
    buttons.forEach(btn => {
        btn.classList.remove("active");
        if (btn.getAttribute("data-category") === selectedCategory) {
            btn.classList.add("active");
        }
    });

    // Filter products on load
    // products.forEach(product => {
    //     if (selectedCategory === "all" || product.getAttribute("data-category") === selectedCategory) {
    //         product.style.display = "block";
    //     } else {
    //         product.style.display = "none";
    //         localStorage.removeItem("selectedCategory");
    //     }
    // });

    products.forEach(product => {
    const cat = product.getAttribute("data-category");

    if (selectedCategory === "all") {
        // Case 1: Show all products
        product.style.display = "block";

    } else if (cat === selectedCategory) {
        // Case 2: Show only matched category
        product.style.display = "block";

    } else {
        // Case 3: Everything else → hide products
        product.style.display = "none";
        // product.removeclass("d-none");
         localStorage.removeItem("selectedCategory");
    }
});

$(document).ready(function() {
    // Get the hidden input value
    var manufactureIds = $('#manfacture_ids').val();

    // Check if it has a value
    if (manufactureIds) {
        // Remove inline style from product items
        $('.product-item').removeAttr('style');
        $('.filter-btn').addClass('active');
    }
});




});


