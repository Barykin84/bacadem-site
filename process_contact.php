<html lang="<?= $_SESSION['lang'] ?>">
<?php
require_once 'includes/connexion.php';
$nom = trim($_POST['nom'] ?? '');
$prenom = trim($_POST['prenom'] ?? '');
$sujet = trim($_POST['sujet'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$recaptcha_response = $_POST['g-recaptcha-response'] ?? '';

// Vérifier reCAPTCHA avec la clé secrète de test
$secret = "klé_google";
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha_response}");
$response = json_decode($verify);

if (!$response->success) {
    die("<center>".$lang['captcha_error']."</center>");
}

// Vérification de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<center>".$lang['email_invalid']."</center>");
}

// Préparation et envoi du mail
$to = "contact@bacadem.org";  // Remplace par ta vraie adresse
$subject = "Axucim :" . $sujet;
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: $email\r\nReply-To: $email\r\n";

$body = "
<html>
<body>
    <p><strong>Nom :</strong> $nom</p>
    <p><strong>Prénom :</strong> $prenom</p>
    <p><strong>Email :</strong> $email</p>
    <p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
</body>
</html>";

if (mail($to, $subject, $body, $headers)) {
    $date = date('Y-m-d');
    $heure = date('H:i:s');

    $stmt = $pdo->prepare("INSERT INTO client (nom, prenom, sujet, email, message, date_envoi, heure_envoi) 
                           VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $sujet, $email, $message, $date, $heure]);
    echo "<center>".$lang['mail_sent']."</center>";
} else {
    echo "<center>".$lang['mail_error']."</center>";
}
?>
