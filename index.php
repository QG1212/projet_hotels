<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôtel Bleu & Blanc</title>
    <link rel="stylesheet" href="css/navbar.css">
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icônes Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">Hôtel Bleu & Blanc</a>

        <!-- Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="Estimation/Estimation.php">Estimation prix</a></li>
                <li class="nav-item"><a class="nav-link" href="#chambres">Chambres</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>

            <!-- Icône de connexion -->
            <a href="Login/login.php" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
    </div>
</nav>

<!-- Section d'Accueil -->
<header class="py-5 text-center">
    <div class="container">
        <h1 class="display-4">Bienvenue à l'Hôtel Bleu & Blanc</h1>
        <p class="lead">Un séjour de rêve au bord de la mer avec tout le confort moderne.</p>
        <a href="Login/login.php" class="btn btn-primary btn-lg">Réservez maintenant</a>
    </div>
</header>

<!-- Section Services -->
<section id="services" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Nos Services</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <i class="bi bi-wifi fs-1"></i>
                <h3>Wi-Fi Gratuit</h3>
                <p>Accès Internet haut débit inclus dans toutes les chambres.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-cup-hot fs-1"></i>
                <h3>Petit Déjeuner Offert</h3>
                <p>Un buffet varié chaque matin pour bien commencer la journée.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-water fs-1"></i>
                <h3>Piscine & Spa</h3>
                <p>Relaxez-vous dans notre piscine chauffée ou notre espace bien-être.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pied de page -->
<footer class="py-4 bg-light text-center">
    <p>&copy; 2025 Hôtel Bleu & Blanc - Tous droits réservés.</p>
</footer>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>