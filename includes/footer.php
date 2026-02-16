</main>
<script>
    function openPopup(url) {
      window.open(
        url,
        'popupWindow',
        'width=900,height=700,scrollbars=yes,resizable=yes'
      );
      return false; // Empêche le lien de se charger normalement
    }
  </script>
<style>
  footer a{
    color:rgb(251, 253, 255);
  text-decoration: none;
  }
  footer a:hover{
    color:rgb(245, 154, 34);
  text-decoration: none;
  }
  </style>
<footer>
  <a href="copyr.php" onclick="return openPopup(this.href);"><?= $lang['copyr'] ?></a>
</footer>
<script src="assets/js/script.js"></script>
<script>
  function toggleMenu() {
    document.getElementById('main-menu').classList.toggle('show');
  }
</script>
</body>
</html>
