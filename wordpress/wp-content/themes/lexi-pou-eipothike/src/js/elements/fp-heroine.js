if (document.querySelector("a[href='??more']")) {
  document.querySelector("a[href='??more']").addEventListener("click", function (e) {
    e.preventDefault();
    let scrollOffset = document.querySelector(".lpe-fp-heroine-outer").offsetHeight;
    window.scrollTo({
      top: scrollOffset,
      behavior: "smooth"
    });
  });
}