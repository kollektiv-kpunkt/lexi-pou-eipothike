if (document.querySelector(".lpe-event-more-button")) {
  document.querySelectorAll(".lpe-event-more-button").forEach((icon) => {
    icon.addEventListener("click", (e) => {
      let event = e.target.closest(".lpe-fp-event-wrapper");
      let eventDescription = event.querySelector(".lpe-event-description-wrapper");
      let eventDescriptionHeight = eventDescription.scrollHeight;

      if (eventDescription.classList.contains("lpe-event-description-wrapper--open")) {
        eventDescription.style.maxHeight = "0";
        e.target.style.transform = "rotate(0deg)";
        eventDescription.classList.remove("lpe-event-description-wrapper--open");
      } else {
        eventDescription.style.maxHeight = eventDescriptionHeight + "px";
        e.target.style.transform = "rotate(180deg)";
        eventDescription.classList.add("lpe-event-description-wrapper--open");
      }
    });
  });
}