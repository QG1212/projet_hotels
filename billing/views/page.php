<!Doctype html>
<html lang="fr">

<head>
    <title> Mes factures </title>

</head>
<body>
<link rel="stylesheet" href="../../css/navbar.css">
    <script src="../ajax.js"></script>


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
                <li class="nav-item"><a class="nav-link" href="#chambres">Chambres</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>

            <!-- Icône de connexion -->
            <a href="../Login/login.php" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
    </div>
</nav>



<?php require 'billList.php'?>

    <script src="../ajax.js"></script>
