
<html lang="<?= $_SESSION['lang'] ?>">
<?php
// Récupérer les données POST et les nettoyer
$nom = trim($_POST['nom'] ?? '');
$prenom = trim($_POST['prenom'] ?? '');
$sujet = trim($_POST['sujet'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$captcha = trim($_POST['captcha'] ?? '');

// Vérification captcha simple : 3 + 4 = 7
if ($captcha != '7') {
    die("<center>".$lang['captcha_error']. "</center>");
}

// Vérification email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<center>".$lang['email_invalid']."</center>");
}

// Préparation du mail
$to = "o.barykin@wanadoo.fr";  // Remplace par ta vraie adresse
$subject = "Contact :" . $sujet;
$body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\n\nMessage:\n$message";
$headers = "From: $email\r\nReply-To: $email\r\n";

// Envoi du mail
if (mail($to, $subject, $body, $headers)) {
    echo "<center>".$lang['mail_sent']."</center>";
} else {
    echo "<center>".$lang['mail_error']."</center>";
}
?>
