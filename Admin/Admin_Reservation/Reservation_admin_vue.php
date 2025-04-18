<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hôtel Bleu & Vert</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../Css/admin_log.css">
</head>

<body>
<!-- Barre latérale -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    <a href="../index.php"><i class="bi bi-house"></i> Accueil </a>
    <a href="../Admin_Reservation/Reservation_admin_vue.php">Réservations</a>

</div>

<!-- Contenu principal -->
<div class="main-content">
    <div class="form-container">
        <h1>Liste des réservations</h1>
        <?php if (empty($reservations)): ?>
            <p>Aucune réservation trouvée.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Chambre</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                </tr>
                <?php foreach ($reservations as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['nom']) ?></td>
                        <td><?= htmlspecialchars($r['email']) ?></td>
                        <td><?= htmlspecialchars($r['id_chambre']) ?></td>
                        <td><?= htmlspecialchars($r['date_debut']) ?></td>
                        <td><?= htmlspecialchars($r['date_fin']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

