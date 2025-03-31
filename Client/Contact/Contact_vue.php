<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Hôtel Bleu & Blanc</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            color: #0d6efd;
        }

        .navbar {
            background-color: #0d6efd;
        }

        .navbar a, .navbar-brand {
            color: white !important;
        }

        .navbar a:hover {
            color: #cce5ff !important;
        }

        .container-contact {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-info {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 4px solid #0d6efd;
            background: #e9f2ff;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Hôtel Bleu & Blanc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="../Estimation/Estimation.php">Estimation prix</a></li>
                <?php echo $lien; ?>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
            <a href="../Profil_Client/Profil.php" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
    </div>
</nav>

<!-- Conteneur Contact -->
<div class="container-contact">
    <h1>Nous Contacter</h1>
    <?php
    echo "<div class='contact-info'><strong>Contacter l'hôtel :</strong><br>
        <i class='bi bi-envelope'></i> Email: " . $admin['email'] . "<br>
        <i class='bi bi-phone'></i> Téléphone: " . $admin['tel'] . "</div>";

    echo "<div class='contact-info'><strong>Caen :</strong><br>
        <i class='bi bi-envelope'></i> Email: " . $caen["email"] . "<br>
        <i class='bi bi-phone'></i> Téléphone: " . $caen['tel'] . "</div>";

    echo "<div class='contact-info'><strong>Brest :</strong><br>
        <i class='bi bi-envelope'></i> Email: " . $brest["email"] . "<br>
        <i class='bi bi-phone'></i> Téléphone: " . $brest["tel"] . "</div>";

    echo "<div class='contact-info'><strong>Nantes :</strong><br>
        <i class='bi bi-envelope'></i> Email: " . $nantes["email"] . "<br>
        <i class='bi bi-phone'></i> Téléphone: " . $nantes["tel"] . "</div>";

    echo "<div class='contact-info'><strong>Paris :</strong><br>
        <i class='bi bi-envelope'></i> Email: " . $paris["email"] . "<br>
        <i class='bi bi-phone'></i> Téléphone: " . $paris["tel"] . "</div>";
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
