document.addEventListener("DOMContentLoaded", function () {
  const trigger = document.getElementById("trigger-popup");
  const popup = document.getElementById("popup-overlay");
  const close = document.getElementById("popup-close");
  const body = document.getElementById("popup-body");

  trigger.addEventListener("click", () => {
    popup.style.display = "flex";
    fetch("important.php")
      .then(res => res.text())
      .then(data => body.innerHTML = data)
      .catch(() => body.innerHTML = "Erreur de chargement.");
  });

  close.addEventListener("click", () => {
    popup.style.display = "none";
  });
});
