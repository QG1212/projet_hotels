<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - Hôtel Bleu & Blanc</title>

    <!-- Icônes Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/Estimation.css" rel="stylesheet">
</head>

<body>

<!-- Barre de Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="../index.php">Hôtel Bleu & Blanc</a>

        <!-- Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="../Estimation/Estimation.php">Estimation prix</a></li>
                <!--Idées future de css/html mais la pas le temps -->
                <!--<li class="nav-item"><a class   ="nav-link" href="#chambres">Chambres</a></li>-->
                <li class="nav-item"><a class="nav-link" href="../Client/Client_Controleur.php">Mes Réservations</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Réserver un nouveau séjour</a></li>
                <li class="nav-item"><a class="nav-link" href="../Contact/Contact.php">Contact</a></li>            </ul>

            <!-- Icône de connexion -->
            <a href="../Profil_Client/Profil.php" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
    </div>
</nav>
<!-- Gestion des erreurs
<?php
echo $error;
?>
<!-- Formulaire de Réservation -->
<div class="container-form">
    <h1 class="text-center mb-4">Formulaire de Réservation</h1>

    <!-- Formulaire 1 : Sélection de l'hôtel et des dates -->
    <div class="form-section">
        <h3>Étape 1 : Choisissez votre hôtel et vos dates</h3>
        <form id="hotel-form">
            <div class="mb-3">
                <label for="hotel" class="form-label">Sélectionner un hôtel :</label>
                <select id="hotel" name="hotel" class="form-select" required>
                    <option value="">-- Choisir un hôtel --</option>
                    <?php
                    echo $hotel
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="date-debut" class="form-label">Date de début :</label>
                <input type="date" id="date-debut" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date-fin" class="form-label">Date de fin :</label>
                <input type="date" id="date-fin" class="form-control" required>
            </div>

            <button type="button" class="btn btn-primary" onclick="afficherChambres()">Voir les chambres disponibles</button>
        </form>
    </div>

    <!-- Formulaire 2 : Sélection des chambres -->
    <div id="chambre-section" class="form-section" style="display:none;">
        <h3>Étape 2 : Sélectionnez votre chambre</h3>
        <form id="chambre-form">
            <div class="mb-3">
                <label for="chambre" class="form-label">Choisissez une chambre :</label>
                <select id="chambre" class="form-select" required>
                    <option value="">-- Sélectionner une chambre --</option>
                    <option value="standard">Chambre Standard - 100€/nuit</option>
                    <option value="superieure">Chambre Supérieure - 150€/nuit</option>
                    <option value="suite">Suite de Luxe - 250€/nuit</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Confirmer la réservation</button>
        </form>
    </div>

</div>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
