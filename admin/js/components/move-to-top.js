// alert("hi");
/* Move to Top: Start */
let moveToTop = () => {
  window.addEventListener("scroll", () => {
    let movetoTop = document.querySelector(".move-to-top");
    if (window.scrollY > 200) {
      movetoTop.classList.add("move-to-top--active");
    } else {
      movetoTop.classList.remove("move-to-top--active");
    }
    movetoTop.addEventListener("click", () => {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });
  });
};
moveToTop();
export default moveToTop;

/* Move to Top: End */
