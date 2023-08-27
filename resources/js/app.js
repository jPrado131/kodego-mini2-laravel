import './bootstrap';


  // ON WINDOW SCROLL ADD HEADER CLASS
  const elemHeader = document.querySelector("#header");

  window.addEventListener("scroll", function () {
    // Check if the window is scrolled to the top
    if (window.scrollY === 0) {
      // Remove a class to the element when scrolled to the top
      elemHeader.classList.remove("bg-black");
    } else {
      // Add the class if scrolled away from the top
      elemHeader.classList.add("bg-black");
    }
  });