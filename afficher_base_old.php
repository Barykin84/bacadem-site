<?php
require_once 'includes/connexion.php';

// Nombre d'enregistrements par page
$records_per_page = 15;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Récupération des données triées par date (la plus récente en premier)
$stmt = $pdo->prepare("SELECT * FROM client ORDER BY date_envoi DESC, heure_envoi DESC LIMIT :offset, :limit");
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$clients = $stmt->fetchAll();

// Récupération du nombre total de lignes
$total_stmt = $pdo->query("SELECT COUNT(*) FROM client");
$total_rows = $total_stmt->fetchColumn();
$total_pages = ceil($total_rows / $records_per_page);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des messages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="text-center mb-4">Liste des messages</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Sujet</th>
          <th>Email</th>
          <th>Message</th>
          <th>Date</th>
          <th>Heure</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clients as $client): ?>
          <tr>
            <td><?= htmlspecialchars($client['nom']) ?></td>
            <td><?= htmlspecialchars($client['prenom']) ?></td>
            <td><?= htmlspecialchars($client['sujet']) ?></td>
            <td><?= htmlspecialchars($client['email']) ?></td>
            <td><?= nl2br(htmlspecialchars($client['message'])) ?></td>
            <td><?= htmlspecialchars($client['date_envoi']) ?></td>
            <td><?= htmlspecialchars($client['heure_envoi']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
          <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
</div>
</body>
</html>