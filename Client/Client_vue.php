<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client - Hôtel Bleu & Blanc</title>

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/Reservation.css">

    <!-- Icônes Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<!-- Navigation -->
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
                <!--<li class="nav-item"><a class="nav-link" href="#chambres">Chambres</a></li>-->
                <li class="nav-item"><a class="nav-link" href="#">Mes Réservations</a></li>
                <li class="nav-item"><a class="nav-link" href="../Reservation/Reservation_E1.php">Réserver un nouveau séjour</a></li>
                <li class="nav-item"><a class="nav-link" href="../Contact/Contact.php">Contact</a></li>            </ul>

            <!-- Icône de connexion -->
            <a href="../Profil_Client/Profil.php" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
    </div>
</nav>
<div id="ALL"></div>
<div id="template" style="display: none">
    <div class="container-reservation container" >
        <h1 class="text-center mb-4">Détails de la Réservation n° <span class="numero_resa">22</span></h1>
        <div class="row">
        <div class="mb-2 col">
            <h5>🏨 Hôtel :</h5>
            <p class="hotel"></p>
        </div>

        <div class="mb-2 col">
            <h5>📅 Date de séjour :</h5>
            <p>Du <span class="date-debut"></span> au <span class="date-fin"></span></p>
        </div>
        </div>
        <div class="row">
        <div class="mb-2 col">
            <h5>🛏️ Chambre :</h5>
            <p class="chambre"></p>
        </div>

        <div class="mb-2 col">
            <h5>🏷️ Catégorie :</h5>
            <p class="categorie"></p>
        </div>
        </div>
        <div class="row">
        <div class="mb-2 col">
            <h5>💳 Statut de paiement :</h5>
            <span class="statut-paiement badge badge-paid"></span>
        </div>
            <div class="mb-2 col">
                <form method="post" action="../billing/bill.php">
                    <input type="hidden" name="id_reservation" class="id_reservation">
                    <input type="submit" class="btn btn-primary btn-download" value="Télécharger la facture">
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../database/ajax.js"></script>
    <script src="Client.js"></script>

</body>