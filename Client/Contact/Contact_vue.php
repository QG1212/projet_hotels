
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client - Hôtel Bleu & Blanc</title>

    <link rel="stylesheet" href="../css/navbar.css">
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
                <?php
                echo $lien;
                ?>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

            </ul>

            <!-- Icône de connexion -->
            <a href="../Profil_Client/Profil.php" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
    </div>
</nav>
<h1>Nous Contacter</h1>
<?php
echo "<p>Contacter l'hotel: <i class='bi bi-envelope'></i> Email:".$admin['email']." <i class='bi bi-phone'></i> Téléphone:".$admin['tel'].'</p>
<p>Contacter à:</p>
<p>-Caen: 
<i class="bi bi-envelope"></i>  Email: '.$caen["email"].' <i class="bi bi-phone"></i> Téléphone: '.$caen['tel'].'</p>
<p>-Brest: 
<i class="bi bi-envelope"></i> Email: '.$brest["email"].' <i class="bi bi-phone"></i> Téléphone: '.$brest["tel"].'</p>
<p>-Nantes: 
<i class="bi bi-envelope"></i> Email: '.$nantes["email"].' <i class="bi bi-phone"></i> Téléphone: '.$nantes["tel"].'</p>
<p>-Paris:  
<i class="bi bi-envelope"></i> Email: '.$paris["email"].' <i class="bi bi-phone"></i> Téléphone: '.$paris["tel"].'</p>

</body>';
