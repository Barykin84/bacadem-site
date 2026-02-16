
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $lang['title_contact'] ?></title>
   
    <script>
        function verifyEmail() {
            let email = document.getElementById("email").value;
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "verify_email.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("email_msg").innerText = xhr.responseText;
                }
            };
            xhr.send("email=" + encodeURIComponent(email));
        }
    </script>
</head>
<body>
<center>
<form method="post" action="?page=4">
    <h1><?= $lang['contact_title'] ?></h1>
    <input type="text" name="nom" placeholder="<?= $lang['name'] ?>" required>
    <input type="text" name="prenom" placeholder="<?= $lang['surname'] ?>" required>
    <input type="text" name="sujet" placeholder="<?= $lang['subject'] ?>" required>
    <input type="email" name="email" id="email" placeholder="<?= $lang['email'] ?>" onblur="verifyEmail()" required>
    <div id="email_msg"></div>
    <textarea name="message" rows="5" placeholder="<?= $lang['message'] ?>" required></textarea>
    <!-- Vérification robot simple -->
    <input type="text" name="captcha" placeholder="<?= $lang['captcha'] ?>: 3 + 4 = ?" required>
    <input type="submit" value="<?= $lang['send'] ?>">
</form>
    </center>
</body>
</html>
