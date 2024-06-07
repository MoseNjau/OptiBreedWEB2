document.addEventListener("DOMContentLoaded", function() {
  // Get all buttons and tab content divs
  const buttons = document.querySelectorAll(".nav-link");
  const tabContents = document.querySelectorAll(".tab-pane");

  // Function to remove active class from all buttons and hide all tab contents
  function resetTabs() {
    buttons.forEach(button => {
      button.classList.remove("active");
    });
    tabContents.forEach(content => {
      content.classList.remove("show", "active");
    });
  }

  // Add click event listener to each button
  buttons.forEach(button => {
    button.addEventListener("click", function() {
      // Reset all tabs
      resetTabs();
      
      // Add active class to clicked button
      this.classList.add("active");
      
      // Show the corresponding tab content
      const target = document.querySelector(this.dataset.bsTarget);
      target.classList.add("show", "active");
    });
  });
});
