// Components
import "./components/main-navigation.js";
import "./components/hero-slider-carousel.js";
import "./components/marquee-carousel.js";
import "./components/certification-partners-carousel.js";
import "./components/featured-courses-carousel.js";
import "./components/featured-courses-rev1.js";
import "./components/trainers-carousel.js";
import "./components/modal.js";
import "./components/new-batches-carousel.js";
import "./components/photo-gallery.js";
import "./components/testimonials-carousel.js";
import "./components/video-custom-player.js";
import "./components/blogs-list-carousel.js";
import "./components/copyright.js";
import "./vendors/scroll-animator.js";

// Forms
import "./forms/home/home-featured-course-enquiry.js";



// Custom observer to reset animation when leaving viewport
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      const el = entry.target;
      const animationClass = el.dataset.animation || "fadeIn";

      if (entry.isIntersecting) {
        // Add animation class when in view
        el.classList.add("animate__animated", `animate__${animationClass}`);
      } else {
        // Remove to allow replay when re-entering
        el.classList.remove("animate__animated", `animate__${animationClass}`);
        void el.offsetWidth; // Force reflow to reset
      }
    });
  },
  {
    threshold: 0.2, // 20% of element visible triggers it
  }
);

document.querySelectorAll(".animate-on-scroll").forEach((el) => {
  observer.observe(el);
});


// Set equal heights
function setEqualHeightsByClass(className) {
  const elements = document.querySelectorAll(`.${className}`);
  let maxHeight = 0;

  // Reset heights
  elements.forEach(el => {
    el.style.height = 'auto';
  });

  // Find max height
  elements.forEach(el => {
    const elHeight = el.offsetHeight;
    if (elHeight > maxHeight) {
      maxHeight = elHeight;
    }
  });

  // Set all to max height
  elements.forEach(el => {
    el.style.height = `${maxHeight}px`;
  });
}

function setAllEqualHeights() {
  setEqualHeightsByClass('certification-categories__item-description');
  // setEqualHeightsByClass('course-list-rev1__item-heading');
}

// Debounce to optimize resize calls
function debounce(func, wait = 100) {
  let timeout;
  return function (...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => func.apply(this, args), wait);
  };
}

// Run on page load
window.addEventListener('load', setAllEqualHeights);

// Run on resize
window.addEventListener('resize', debounce(setAllEqualHeights, 150));


/* Debug Test */
// document.body.append('home test log');