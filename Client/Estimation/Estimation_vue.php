<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estimation - Hôtel Bleu & Blanc</title>

    <link href="../css/Estimation.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
    <!-- Icônes Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
                <!--<li class="nav-item"><a class="nav-link" href="#chambres">Chambres</a></li>-->
                <?php
                echo $lien;
                ?>
                <li class="nav-item"><a class="nav-link" href="../Contact/Contact.php">Contact</a></li>            </ul>
            </ul>

            <!-- Icône de connexion -->
            <a href="../Profil_Client/Profil.php" class="nav-link"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
    </div>
</nav>
<!-- erreur -->
<?php
if($error){
    echo "<section id=\"errors\" class=\"container alert alert-danger mt-2\" >
        Il faut une date de fin posterieur à la date du debut 
        </section>";
}
?>

<!-- Formulaire d'Estimation -->
<div class="container-form">
    <h1 class="text-center mb-4 text-bleu">Estimez votre séjour</h1>

    <form method="post">
        <!-- Choix de l'Hôtel -->
        <div class="mb-3">
            <label for="hotel" class="form-label text-bleu">Sélectionnez un hôtel :</label>
            <select id="hotel" name="hotel" class="form-select" required>
                <?php
                    echo $select_hotel;
                ?>
            </select>
        </div>

        <!-- Choix de la Catégorie de Chambre -->
        <div class="mb-3">
            <label for="chambre" class="form-label text-bleu">Choisissez une catégorie de chambre :</label>
            <select id="chambre" name="chambre" class="form-select" required>
                <?php
                    echo $select_chambre;
                ?>
            </select>
        </div>

        <!-- Date de Début -->
        <div class="mb-3">
            <label for="date-debut" class="form-label text-bleu">Date de début :</label>
            <input type="date" id="date-debut" name="datedebut" class="form-control" required
                <?php
                if(isset($_POST['datedebut'])){
                    echo "value='".$_POST['datedebut']."'";
                }
                ?>
            >
        </div>

        <!-- Date de Fin -->
        <div class="mb-3">
            <label for="date-fin" class="form-label text-bleu">Date de fin :</label>
            <input type="date" id="date-fin" name="datefin" class="form-control" required
                <?php
                    if(isset($_POST['datefin'])){
                        echo "value='".$_POST['datefin']."'";
                    }
                ?>
            >
        </div>

        <!-- Bouton d'Estimation -->
        <input type="submit" class="btn btn-primary w-100" value="Estimer le prix" id="ValiderEstimation">
    </form>

    <!-- Boîte d'Estimation -->
    <div id="estimation-box" class="mt-4">
        <h3>Estimation du prix :</h3>
        <p id="estimation-prix">
            <?php
                echo $prix;
            ?>
            €</p>
    </div>
</div>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="Estimation.js"></script>

</body>

</html>
