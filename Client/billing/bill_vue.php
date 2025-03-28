<!Doctype html>
<html lang="fr">

<head>
    <title> Mes factures </title>
    <link rel="stylesheet" href="../css/navbar.css">

    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icônes Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>


    <!-- Barre de Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="bill.php">Hôtel Bleu & Blanc</a>

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
                    <li class="nav-item"><a class="nav-link" href="../affichage_reservation/Client_Controleur.php">Mes Réservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Reservation/Reservation_E1.php">Réserver un nouveau séjour</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Contact/Contact.php">Contact</a></li>            </ul>

                <!-- Icône de connexion -->
                <a href="../Profil_Client/Profil.php" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
            </div>
        </div>
    </nav>

    <?php
    echo $error
    ?>


    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../../Serveur/database/ajax.js"></script>
</body>