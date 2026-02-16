<?php
require_once 'includes/connexion.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM client WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: afficher_base.php');
exit;
