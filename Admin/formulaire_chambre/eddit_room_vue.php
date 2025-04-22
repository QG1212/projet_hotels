<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier une chambre</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Style personnalisé admin -->
    <link rel="stylesheet" href="../Css/admin_log.css">

    <style>
        form {
            background-color: #cee4ce;
            padding: 1.2rem;
            border-radius: 15px;
        }
    </style>
</head>

<body>


        <!-- Sidebar (1/3) -->
            <div class="sidebar col-md-4 me-2">
                <h4>Admin Panel</h4>
                <a href="../../index.php"><i class="bi bi-person-badge"></i> Accueil Client</a>
                <a href="../Admin_log/admin_log.php"><i class="bi bi-box-arrow-in-left"></i> Déconnexion</a>
                <a href="../Admin_Perm/Admin_perm.php"><i class="bi bi-house-door"></i> Permissions</a>
                <a href="../Admin_Reservation/Reservation_admin.php"><i class="bi bi-calendar2-week"></i> Réservation</a>
                <a href="../Admin_Consommation/Consommation_admin.php"><i class="bi bi-cup-straw"></i> Consommation Client</a>
            </div>

        <!-- Contenu principal (2/3) -->
        <div class="col-md-8">

            <h1 class="titre">Modification</h1>

            <div class="table-responsive mb-1">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Simple</th>
                            <th scope="col">Double</th>
                            <th scope="col">Double avec salle de bain</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">*</th>
                            <?php
                                for($i=0;$i<3;$i++){
                            $price = $array_price[$i]["prix"]. "\n";
                            echo "<td> $price </td>";
                            } ?>
                        </tr>
                        <tr>
                            <th scope="row">**</th>
                            <?php
                            for($i=3;$i<6;$i++){
                                $price = $array_price[$i]["prix"]. "\n";
                                echo "<td> $price </td>";
                            } ?>
                        </tr>
                        <tr>
                            <th scope="row">***</th>
                            <?php
                            for($i=6;$i<9;$i++){
                                $price = $array_price[$i]["prix"]. "\n";
                                echo "<td> $price </td>";
                            } ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="eddit_room.php" method="post">
                <div class="mb-3 form-floating">
                    <select id="class" class="form-select" name="classes">
                        <option value="1">*</option>
                        <option value="2">**</option>
                        <option value="3">***</option>
                    </select>
                    <label for="class" class="form-label">Nouvelle classe :</label>
                </div>

                <div class="mb-3 form-floating">
                    <select id="categorie" class="form-select" name="categories">
                        <option value="1">Simple</option>
                        <option value="2">Double</option>
                        <option value="3">Double avec salle de bain</option>
                    </select>
                    <label for="categorie">Nouvelle catégorie :</label>
                </div>

                <div class="mb-3 form-floating">
                    <input type="number" class="form-control" placeholder="Prix en €" id="prix" required step="0.01" name="price">
                    <label for="prix" class="form-label">Nouveau prix :</label>
                </div>

                <input type="submit" value="Valider les modifications" class="btn btn-success">
            </form>
            <div class="text-center">
                <button id="disco" onclick="startDisco()" class="btn btn-warning">Disco</button>
            </div>
        </div>
<!-- Script JS -->
<script src="../script/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
