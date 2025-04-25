<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hôtel Bleu & Vert</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="../Css/admin_log.css">
</head>

<body>
<!-- Barre latérale -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    <a href="../../index.php"><i class="bi bi-person-badge"></i> Accueil Client</a>
    <a href="../Admin_log/admin_log.php"><i class="bi bi-box-arrow-in-left"></i> Deconnexion </a>
    <a href="../Admin_Perm/Admin_perm.php"><i class="bi bi-house-door"></i>Permissons</a>
    <a href="../Admin_Reservation/Reservation_admin.php"><i class="bi bi-calendar2-week"></i> Reservation</a>
    <a href="../Admin_Consommation/Consommation_admin.php"><i class="bi bi-cup-straw"></i>Consomation Client</a>
</div>

<!-- Contenu principal -->
<div class="main-content">
    <div class="form-container">
        <h1> Bienvenue sur votre page admin</h1>
        <h2> vos information :</h2>
        <p>nom : <?php echo $nom ?> </p>
        <p>Téléphone : <?php echo $tel ?></p>
        <p> Email : <?php echo $email ?> </p>
        <p>Droit :
        <ul>
            <?php
                for($i = 0;  $i < sizeof($array_perm); $i++){
                    $perm = $array_perm[$i]["denomination"];
                    echo "<li>".$perm."</li>";
                }
            ?>
        </ul>

        </p>
    </div>
</div>

<button id="disco" onclick="startDisco()">Disco</button>

<script src="../script/script.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
