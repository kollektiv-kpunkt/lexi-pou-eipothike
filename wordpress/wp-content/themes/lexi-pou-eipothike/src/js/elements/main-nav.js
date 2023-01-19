if (document.querySelector(".lpe-navbar-tofuburger")) {
  document.querySelector(".lpe-navbar-tofuburger").addEventListener("click", function () {
    let menuButton = document.querySelector(".lpe-navbar-tofuburger");
    let menuContainer = document.querySelector(".lpe-main-menu-container");
    if (menuButton.classList.contains("main-menu-open")) {
      document.documentElement.style.overflowY = "auto";
      document.querySelector("#main-content").classList.remove("main-menu-open");
      menuButton.classList.remove("main-menu-x");
      setTimeout(() => {
        menuButton.classList.remove("main-menu-open");
      }, 250);
      menuContainer.style.transform = "translateX(100%)";
    } else {
      document.documentElement.style.overflowY = "hidden";
      document.querySelector("#main-content").classList.add("main-menu-open");
      menuButton.classList.add("main-menu-open");
      setTimeout(() => {
        menuButton.classList.add("main-menu-x");
      }, 250);
      menuContainer.style.transform = "translateX(0)";
    }
  });
}