<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $lang['title_contact'] ?></title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
</head>
<body>
<center>
<form method="post" action="?page=4">
    <h1><?= $lang['contact_title'] ?></h1>
    <input type="text" name="nom" placeholder="<?= $lang['name'] ?>" required>
    <input type="text" name="prenom" placeholder="<?= $lang['surname'] ?>" required>
    <input type="text" name="sujet" placeholder="<?= $lang['subject'] ?>" required>
    <input type="email" name="email" id="email" placeholder="<?= $lang['email'] ?>" required>
    <div id="email_msg"></div>
    <textarea name="message" rows="5" placeholder="<?= $lang['message'] ?>" required></textarea>

    <!-- reCAPTCHA Google test key -->
    <div class="g-recaptcha" data-sitekey="6Lc9MWUrAAAAAGCK0B5H3GcriiTA-Y2EPIyyP9oT"></div>

    <input type="submit" value="<?= $lang['send'] ?>">
</form>
</center>
</body>
</html>
