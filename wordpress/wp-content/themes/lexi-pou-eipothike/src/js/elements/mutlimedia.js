import Masonry from "masonry-layout";

if (document.querySelector(".lpe-multimedia-grid")) {
  window.addEventListener("load", () => {
    setTimeout(() => {
      const grid = document.querySelector(".lpe-multimedia-grid");
      const msnry = new Masonry(grid, {
        itemSelector: ".lpe-multimedia-element",
        columnWidth: ".lpe-multimedia-element",

        gutter: ".lpe-multimedia-gutter-sizer"
      });
    }, 1000);
    setTimeout(() => {
      document.querySelector(".lpe-multimedia-loader").style.opacity = 0;
      setTimeout(() => {
        document.querySelector(".lpe-multimedia-loader").style.visibility = "hidden";
      }, 200);
    }, 1100);
  });
}