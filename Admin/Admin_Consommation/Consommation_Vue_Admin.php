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
    <a href="../../index.php"><i class="bi bi-person-badge"></i> Accueil Client</a>
    <a href="../Admin_log/admin_log.php"><i class="bi bi-box-arrow-in-left"></i> Deconnexion </a>
    <a href="../Admin_Perm/Admin_perm.php"><i class="bi bi-house-door"></i>Permissons</a>
    <a href="../Admin_Reservation/Reservation_admin.php"><i class="bi bi-calendar2-week"></i> Reservation</a>
    <a href="../Admin_Consommation/Consommation_admin.php"><i class="bi bi-cup-straw"></i>Consomation Client</a>


</div>

<!-- Contenu principal -->
<div class="main-content">
    <div class="form-container">
        <h1>Liste des consommations</h1>
        <?php
        if ($hotel == null) {
            echo "ERROR: hotel was not found";
        } 
        else {
            echo "<h3 class='mb-4'>Prix des consommations de l'hôtel de " . $hotel . " :</h3>";
            echo "<form action='Consommation_admin.php' method='POST'>";
            echo "<div class='container'>";

            foreach ($consoList as $conso) {
                echo "<div class='row align-items-center mb-3'>";
                echo "<div class='col-8'>";
                echo "<label class='form-label fw-bold'>" . $conso['denomination'] . "</label>";
                echo "</div>";
                echo "<div class='col-4 d-flex align-items-center'>";
                echo "<input class='form-control prix' value='" . $conso['prix'] . "' name='" . $conso['id_conso'] . "'> €";
                echo "</div>";
                echo "</div>";
            }

            echo "<button type='submit' class='btn btn-success mt-3'>Valider les modifications</button>";
            echo "</div>";
            echo "</form>";
        }
        ?>
    </div>
</div>

<button id="disco" onclick="startDisco()">Disco</button>

<script src="../script/script.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


