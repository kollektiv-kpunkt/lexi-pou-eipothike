let prevScroll = window.scrollY;
if (document.querySelector(".lpe-navbar-wrapper")) {
  document.addEventListener("scroll", function () {
    let isFrontpage = document.querySelector("body").classList.contains("home");
    var menuWrapper = document.querySelector(".lpe-navbar-wrapper");
    if (window.scrollY > prevScroll) {
      menuWrapper.classList.add("scrollup");
    }
    if (window.scrollY < prevScroll) {
      menuWrapper.classList.remove("scrollup");
    }
    if (window.scrollY > 100) {
      menuWrapper.classList.add("bg-ocean");
    }
    if (window.scrollY < 100) {
      if (isFrontpage) {
        menuWrapper.classList.remove("bg-ocean");
      }
      menuWrapper.classList.remove("scrollup");
    }
    prevScroll = window.scrollY;
  });
}