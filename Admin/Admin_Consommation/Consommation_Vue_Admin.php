<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hôtel Bleu & Vert</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../Css/admin_log.css">
</head>

<body>
<!-- Barre latérale -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    <a href="../index_vue.php"><i class="bi bi-house"></i> Accueil </a>
    <a href="../Admin_Reservation/Reservation_admin_vue.php">Réservations</a>
    <a href="../Admin_Consommation/Consommation_Vue_Admin.php">Consomation</a>


</div>

<!-- Contenu principal -->
<div class="main-content">
    <div class="form-container">
        <h1>Liste des consomations</h1>
        <?php
        if ($hotel==""){
            echo "ERROR: hotel was not found";
        }
        else{
            echo "Prix des consommation de l'hotel de".$hotel.":";
            echo"<br><form>";
            foreach ($consoList as $conso ){
                echo $conso["denomination"]."<br>";
                echo "<input type='number' value=".$conso["prix"]."></input>"." €";
            }
            echo "<button type='submit'>Valider les modifications</button> </form>";
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


