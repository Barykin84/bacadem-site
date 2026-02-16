<?php include 'language.php'; ?>
<!DOCTYPE html>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="<?php echo $_SESSION['lang'] ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang['title'] ?></title>
     <meta name="description" content="<?php echo $lang['description_site'] ?>">
      <meta name="keywords" content="<?php echo $lang['mot_cle'] ?>">
      <meta name="author" content="Oleg Barykin"> <!-- Auteur -->

      <!-- Réseaux sociaux (Open Graph pour Facebook / LinkedIn) -->
      <meta property="og:title" content="Bacadem">
      <meta property="og:description" content="Une description pour les aperçus partagés sur les réseaux.">
      <meta property="og:image" content="https://bacadem.org/asset/images/photo.png">
      <meta property="og:url" content="https://bacadem.org">
      <meta property="og:type" content="website">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
  <div class="logo"><?php echo $lang['title'] ?></div>
  <div class="burger" onclick="toggleMenu()">☰</div>
  <nav>
    <ul id="main-menu">
      <li><a href="?page=0"><?php echo $lang['home'] ?></a></li>
      <li><a href="?page=1"><?php echo $lang['math'] ?></a></li>
      <li><a href="?page=2"><?php echo $lang['physics'] ?></a></li>
      <li><a href="?page=5"><?php echo $lang['lit'] ?></a></li>
      <li><a href="?page=3"><?php echo $lang['contact'] ?></a></li>
    </ul>
  </nav>
  <div class="language-dropdown">
      <button id="langButton">
        <?php echo strtoupper($_SESSION['lang']) ?> ▼
      </button>
      <?php
          $page = isset($_GET['page']) ? $_GET['page'] : '0';
      ?>
      <ul id="langMenu" class="hidden">
        <li><a href="?lang=fr&page=<?php echo $page ?>">FR</a></li>
        <li><a href="?lang=en&page=<?php echo $page ?>">EN</a></li>
        <li><a href="?lang=ru&page=<?php echo $page ?>">RU</a></li>
      </ul>
</div>
</header>
<main>
