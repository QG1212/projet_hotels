<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hôtel Bleu & Vert</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="../Css/admin_log.css">

</head>

<body>
<!-- Barre latérale -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    <a href="../../index.php"><i class="bi bi-person-badge"></i> Accueil Client</a>
    <a href="../Admin_log/admin_log.php"><i class="bi bi-box-arrow-in-left"></i> Deconnexion </a>
    <a href="../Admin_Perm/Admin_perm.php"><i class="bi bi-house-door"></i> Permissons</a>
    <a href="../Admin_AchatConso/Admin_achat_conso.php"><i class="bi bi-cart4"></i> Achat conso</a>
    <?php
        echo $lien;
    ?>
</div>

<!-- Contenu principal -->
<div class="main-content flex-column m-1">
    <div class="form-container mb-1 p-4">
        <h1 >Liste des consommations</h1>
        <?php
        if ($hotel == null) {
            echo "ERROR: hotel was not found";
        }
        else {
            echo "<h3 class='mb-3'>Prix des consommations de " . $nomHotel . " :</h3>";
            echo "<form action='Consommation_admin.php' method='POST' id='consoForm'>";
            echo "<div class='container'>";

            foreach ($consoList as $conso) {
                $id = $conso['id_conso'];
                echo "<div class='row align-items-center mb-3' id='conso_$id'>";
                echo "<div class='col-6'>";
                echo "<label class='form-label fw-bold'>" . $conso['denomination'] . "</label>";
                echo "</div>";
                echo "<div class='col-3 d-flex align-items-center'>";
                echo "<input class='form-control prix' value='" . $conso['prix'] . "' name='" . $id . "'> €";
                echo "</div>";
                echo "<div class='col-3'>";
                echo "<button type='button' class='btn btn-danger w-100' onclick='removeConso(\"$id\")'>Supprimer</button>";
                echo "</div>";
                echo "</div>";
            }
            echo "<button type='submit' class='btn btn-success mt-3 w-100'>Valider les modifications</button>";
            echo "</div>";
            echo "</form>";
        }
        ?>
    </div>
    <div class="form-container">

        <h3>Ajouter une consommation:</h3>
        <form action="Consommation_admin.php" method="POST">
            <div class="row g-3 align-items-end mb-3">
                <div class="col-md-4">
                    <select name="id_conso" class="form-select">
                        <option value="0" selected><-- Nouvelle Consommation --></option>
                        <?php
                        echo $select
                        ?>
                    </select>
                </div>
                <div class="col-md-4 ">
                    <div class="form-floating">
                        <input id="nom" type="text" class="form-control" name="nom" placeholder="Nom">
                        <label for="nom">Nom</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <input id="prix" type="number" class="form-control" name="prix" placeholder="Prix en €" step="0.01" required>
                        <label for="prix">Prix en €</label>
                    </div>
                </div>
                <div class="col-md-2 text-end">
                    <button type="submit" class="btn btn-success w-100">Insérer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<button id="disco" onclick="startDisco()">Disco</button>

<script src="../script/script.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Script de la suppression d'une conso -->
<script src="Consomation.js"></script>
</body>


