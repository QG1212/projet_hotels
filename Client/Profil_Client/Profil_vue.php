<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Client - Hôtel Bleu & Blanc</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--lien vers le css -->
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/Estimation.css">
</head>

<body>

<!-- Barre de Navigation -->
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
                <li class="nav-item"><a class="nav-link" href="../affichage_reservation/Client_Controleur.php">Mes Réservations</a></li>
                <li class="nav-item"><a class="nav-link" href="../Reservation/Reservation_E1.php">Réserver un nouveau séjour</a></li>
                <li class="nav-item"><a class="nav-link" href="../Contact/Contact.php">Contact</a></li>            </ul>

            <!-- Icône de connexion -->
            <a href="#" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
    </div>
</nav>

<!-- Informations du Client -->
<div class="container-form">
    <h1 class="text-center mb-4">Votre Profil</h1>

    <form id="profile-form" action="Profil.php" method="post">
        <!-- Prénom -->
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" id="prenom" class="form-control" value="<?php $client["prenom"] ?>" required>
        </div>

        <!-- Nom -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" id="nom" class="form-control" value="<?php $client["nom"] ?>" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" id="email" class="form-control" value="<?php $client["email"] ?>" required>
        </div>

        <!-- Téléphone -->
        <div class="mb-3">
            <label for="tel" class="form-label">Numéro de téléphone :</label>
            <input type="tel" id="tel" class="form-control" value="<?php $client["tel"] ?>" pattern="^\+?[0-9]{10,15}$" required>
        </div>

        <!-- Bouton de mise à jour -->
        <button type="submit" class="btn btn-primary w-100" value="Mettre à jour"></button>
    </form>
<form action="../Login/login.php" method="post" class="mt-3">
    <input type="hidden" name="deconnection" value="true">
    <input type="submit" value="Se déconnecter" class="btn btn-outline-danger w-100">
</form>
</div>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
