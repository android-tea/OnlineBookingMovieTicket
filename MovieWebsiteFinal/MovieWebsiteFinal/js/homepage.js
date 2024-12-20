document.addEventListener("DOMContentLoaded", function () {
  // Handle opening modal for all coming soon buttons with unique IDs
  document.querySelectorAll("[id^='comingSoonButton']").forEach(button => {
    button.addEventListener("click", function () {
      const modal = document.getElementById("comingSoonModal");
      if (modal) {
        modal.style.display = "block"; // Show the modal
      }
    });
  });

  // Handle close modal
  document.querySelector(".close-button").addEventListener("click", function () {
    const modal = document.getElementById("comingSoonModal");
    if (modal) {
      modal.style.display = "none"; // Hide the modal
    }
  });

  // Close modal when clicking outside the modal content
  window.addEventListener("click", function (event) {
    const modal = document.getElementById("comingSoonModal");
    if (modal && event.target === modal) {
      modal.style.display = "none";
    }
  });
});
document.querySelector('.arrow-left').addEventListener('click', function() {
  const posterContent = document.querySelector('.poster-content');
  posterContent.scrollBy({ left: -300, behavior: 'smooth' }); // Adjust the number to control scroll distance
});

document.querySelector('.arrow-right').addEventListener('click', function() {
  const posterContent = document.querySelector('.poster-content');
  posterContent.scrollBy({ left: 300, behavior: 'smooth' }); // Adjust the number to control scroll distance
});
