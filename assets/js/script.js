document.addEventListener("DOMContentLoaded", function() {
  const langButton = document.getElementById('langButton');
  const langMenu = document.getElementById('langMenu');
  const dropdown = document.querySelector('.language-dropdown');

  langButton.addEventListener('click', function(e) {
    e.preventDefault();
    dropdown.classList.toggle('open');
  });

  // Ferme le menu quand on clique en dehors
  document.addEventListener('click', function(e) {
    if (!dropdown.contains(e.target)) {
      dropdown.classList.remove('open');
    }
  });
});


